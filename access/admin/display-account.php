<?php
// Include the database connection here (in config.php)
include '../config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

// Initialize response array
$response = array('status' => 'error', 'message' => '');

$account_id = $_SESSION['account_id'];

// Prepare and execute the SQL query
$sql = "SELECT account_id, profile_photo, email, password, firstname, middlename, lastname, phone, role, branch FROM register WHERE account_id=?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $account_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $account_id = sanitize_input($row['account_id']);
        $profile_photo = '../access/' . sanitize_input($row['profile_photo']);
        $email = sanitize_input($row['email']);
        $password = 'hidden';
        $firstname = sanitize_input($row['firstname']);
        $middlename = sanitize_input($row['middlename']);
        $lastname = sanitize_input($row['lastname']);
        $phone = sanitize_input($row['phone']);
        $role = sanitize_input($row['role']);
        $branch = sanitize_input($row['branch']);
        
        // Set the response message
        $response['status'] = 'success';
        $response['message'] = array(
            'account_id' => $account_id,
            'profile_photo' => $profile_photo,
            'email' => $email,
            'password' => $password,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'phone' => $phone,
            'role' => $role,
            'branch' => $branch
        );
    }
} else {
    $response['message'] = "No data found for this account.";
}

// Close the statement and connection
$stmt->close();
$link->close();

echo json_encode($response);
?>
