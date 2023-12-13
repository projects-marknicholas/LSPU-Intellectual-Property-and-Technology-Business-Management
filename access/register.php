<?php
// Include the database connection here (in config.php)
include 'config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_POST['branch'])) {
    $_POST['branch'] = str_replace('Ã±', 'ñ', $_POST['branch']);
}

// Initialize response array
$response = array('status' => 'error', 'message' => '');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generate a random account ID
    $account_id = rand(0, 9999999999);

    // Get and sanitize user input
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $confirm_password = sanitize_input($_POST['confirm-password']);
    $firstname = sanitize_input($_POST['firstname']);
    $middlename = sanitize_input($_POST['middlename']);
    $lastname = sanitize_input($_POST['lastname']);
    $role = sanitize_input($_POST['role']);
    $branch = sanitize_input($_POST['branch']);

    // Check if all fields are filled
    if (empty($email) || empty($password) || empty($confirm_password) || empty($firstname) || empty($middlename) || empty($lastname) || empty($role) || empty($branch)) {
        $response['message'] = 'All fields are required. Please fill in all the information.';
        echo json_encode($response);
        exit;
    }

    // Check if the length of password is 6 above
    if (strlen($password) < 6) {
        $response['message'] = 'Password must be at least 6 characters long. Please try again.';
        echo json_encode($response);
        exit;
    }

    // Check if email already exists
    $check_email_sql = "SELECT COUNT(*) FROM register WHERE email=?";
    $stmt = $link->prepare($check_email_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email_count);
    $stmt->fetch();
    $stmt->close();

    if ($email_count > 0) {
        $response['message'] = 'This email is already registered. Please use a different email address.';
        echo json_encode($response);
        exit;
    }

    // Password Hashing
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Handle file upload (profile photo)
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $file_info = getimagesize($_FILES['photo']['tmp_name']);
        $file_type = $file_info[2];

        $allowed_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);

        if (!in_array($file_type, $allowed_types)) {
            $response['message'] = 'Invalid file format. Please upload a valid image (JPEG, PNG, or GIF).';
            echo json_encode($response);
            exit;
        }

        $file_name = $_FILES['photo']['name'];
        $file_tmp_name = $_FILES['photo']['tmp_name'];

        // Generate profile filename
        $profile_filename = $lastname . '-' . $firstname . '-' . $middlename . '-' . $account_id;

        // Define constant for file path
        define('PROFILE_PATH', 'files/profile/');
        $file_destination = PROFILE_PATH . $profile_filename . '.webp';

        // Move the uploaded file to the destination
        if (move_uploaded_file($file_tmp_name, $file_destination)) {
            // Now, insert user data into the database
            $account_status = 'pending'; // Add account_status with value 'pending'
            $sql = "INSERT INTO register (account_id, profile_photo, email, password, firstname, middlename, lastname, role, branch, account_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("ssssssssss", $account_id, $file_destination, $email, $passwordHash, $firstname, $middlename, $lastname, $role, $branch, $account_status);

            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Registration successful!';
                $response['redirect'] = 'login';
                echo json_encode($response);
                exit;
            } else {
                $response['message'] = 'Registration failed. Please try again.';
                echo json_encode($response);
                exit;
            }
        } else {
            $response['message'] = 'File upload failed. Please try again.';
            echo json_encode($response);
            exit;
        }
    } else {
        $response['message'] = 'File not uploaded or an error occurred.';
        echo json_encode($response);
        exit;
    }
} else {
    echo "You are trying to get in our site without permission.";
}
?>
