<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the "users" table
$query = "SELECT * FROM users";
$result = $connection->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        ?>
        <html>
        <head>
            <title>Table Display - Enhanced</title>
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
            </style>
        </head>
        <body class="bg-gray-100">
        <div class="container mx-auto p-8">
            <h3 class="text-3xl font-bold mb-6">Users Table</h3>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">User ID</th>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Password</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch data and populate table rows
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo $row["id"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["user_id"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["username"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["password"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["Date"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "No records found in the users table.";
    }
} else {
    echo "Error: " . $connection->error;
}

// Close connection
$connection->close();
?>
