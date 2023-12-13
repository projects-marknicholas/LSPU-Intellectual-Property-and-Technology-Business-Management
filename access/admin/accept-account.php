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
    $stmt = $link->prepare("UPDATE register SET account_status = 'active' WHERE account_id = ?");
    $stmt->bind_param("i", $account_id); // 'i' indicates integer type

    if ($stmt->execute()) {
        // Activation successful
        $response = array('status' => 'success', 'message' => 'Account activated successfully');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    } else {
        // Error occurred during activation
        $response = array('status' => 'error', 'message' => 'Error activating account');
        echo json_encode($response);
    }

    $stmt->close();
    $link->close();
}
?>
