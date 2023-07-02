<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the "details" table
$query = "SELECT * FROM details";
$result = $connection->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        ?>
        <html>
        <head>
            <title>Table Display - Enhanced</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
           
        </head>
        <body class="bg-gray-100">
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
        <div class="container mx-auto p-8">
            <h3 class="text-3xl font-bold mb-6">details Table</h3>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">User ID</th>
                        <th class="px-4 py-2">Reference Document Number</th>
                        <th class="px-4 py-2">Reference Document Date</th>
                        <th class="px-4 py-2">Reference Section</th>
                        <th class="px-4 py-2">DC Record Number</th>
                        <th class="px-4 py-2">DC Record Date</th>
                        <th class="px-4 py-2">IGP Item Code</th>
                        <th class="px-4 py-2">Vendor Name</th>
                        <th class="px-4 py-2">IGP AU</th>
                        <th class="px-4 py-2">IGP Item Quantity</th>
                        <th class="px-4 py-2">RB Number</th>
                        <th class="px-4 py-2">Send EPCD</th>
                        <th class="px-4 py-2">Send EPDS</th>
                        <th class="px-4 py-2">MIGP Number</th>
                        <th class="px-4 py-2">MIGP SL</th>
                        <th class="px-4 py-2">ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch data and populate table rows
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo $row["user_id"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["ref_docno"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["ref_docdt"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["ref_sec"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["dc_rec_no"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["dc_rec_dt"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["igp_itmcd"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["vend_name"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["igp_au"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["igp_itmqty"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["rb_no"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["send_epcd"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["send_epds"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["migp_no"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["migp_sl"]; ?></td>
                            <td class="px-4 py-2"><?php echo $row["id"]; ?></td>
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
        echo "No records found in the details table.";
    }
} else {
    echo "Error: " . $connection->error;
}

// Close connection
$connection->close();
?>