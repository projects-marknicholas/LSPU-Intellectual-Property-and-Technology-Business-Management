<?php
include '../config.php';
include 'validate.php';

$response = array('status' => 'error', 'message' => '');

// Retrieve account_id from the session
$account_id = $_SESSION['account_id'];

// Retrieve branch from the register table based on the user's account_id
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

// Retrieve profile address data from the database
$sql = "SELECT branch_name, principal_head, operating_hours FROM branches WHERE branch_name = '$branch'"; // Corrected the typo

$result = $link->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['branch_name'] = $row['branch_name'];
    $response['principal_head'] = $row['principal_head'];
    $response['operating_hours'] = $row['operating_hours'];
}

$link->close();

echo json_encode($response);
?>
