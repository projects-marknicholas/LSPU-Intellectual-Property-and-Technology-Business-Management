<?php
include '../config.php';
include 'validate.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$account_id = $_SESSION['account_id'];
$stmt = $link->prepare("SELECT profile_photo, firstname, middlename, lastname, email, role, branch FROM register WHERE account_status = 'active' AND branch = (SELECT branch FROM register WHERE account_id = $account_id) ORDER BY id DESC");
$stmt->execute();
$result = $stmt->get_result();

// Initialize response array
$response = array('status' => 'error', 'message' => '');

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $rowData = array();
        $rowData['profile_photo'] = sanitize_input($row['profile_photo']);
        
        // Concatenate first name, middle name, and last name
        $rowData['full_name'] = sanitize_input($row['firstname'].' '.$row['middlename'].' '.$row['lastname']);
        
        $rowData['email'] = sanitize_input($row['email']);
        $rowData['role'] = sanitize_input($row['role']);
        $rowData['branch'] = sanitize_input($row['branch']);
        $data[] = $rowData;
    }

    $response = array('status' => 'success', 'data' => $data);
} else {
    $response['message'] = "No data available";
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
