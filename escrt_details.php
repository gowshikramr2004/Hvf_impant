<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the "escrt_details" table
$query = "SELECT * FROM escrt_details";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    ?>
    <html>
    <head>
        <title>Table Display</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <body>
    <html>
<head>
    <title>Table Display - Apple-inspired</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
         
        .table {
            width: 100%;
        }

        .table th {
            background-color: #F3F4F6;
            font-weight: 600;
            padding: 0.75rem;
            text-align: left;
        }

        .table td {
            background-color: #FFFFFF;
            padding: 0.75rem;
            vertical-align: top;
            border-bottom-width: 1px;
            border-bottom-color: #E5E7EB;
        }

        .table tr:last-child td {
            border-bottom: none;
        }
    
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
            width: 100%;
        }

        .table th {
            background-color: #f4f4f4;
            font-weight: 600;
            text-align: left;
            padding: 15px;
        }

        .table td {
            background-color: #ffffff;
            padding: 15px;
        }

        .table tr:first-child td {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table tr:last-child td {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .table td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container mx-auto mt-8">
    <h3 class="text-2xl font-bold mb-4">escrt_details Table</h3>
    <table class="table">
        <thead>
        <tr>
            <th class="px-4 py-2">user_id</th>
            <th class="px-4 py-2">escrt_id</th>
            <th class="px-4 py-2">escrt_nam</th>
            <th class="px-4 py-2">escrt_desg</th>
            <th class="px-4 py-2">id</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch data and populate table rows
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td class="px-4 py-2"><?php echo $row["user_id"]; ?></td>
                <td class="px-4 py-2"><?php echo $row["escrt_id"]; ?></td>
                <td class="px-4 py-2"><?php echo $row["escrt_nam"]; ?></td>
                <td class="px-4 py-2"><?php echo $row["escrt_desg"]; ?></td>
                <td class="px-4 py-2"><?php echo $row["id"]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

    <?php
} else {
    echo "No records found in the escrt_details table.";
}

// Close connection
$connection->close();
?>
