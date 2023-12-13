<?php

include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

$technology_id = rand(0000000000, 9999999999);

// Check if technology_id already exists
$sql_check_duplicate = "SELECT COUNT(*) as count FROM technologies WHERE technology_id = '$technology_id'";
$result = $link->query($sql_check_duplicate);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['count'] > 0) {
        $response['message'] = 'Duplicate record. Please try again.';
        echo json_encode($response);
        exit();
    }
}

// Handle profile photo upload
if(isset($_FILES['tech-image']) && $_FILES['tech-image']['error'] == UPLOAD_ERR_OK) {
    $photo_tmp_name = $_FILES['tech-image']['tmp_name'];

    $profile_filename = "technology-" . $technology_id; // Updated file name format
    $banner_img = $profile_filename . ".webp";

    define('TECHNOLOGY_PATH', '../files/records/');
    $file_destination = TECHNOLOGY_PATH . $banner_img;

    // Convert image to webp
    $img = imagecreatefromstring(file_get_contents($photo_tmp_name));
    imagewebp($img, $file_destination);

    // Free up memory
    imagedestroy($img);
} else {
    $response['message'] = 'Error uploading banner image: ' . $_FILES['tech-image']['error'];
    echo json_encode($response);
    exit();
}

$technology = sanitize_input($_POST['technology']);
$ip_type = sanitize_input($_POST['ip']);
$year = sanitize_input($_POST['year']);
$date_of_filing = sanitize_input($_POST['date-of-filing']);
$application_no = sanitize_input($_POST['application-no']);
$abstract = sanitize_input($_POST['abstract']);
$inventors = sanitize_input($_POST['inventors']);
$technology_status = sanitize_input($_POST['record-status']);

// Retrieve account_id from the session
$account_id = $_SESSION['account_id'];

// Retrieve branch from the database
$sql_branch = "SELECT branch FROM register WHERE account_id = '$account_id'";
$result_branch = $link->query($sql_branch);

if ($result_branch && $result_branch->num_rows > 0) {
    $row_branch = $result_branch->fetch_assoc();
    $branch = $row_branch['branch'];
} else {
    $response['message'] = 'Error retrieving branch: ' . $link->error;
    echo json_encode($response);
    exit();
}

$sql = "INSERT INTO technologies (technology_id, banner_img, technology, ip_type, year, date_of_filing, application_no, abstract, inventors, technology_status, branch)
VALUES ('$technology_id', '$banner_img', '$technology', '$ip_type', '$year', '$date_of_filing', '$application_no', '$abstract', '$inventors', '$technology_status', '$branch')";

if ($link->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Technology record created successfully';
} else {
    $response['message'] = 'Error creating technology record: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
