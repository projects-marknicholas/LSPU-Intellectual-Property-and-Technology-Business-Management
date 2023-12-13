<?php
include '../config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the ID parameter is set in the POST request
    if (isset($_POST['id']) || isset($_POST['aid'])) {
        $announcementId = sanitize_input(isset($_POST['id']) ? $_POST['id'] : $_POST['aid']);

        // Use prepared statement to prevent SQL injection
        $stmt = $link->prepare("SELECT banner_img FROM announcements WHERE announcement_id = ?");
        $stmt->bind_param("i", $announcementId); // 'i' indicates integer type
        $stmt->execute();
        $stmt->bind_result($bannerImg);

        if ($stmt->fetch()) {
            // Retrieve the file path of the announcement image
            $file_path = '../files/announcements/' . $bannerImg;

            // Check if the file exists before attempting to delete it
            if (file_exists($file_path)) {
                if (unlink($file_path)) {
                    // Image deleted successfully

                    // Now, proceed with deleting the announcement
                    $stmt->close();
                    $stmt = $link->prepare("DELETE FROM announcements WHERE announcement_id = ?");
                    $stmt->bind_param("i", $announcementId);

                    if ($stmt->execute()) {
                        // Deletion successful
                        $response = array('status' => 'success', 'message' => 'Announcement and image deleted successfully');
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        exit();
                    } else {
                        // Error occurred during announcement deletion
                        $response = array('status' => 'error', 'message' => 'Error deleting announcement');
                        echo json_encode($response);
                    }
                } else {
                    // Error occurred during image deletion
                    $response = array('status' => 'error', 'message' => 'Error deleting image');
                    echo json_encode($response);
                }
            } else {
                // File does not exist, proceed with deleting the announcement
                $stmt->close();
                $stmt = $link->prepare("DELETE FROM announcements WHERE announcement_id = ?");
                $stmt->bind_param("i", $announcementId);

                if ($stmt->execute()) {
                    // Deletion successful
                    $response = array('status' => 'success', 'message' => 'Announcement deleted successfully (Image not found)');
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                } else {
                    // Error occurred during announcement deletion
                    $response = array('status' => 'error', 'message' => 'Error deleting announcement');
                    echo json_encode($response);
                }
            }
        } else {
            // No announcement found with the given ID
            $response = array('status' => 'error', 'message' => 'Announcement not found');
            echo json_encode($response);
        }

        $stmt->close();
    }
}

$link->close();
?>
