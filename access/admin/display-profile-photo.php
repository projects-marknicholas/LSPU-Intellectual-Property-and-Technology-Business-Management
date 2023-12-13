<?php
include '../config.php';
include 'validate.php';

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

$account_id = $_SESSION['account_id'];

$stmt = $link->prepare("SELECT profile_photo, firstname, lastname FROM register WHERE account_id = ?");
$stmt->bind_param("i", $account_id);
$stmt->execute();
$result = $stmt->get_result();

$response = array('status' => 'error', 'message' => '');

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    $response = array(
        'status' => 'success',
        'data' => array(
            'profile_photo' => sanitize_input($row['profile_photo']),
            'first_name' => sanitize_input($row['firstname']),
            'last_name' => sanitize_input($row['lastname'])
        )
    );
} else {
    $response['message'] = "No data available";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
