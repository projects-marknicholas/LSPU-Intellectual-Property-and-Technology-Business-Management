<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$response = array('status' => 'error', 'message' => '');

// Sanitize and retrieve contact fields
$phone_number = sanitize_input($_POST['phone_number']);
$email_address = sanitize_input($_POST['email_address']);
$fax_number = sanitize_input($_POST['fax_number']);
$emergency_contact = sanitize_input($_POST['emergency_contact']);
$department_contact_1 = sanitize_input($_POST['department_contact_1']);
$department_contact_2 = sanitize_input($_POST['department_contact_2']);
$department_contact_3 = sanitize_input($_POST['department_contact_3']);
$specific_personnel = sanitize_input($_POST['specific_personnel']);

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
        SET phone_number = '$phone_number', email_address = '$email_address', 
            fax_number = '$fax_number', emergency_contact = '$emergency_contact', 
            department_contact_1 = '$department_contact_1', 
            department_contact_2 = '$department_contact_2', 
            department_contact_3 = '$department_contact_3', 
            specific_personnel = '$specific_personnel'
        WHERE branch_name = '$branch'";

if ($link->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Contact information updated successfully';
} else {
    $response['message'] = 'Error updating contact information: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
