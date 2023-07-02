<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Establish database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vehNo = $_POST["vehNo"];
        $lrNo = $_POST["lrNo"];
        $lr_recdt = $_POST["lr_recdt"];

        $sql = "SELECT user_id FROM users ORDER BY id DESC LIMIT 10";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row["user_id"];

            // Insert data into the database
            $insertSql = "INSERT INTO veh_details (user_id, vehNo, lrNo, lr_recdt) VALUES ('$user_id', '$vehNo', '$lrNo', '$lr_recdt')";
            if (mysqli_query($connection, $insertSql)) {
                header("Location: documents.php");
                exit;
            } else {
                $error = "Error: " . $insertSql . "<br>" . mysqli_error($connection);
            }
        }
    }

    // Close the database connection
    mysqli_close($connection);
    ?>

    <?php include "nav.php"; ?>
  
    <div class="container">
        <form style="width: 482px" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label for="vehNo" class="block mb-2">Vehicle No:</label>
                <input type="text" id="vehNo" name="vehNo" required>
            </div>
            <div class="mb-4">
                <label for="lrNo" class="block mb-2">Lorry Receipt Number:</label>
                <input type="text" id="lrNo" name="lrNo" required>
            </div>
            <div class="mb-4">
                <label for="lr_recdt" class="block mb-2">Lorry Receipt Date:</label>
                <input type="date" id="lr_recdt" name="lr_recdt">
            </div>
                          
            <div class="inline-flex rounded-md shadow-sm">
                <a type="button" onclick="window.location.href='package.php'" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Prev
                </a>
                <button type="reset" id="resetBtn" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Reset
                </button>
                <button type="submit" id="nextBtn" value="save" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Next
                </button>
            </div>
            <?php if (isset($error)): ?>
            <div class="mt-4 text-red-600">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#nextBtn").on("click", function() {
                // Navigate to documents.php on the first click
                if ($(this).attr("value") === "save") {
                    window.location.href = "documents.php";
                }
                // Navigate to package.php on the second click
                else {
                    window.location.href = "package.php";
                }
            });

            $("#resetBtn").on("click", function() {
                // Clear all input fields in the form
                $("form input[type='text'], form input[type='date']").val("");
            });
        });
    </script>
    <style>
    body {
        margin: 0;
        background-image: url("https://plus.unsplash.com/premium_photo-1661875576496-01a57a1f13a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: inherit;
        z-index: inherit;
    }
    form {
        border-radius: 20px;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 14px;
        color: #555;
    }

    .custom-button1,
    .custom-button {
        appearance: none;
        -webkit-appearance: none;
        border-radius: 8px;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .custom-button1 {
        background-color: #333;
        color: #fff;
        border: none;
        margin-right: 10px;
    }

    .custom-button1:hover {
        background-color: #555;
    }

    .custom-button {
        background-color: #fff;
        color: #333;
        border: 1px solid #333;
    }

    .custom-button:hover {
        background-color: #f2f2f7;
    }

    /* Mobile-friendly styles */
    @media (max-width: 640px) {
        .container {
            padding: 10px;
        }

        input[type="text"] {
            font-size: 16px;
        }

        .custom-button1,
        .custom-button {
            padding: 10px 20px;
            font-size: 16px;
        }
    }
    </style>
</body>
</html>