<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

$account_id = $_SESSION['account_id'];

$phone = sanitize_input($_POST['phone']);
$firstname = sanitize_input($_POST['firstname']);
$middlename = sanitize_input($_POST['middlename']);
$lastname = sanitize_input($_POST['lastname']);


// Handle profile photo upload
if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == UPLOAD_ERR_OK) {
    $photo_tmp_name = $_FILES['profile_photo']['tmp_name'];
    $photo_name = $_FILES['profile_photo']['name'];

    $lastname = sanitize_input($_POST['lastname']);
    $firstname = sanitize_input($_POST['firstname']);
    $middlename = sanitize_input($_POST['middlename']);

    $profile_filename = $lastname . '-' . $firstname . '-' . $middlename . '-' . $account_id;

    define('PROFILE_PATH', '../files/profile/');
    $file_destination = PROFILE_PATH . $profile_filename . '.webp';
    $filename = 'files/profile/' . $profile_filename . '.webp';

    // Add debug output
    $response['debug'] = array(
        'profile_filename' => $profile_filename,
        'file_destination' => $file_destination,
        'account_id' => $account_id
    );

    // Convert image to webp
    $img = imagecreatefromstring(file_get_contents($photo_tmp_name));
    imagewebp($img, $file_destination);

    // Update profile photo path in the database
    $update_photo_sql = "UPDATE register SET profile_photo=? WHERE account_id=?";
    $stmt = $link->prepare($update_photo_sql);
    $stmt->bind_param("si", $filename, $account_id);

    if($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Changes saved successfully';
    } else {
        $response['message'] = 'Error updating profile photo: ' . $stmt->error;
    }
    $stmt->close();

    // Free up memory
    imagedestroy($img);
} else {
    $update_sql = "UPDATE register SET phone=?, firstname=?, middlename=?, lastname=? WHERE account_id=?";
    $stmt = $link->prepare($update_sql);
    $stmt->bind_param("ssssi", $phone, $firstname, $middlename, $lastname, $account_id);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Changes saved successfully.';
    } else {
        $response['message'] = 'Error updating data: ' . $stmt->error;
    }
    $stmt->close();
}

$link->close();

echo json_encode($response);
?>
