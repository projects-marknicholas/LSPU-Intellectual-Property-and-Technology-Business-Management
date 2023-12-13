<?php
include '../config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the ID parameter is set in the POST request
    if (isset($_POST['id'])) {
        $technologyId = sanitize_input($_POST['id']);

        // Use prepared statement to prevent SQL injection
        $stmt = $link->prepare("SELECT banner_img FROM technologies WHERE technology_id = ?");
        $stmt->bind_param("i", $technologyId); // 'i' indicates integer type
        $stmt->execute();
        $stmt->bind_result($bannerImg);

        if ($stmt->fetch()) {
            // Retrieve the file path of the technology image
            $file_path = '../files/technologies/' . $bannerImg;

            // Check if the file exists before attempting to delete it
            if (file_exists($file_path)) {
                if (unlink($file_path)) {
                    // Image deleted successfully

                    // Now, proceed with deleting the technology
                    $stmt->close();
                    $stmt = $link->prepare("DELETE FROM technologies WHERE technology_id = ?");
                    $stmt->bind_param("i", $technologyId);

                    if ($stmt->execute()) {
                        // Deletion successful
                        $response = array('status' => 'success', 'message' => 'Technology and image deleted successfully');
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        exit();
                    } else {
                        // Error occurred during technology deletion
                        $response = array('status' => 'error', 'message' => 'Error deleting technology');
                        echo json_encode($response);
                    }
                } else {
                    // Error occurred during image deletion
                    $response = array('status' => 'error', 'message' => 'Error deleting image');
                    echo json_encode($response);
                }
            } else {
                // File does not exist, proceed with deleting the technology
                $stmt->close();
                $stmt = $link->prepare("DELETE FROM technologies WHERE technology_id = ?");
                $stmt->bind_param("i", $technologyId);

                if ($stmt->execute()) {
                    // Deletion successful
                    $response = array('status' => 'success', 'message' => 'Technology deleted successfully (Image not found)');
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                } else {
                    // Error occurred during technology deletion
                    $response = array('status' => 'error', 'message' => 'Error deleting technology');
                    echo json_encode($response);
                }
            }
        } else {
            // No technology found with the given ID
            $response = array('status' => 'error', 'message' => 'Technology not found');
            echo json_encode($response);
        }

        $stmt->close();
    }
}

$link->close();
?>
