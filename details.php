<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create a new connection
$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$successMessage = $errorMessage = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ref_docno = $_POST["ref_docno"];
    $ref_docdt = $_POST["ref_docdt"];
    $ref_sec = $_POST["ref_sec"];
    $dc_rec_no = $_POST["dc_rec_no"];
    $dc_rec_dt = $_POST["dc_rec_dt"];
    $igp_itmcd = $_POST["igp_itmcd"];
    $vend_name = $_POST["vend_name"];
    $igp_au = $_POST["igp_au"];
    $igp_itmqty = $_POST["igp_itmqty"];
    $rb_no = $_POST["rb_no"];
    $send_epcd = $_POST["send_epcd"];
    $send_epds = $_POST["send_epds"];
    $migp_no = $_POST["migp_no"];
    $migp_sl = $_POST["migp_sl"];

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO details (ref_docno, ref_docdt, ref_sec, dc_rec_no, dc_rec_dt, igp_itmcd, vend_name, igp_au, igp_itmqty, rb_no, send_epcd, send_epds, migp_no, migp_sl)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssssssssssss", $ref_docno, $ref_docdt, $ref_sec, $dc_rec_no, $dc_rec_dt, $igp_itmcd, $vend_name, $igp_au, $igp_itmqty, $rb_no, $send_epcd, $send_epds, $migp_no, $migp_sl);

    // Execute the prepared statement
    if ($statement->execute()) {
        // Data inserted successfully
        $successMessage = "Form submitted successfully!";
        // Redirect to package.php
        header("Location: package.php");
        exit(); // Ensure that the script stops executing after redirection
    } else {
        $errorMessage = "Error: " . $statement->error;
    }

    // Close the prepared statement
    $statement->close();
}

// Retrieve the last invoice number from the database
$sql = "SELECT igp_itmcd FROM details ORDER BY igp_itmcd DESC LIMIT 1";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row["igp_itmcd"];
    
    $nextInvoiceNumber = intval($lastInvoiceNumber) + 1;
} else {
    // If no previous number found, start with 1
    $nextInvoiceNumber = 1;
}

// Construct the new invoice number
$currentDate = date("y") . "11";
$newInvoiceNumber = $currentDate . str_pad($nextInvoiceNumber, 6, "0", STR_PAD_LEFT);

// Update the current user's invoice number in the database
$userID = 123;  // Replace with the appropriate user ID
$sql = "UPDATE details SET igp_itmcd = ? WHERE user_id = ?";
$statement = $connection->prepare($sql);
$statement->bind_param("si", $newInvoiceNumber, $userID);
$statement->execute();

// Close the prepared statement
$statement->close();

// Close the database connection
$connection->close();

// Output the success or error message
if (!empty($successMessage)) {
    echo "<p>$successMessage</p>";
}
if (!empty($errorMessage)) {
    echo "<p>$errorMessage</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Supply Details</title>
    <style>
       
       html {
  height:100%;
}

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
        form, .content {
    width: 30%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
   
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
</head>

<body>
<?php include "nav.php"; ?>

<form id='myform' method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="border-radius: 20px; position: relative; top: 50px; height: auto; padding: 20px;width:65%;">
    <hr class="my-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="ref_docno" class="text-gray-600 text-lg font-semibold">HVF Supply Order Number</label>
            <input type="text" name="ref_docno" id="ref_docno" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="ref_docdt" class="text-gray-600 text-lg font-semibold">HVF Supply Order Date</label>
            <input type="date" name="ref_docdt" id="ref_docdt" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="ref_sec" class="text-gray-600 text-lg font-semibold">Section</label>
            <input type="text" name="ref_sec" id="ref_sec" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="dc_rec_no" class="text-gray-600 text-lg font-semibold">DC Rec No</label>
            <input type="text" name="dc_rec_no" id="dc_rec_no" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="dc_rec_dt" class="text-gray-600 text-lg font-semibold">DC Rec Date</label>
            <input type="date" name="dc_rec_dt" id="dc_rec_dt" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="igp_itmcd" class="text-gray-600 text-lg font-semibold">IGP Item Code</label>
            <input type="text" readonly name="igp_itmcd" id="igp_itmcd" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="vend_name" class="text-gray-600 text-lg font-semibold">Vendor Name</label>
            <input type="text" name="vend_name" id="vend_name" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="igp_au" class="text-gray-600 text-lg font-semibold">IGP Authority</label>
            <input type="text" name="igp_au" id="igp_au" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="igp_itmqty" class="text-gray-600 text-lg font-semibold">IGP Item Quantity</label>
            <input type="number" name="igp_itmqty" id="igp_itmqty" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="rb_no" class="text-gray-600 text-lg font-semibold">RB Number</label>
            <input type="text" name="rb_no" id="rb_no" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="send_epcd" class="text-gray-600 text-lg font-semibold">Sending EPCD</label>
            <input type="text" name="send_epcd" id="send_epcd" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="send_epds" class="text-gray-600 text-lg font-semibold">Sending EPDS</label>
            <input type="text" name="send_epds" id="send_epds" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="migp_no" class="text-gray-600 text-lg font-semibold">MIGP Number</label>
            <input type="text" name="migp_no" id="migp_no" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label for="migp_sl" class="text-gray-600 text-lg font-semibold">MIGP SL</label>
            <input type="text" name="migp_sl" id="migp_sl" required class="rounded-md border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
    </div>

    
    <div class="mt-6 inline-flex rounded-md shadow-sm">
    
    <button type="reset" id="resetBtn" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Reset
    </button>
    <button type="submit"  onclick="submitForm(); setTimeout(function(){ window.location.href = 'package.php'; }, 2000);" id="nextBtn" value="submit" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Next
    </button>
</div>

    <?php if ($successMessage): ?>
        <p class="text-green-600 mt-4"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <p class="text-red-600 mt-4"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
</form>
<script>
    function submitForm() {
  document.getElementById('myForm').submit();
  var igpNumber = document.getElementById('igp_itmcd').value;

  // Display the generated IGP number to the user
  alert('Your IGP number: ' + igpNumber);
  onlclick="window.location.href = 'package.php'"
}

function setInvoiceNumber(invoiceNumber) {
  document.getElementById('igp_itmcd').value = invoiceNumber;

}

// Make an AJAX request to the PHP script to get the invoice number
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      var invoiceNumber = xhr.responseText;
      setInvoiceNumber(invoiceNumber);
    } else {
      console.error('Error: ' + xhr.status);
    }
  }
};

xhr.open('GET', 'get_invoice_number.php', true);
xhr.send();

        $(document).ready(function() {
          
            $("#resetBtn").on("click", function() {
                // Clear all input fields in the form
                $("form input[type='text'], form input[type='date']").val("");
            });
        });
</script>
<script src="three.r134.min.js"></script>
<script src="vanta.net.min.js"></script>
<script>
VANTA.NET({
  el: "#myform",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00
})
</script>
</body>
</html>