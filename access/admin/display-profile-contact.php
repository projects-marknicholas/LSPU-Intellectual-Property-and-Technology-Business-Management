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
$sql = "SELECT phone_number, email_address, fax_number, emergency_contact, department_contact_1, department_contact_2, department_contact_3, specific_personnel FROM branches WHERE branch_name = '$branch'"; // Corrected the typo

$result = $link->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['phone_number'] = $row['phone_number'];
    $response['email_address'] = $row['email_address'];
    $response['fax_number'] = $row['fax_number'];
    $response['emergency_contact'] = $row['emergency_contact'];
    $response['department_contact_1'] = $row['department_contact_1'];
    $response['department_contact_2'] = $row['department_contact_2'];
    $response['department_contact_3'] = $row['department_contact_3'];
    $response['specific_personnel'] = $row['specific_personnel'];
}

$link->close();

echo json_encode($response);
?>
