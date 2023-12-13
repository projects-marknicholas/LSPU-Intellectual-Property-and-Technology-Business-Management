<?php
include '../config.php';
include 'validate.php';

$response = array('status' => 'error', 'message' => '');

$account_id = $_SESSION['account_id'];

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

$sql = "SELECT branch_cover FROM branches WHERE branch_name = '$branch'";
$result = $link->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $branchProfileImage = $row['branch_cover'];

    if (empty($branchProfileImage) || is_null($branchProfileImage)) {
        $branchProfileImage = 'main-cover.jpg';
    }

    $response['status'] = 'success';
    $response['message'] = $branchProfileImage;
} else {
    $response['message'] = 'Error retrieving branch cover image: ' . $link->error;
}

$link->close();

echo json_encode($response);
?>
