<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: index.php"); // Change "/" to the URL of your home page
exit;
?>
