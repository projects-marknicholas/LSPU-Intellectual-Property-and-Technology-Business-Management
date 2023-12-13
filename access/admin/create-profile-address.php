<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

// Sanitize and retrieve address fields
$region = sanitize_input($_POST['region']);
$country = sanitize_input($_POST['country']);
$city = sanitize_input($_POST['city']);
$municipality = sanitize_input($_POST['municipality']);
$township = sanitize_input($_POST['township']);
$village = sanitize_input($_POST['village']);
$district = sanitize_input($_POST['district']);

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
        SET region = '$region', country = '$country', city = '$city', 
            municipality = '$municipality', township = '$township', 
            village = '$village', district = '$district'
        WHERE branch_name = '$branch'";

if ($link->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Address information updated successfully';
} else {
    $response['message'] = 'Error updating address information: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
