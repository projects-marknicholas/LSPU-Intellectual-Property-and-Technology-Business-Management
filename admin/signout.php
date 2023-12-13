<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a sign-out confirmation page or any other desired page
header("Location: ../");
exit();
?>
