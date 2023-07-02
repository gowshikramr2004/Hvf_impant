<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the "pkg_details" table
$query = "SELECT * FROM pkg_details";
$result = $connection->query($query);

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
    <h3 class="text-3xl font-bold mb-6">pkg_details Table</h3>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="table">
            <thead>
            <tr>
                <th class="px-4 py-2">user_id</th>
                <th class="px-4 py-2">pkg_mod</th>
                <th class="px-4 py-2">no_of_pkg</th>
                <th class="px-4 py-2">pkg_slno</th>
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
                    <td class="px-4 py-2"><?php echo $row["pkg_mod"]; ?></td>
                    <td class="px-4 py-2"><?php echo $row["no_of_pkg"]; ?></td>
                    <td class="px-4 py-2"><?php echo $row["pkg_slno"]; ?></td>
                    <td class="px-4 py-2"><?php echo $row["id"]; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Add user-friendly features using JavaScript
    document.addEventListener("DOMContentLoaded", function () {
        const tableRows = document.querySelectorAll(".table tbody tr");
        tableRows.forEach(function (row) {
            row.addEventListener("click", function () {
                // Highlight the clicked row
                row.classList.toggle("bg-blue-100");

                // Get data from the clicked row
                const rowData = Array.from(row.querySelectorAll("td")).map(function (cell) {
                    return cell.textContent;
                });

                // Log the data to the console
                console.log(rowData);
            });
        });
    });
</script>
</body>
</html>
    <?php
} else {
    echo "No records found in the escrt_details table.";
}

// Close connection
$connection->close();
?>
