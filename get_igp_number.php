<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Assume you have a mechanism to retrieve the logged-in user ID
// For example, if you are using sessions:
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect or handle unauthorized access
    // ...
}

$userID = $_SESSION['user_id'];  // Use the logged-in user ID

// Retrieve the last generated IGP number for the current user
$sql = "SELECT igp_itmcd FROM details WHERE user_id = $userID ORDER BY igp_itmcd DESC LIMIT 1";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row["igp_itmcd"];
    $nextInvoiceNumber = intval(substr($lastInvoiceNumber, 3)) + 1; // Extract the numeric part and increment
} else {
    // If no previous number found, start with 1
    $nextInvoiceNumber = 1;
}

$currentDate = date("y") . "XX";
$newInvoiceNumber = $currentDate . str_pad($nextInvoiceNumber, 6, "0", STR_PAD_LEFT);

// Update the current user's invoice number in the database
$sql = "UPDATE details SET igp_itmcd = '$newInvoiceNumber' WHERE user_id = $userID";
$connection->query($sql);

// Close the database connection
$connection->close();

// Send the generated invoice number as the response
echo $newInvoiceNumber;
?>