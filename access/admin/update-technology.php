<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

// Check if the required parameters are set
if (
    isset($_POST['tech_id'], $_POST['field_name'], $_POST['field_value']) &&
    !empty($_POST['tech_id']) &&
    !empty($_POST['field_name'])
) {
    $techId = sanitize_input($_POST['tech_id']);
    $fieldName = sanitize_input($_POST['field_name']);
    $fieldValue = sanitize_input($_POST['field_value']);

    // Validate and sanitize input if needed

    // Check if the field name is valid (you may want to customize this based on your database schema)
    $allowedFields = ['technology', 'ip_type', 'year', 'date_of_filing', 'application_no', 'abstract', 'inventors', 'technology_status'];
    if (!in_array($fieldName, $allowedFields)) {
        $response['message'] = 'Invalid field name.';
        echo json_encode($response);
        exit();
    }

    // Prepare and execute the SQL query to update the field
    $sql = "UPDATE technologies SET $fieldName = ? WHERE technology_id = ?";
    $stmt = $link->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ss', $fieldValue, $techId);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Field updated successfully.';
        } else {
            $response['message'] = 'Failed to update field.';
        }

        $stmt->close();
    } else {
        $response['message'] = 'Database error: ' . $link->error;
    }
} else {
    $response['message'] = 'Missing or empty required parameters.';
}

// Send the JSON response
echo json_encode($response);
?>
