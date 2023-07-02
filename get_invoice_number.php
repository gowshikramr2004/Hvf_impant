<?php
// Establish a connection to your database
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the last used invoice number from the database
$sql = "SELECT igp_itmcd FROM details ORDER BY igp_itmcd DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row["igp_itmcd"];
    $nextInvoiceNumber = intval(substr($lastInvoiceNumber, 4)) + 1;
} else {
    // If no previous number found, start with 1
    $nextInvoiceNumber = 1;
}

// Construct the new invoice number
$currentYear = date("y");
$newInvoiceNumber = $currentYear . '11' . str_pad($nextInvoiceNumber, 6, "0", STR_PAD_LEFT);

// Update the current user's invoice number in the database
$userID = 123;  // Replace with the appropriate user ID
$sql = "UPDATE details SET igp_itmcd = '$newInvoiceNumber' WHERE user_id = $userID";
if ($conn->query($sql) === TRUE) {
    // Return the new invoice number as the response
    echo $newInvoiceNumber;
} else {
    
   
echo "Error updating invoice number: " . $conn->error;
}

// Close the database connection
$conn->close();
?>