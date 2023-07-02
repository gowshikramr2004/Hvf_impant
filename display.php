<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get table name and column names
$tableName = "details";
$columnQuery = "SHOW COLUMNS FROM " . $tableName;
$columnResult = $connection->query($columnQuery);

if ($columnResult) {
    $columnNames = array();
    while ($columnRow = $columnResult->fetch_assoc()) {
        $columnNames[] = $columnRow['Field'];
    }
} else {
    echo "Error retrieving column names: " . $connection->error;
}

// Retrieve data for the most recent active user from the "details" table
$dataQuery = "SELECT * FROM " . $tableName . " WHERE user_id = (SELECT user_id FROM " . $tableName . " ORDER BY id DESC LIMIT 1)";
$dataResult = $connection->query($dataQuery);

if ($dataResult && $dataResult->num_rows > 0) {
    $dataRows = $dataResult->fetch_all(MYSQLI_ASSOC);
} else {
    $dataRows = array();
    echo "No data found.";
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | MySQL Table Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto my-4">
        <h3 class="text-2xl font-semibold mb-4">Table: <?php echo $tableName; ?></h3>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr>
                    <?php foreach ($columnNames as $columnName) { ?>
                        <th class="border px-4 py-2"><?php echo $columnName; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataRows as $row) { ?>
                    <tr>
                        <?php foreach ($columnNames as $columnName) { ?>
                            <td class="border px-4 py-2"><?php echo $row[$columnName]; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>