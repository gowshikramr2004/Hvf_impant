<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to loginscr.php
header("Location: loginscr.php");
exit();
?>