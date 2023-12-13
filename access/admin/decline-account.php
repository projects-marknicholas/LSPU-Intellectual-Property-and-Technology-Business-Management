<?php
include '../config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_GET['aid'])) {
    $account_id = sanitize_input($_GET['aid']);

    // Use prepared statement to prevent SQL injection
    $stmt = $link->prepare("SELECT profile_photo FROM register WHERE account_id = ?");
    $stmt->bind_param("i", $account_id); // 'i' indicates integer type
    $stmt->execute();
    $stmt->bind_result($profile_photo);

    if ($stmt->fetch()) {
        // Retrieve the file path of the photo
        $file_path = '../' . $profile_photo;

        // Check if the file exists before attempting to delete it
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                // Photo deleted successfully

                // Now, proceed with deleting the account
                $stmt->close();
                $stmt = $link->prepare("DELETE FROM register WHERE account_id = ?");
                $stmt->bind_param("i", $account_id);

                if ($stmt->execute()) {
                    // Deletion successful
                    $response = array('status' => 'success', 'message' => 'Account and photo deleted successfully');
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                } else {
                    // Error occurred during account deletion
                    $response = array('status' => 'error', 'message' => 'Error deleting account');
                    echo json_encode($response);
                }
            } else {
                // Error occurred during photo deletion
                $response = array('status' => 'error', 'message' => 'Error deleting photo');
                echo json_encode($response);
            }
        } else {
            // File does not exist, proceed with deleting the account
            $stmt->close();
            $stmt = $link->prepare("DELETE FROM register WHERE account_id = ?");
            $stmt->bind_param("i", $account_id);

            if ($stmt->execute()) {
                // Deletion successful
                $response = array('status' => 'success', 'message' => 'Account deleted successfully (Photo not found)');
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            } else {
                // Error occurred during account deletion
                $response = array('status' => 'error', 'message' => 'Error deleting account');
                echo json_encode($response);
            }
        }
    } else {
        // No user found with the given account ID
        $response = array('status' => 'error', 'message' => 'User not found');
        echo json_encode($response);
    }

    $stmt->close();
    $link->close();
}
?>
