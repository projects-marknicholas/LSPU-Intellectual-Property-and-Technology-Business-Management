<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

$title = sanitize_input($_POST['title']);
$description = sanitize_input($_POST['description']);
$from = sanitize_input($_POST['from']);
$to = sanitize_input($_POST['to']);
$choice = sanitize_input($_POST['choice']);

// Retrieve account_id from the session
$account_id = $_SESSION['account_id'];

// Retrieve role and branch from the database
$sql_branch = "SELECT role, branch FROM register WHERE account_id = '$account_id'";
$result_branch = $link->query($sql_branch);

if ($result_branch && $result_branch->num_rows > 0) {
    $row_branch = $result_branch->fetch_assoc();
    $role = $row_branch['role'];
    $branch = $row_branch['branch'];
    $branch_name = "$role ($branch)";
} else {
    $response['message'] = 'Error retrieving branch: ' . $link->error;
    echo json_encode($response);
    exit();
}

$announcement_id = rand(0000000000, 9999999999);

// Handle profile photo upload
if(isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] == UPLOAD_ERR_OK) {
    $photo_tmp_name = $_FILES['banner_img']['tmp_name'];

    $profile_filename = $title . '-' . $announcement_id;
    $file_name = $profile_filename . '.webp';

    define('ANNOUNCEMENT_PATH', '../files/announcements/');
    $file_destination = ANNOUNCEMENT_PATH . $profile_filename . '.webp';

    // Convert image to webp
    $img = imagecreatefromstring(file_get_contents($photo_tmp_name));
    imagewebp($img, $file_destination);

    // Free up memory
    imagedestroy($img);
} else {
    $response['message'] = 'Error uploading banner image: ' . $_FILES['banner_img']['error'];
    echo json_encode($response);
    exit();
}

$sql = "INSERT INTO announcements (announcement_id, banner_img, title, announcement_description, announcement_status, announcement_from, announcement_to, creator, branch)
VALUES ('$announcement_id', '$file_name', '$title', '$description', '$choice', '$from', '$to', '$account_id', '$branch_name')";

if ($link->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Announcement created successfully';
} else {
    $response['message'] = 'Error creating announcement: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
