<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get all table names
$tableQuery = "SHOW TABLES";
$tableResult = $connection->query($tableQuery);

if ($tableResult) {
    while ($tableRow = $tableResult->fetch_row()) {
        $tableName = $tableRow[0];
        echo "Table: " . $tableName . "<br>";

        // Get all column names for each table
        $columnQuery = "SHOW COLUMNS FROM " . $tableName;
        $columnResult = $connection->query($columnQuery);

        if ($columnResult) {
            while ($columnRow = $columnResult->fetch_assoc()) {
                echo "Column: " . $columnRow['Field'] . "<br>";
            }
        } else {
            echo "Error retrieving column names: " . $connection->error;
        }

        echo "<br>";
    }
} else {
    echo "Error retrieving table names: " . $connection->error;
}

// Close connection
$connection->close();
?>
