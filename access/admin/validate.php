<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("location: ../admin/signout.php");
    exit();
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$validRoles = ["Admin", "General User"];
if (!in_array($_SESSION['role'], $validRoles)) {
    $_SESSION['logged_in'] = false;
    exit();
}
?>



