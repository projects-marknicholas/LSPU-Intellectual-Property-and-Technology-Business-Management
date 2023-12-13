<?php
// Include the database connection here (in config.php)
include 'config.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Generate CSRF token if not already set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize user input
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    // Check if all fields are filled
    if (empty($email) || empty($password)) {
        $response['message'] = 'Both email and password are required. Please fill in all the information.';
    } else {
        // Check if the user exists in the database
        $sql = "SELECT account_id, password, account_status, role FROM register WHERE email = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                if ($row['account_status'] === 'pending') {
                    $response['message'] = 'Your account is still pending approval.';
                } else {
                    session_start();

                    // Sessions
                    $_SESSION['account_id'] = $row['account_id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['logged_in'] = true;
                    if ($row['role'] === 'Admin') {
                        $response['status'] = 'success';
                        $response['message'] = 'Login successful!';
                        $response['redirect'] = 'admin';
                    } elseif ($row['role'] === 'General User') {
                        $response['status'] = 'success';
                        $response['message'] = 'Login successful!';
                        $response['redirect'] = 'user';
                    }
                    else{
                        $response['message'] = "Your account doesn't have a role!";
                        $_SESSION['logged_in'] = false;
                    }
                }
            } else {
                $response['message'] = 'Invalid email or password. Please try again.';
            }
        } else {
            $response['message'] = 'Invalid email or password. Please try again.';
        }
    }

    echo json_encode($response);
    exit;
}
else{
    echo "You are trying to get in our site without permission.";
}
?>
