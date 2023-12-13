<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

// Sanitize and retrieve contact fields
$principal_head = sanitize_input($_POST['principal_head']);
$operating_hours = sanitize_input($_POST['operating_hours']);

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

// Update the branch data based on the user's branch
$sql = "UPDATE branches 
        SET principal_head = '$principal_head', 
            operating_hours = '$operating_hours'
        WHERE branch_name = '$branch'";

if ($link->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Branch updated successfully';
} else {
    $response['message'] = 'Error updating branch: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
