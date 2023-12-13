<?php
include '../config.php';
include 'validate.php';

$response = array('status' => 'error', 'message' => '');

// Retrieve account_id from the session
$account_id = $_SESSION['account_id'];

// Retrieve branch from the register table
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

// Directory where you want to store the uploaded photo
$target_dir = "../files/branch/";

// Check if a previous image exists and delete it
$previous_image = $target_dir . $branch . '-profile.webp';
if (file_exists($previous_image)) {
    unlink($previous_image);
}

// Process the uploaded photo if it exists
if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $target_file = $target_dir . $branch . '-profile.webp';
    $filename = $branch . '-profile.webp';

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $response['message'] = "The file " . $filename . " has been uploaded.";
        
        // Convert the uploaded image to .webp format
        $image = imagecreatefromjpeg($target_file);
        imagewebp($image, $target_file);
        imagedestroy($image);

        // Update branch_profile data based on the user's branch
        $sql = "UPDATE branches 
                SET branch_profile = '$filename' 
                WHERE branch_name = '$branch'";

        if ($link->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Branch profile updated successfully';
            $response['filename'] = $filename;
        } else {
            $response['message'] = 'Error updating branch profile: ' . $link->error;
        }
    } else {
        $response['message'] = "Sorry, there was an error uploading your file.";
    }
} else {
    $response['message'] = "No file uploaded or an error occurred during upload.";
}

$link->close();

echo json_encode($response);
exit();
?>
