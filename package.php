<!DOCTYPE html>
<html>
<head>
    <title>Package Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
    <style>
        /* Apple-inspired styles */
        body {
  margin: 0;
  background-image: url("https://plus.unsplash.com/premium_photo-1661875576496-01a57a1f13a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: inherit;
  z-index: inherit;
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
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
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
        }

        .custom-button1 {
            background-color: #000;
            color: #fff;
            border: none;
            margin-right: 10px;
        }

        .custom-button1:hover {
            background-color: #333;
        }

        .custom-button {
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
        }

        .custom-button:hover {
            background-color: #f2f2f7;
        }

        form {
            border-radius: 20px;
        }html {
  height:100%;
}

body {
  margin:0;
}

.bg {
  animation:slide 3s ease-in-out infinite alternate;
  background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
  bottom:0;
  left:-50%;
  opacity:.5;
  position:fixed;
  right:-50%;
  top:0;
  z-index:-1;
}

.bg2 {
  animation-direction:alternate-reverse;
  animation-duration:4s;
}

.bg3 {
  animation-duration:5s;
}

.content {
  background-color:rgba(255,255,255,.8);
  border-radius:.25em;
  box-shadow:0 0 .25em rgba(0,0,0,.25);
  box-sizing:border-box;
  left:50%;
  padding:10vmin;
  position:fixed;
  text-align:center;
  top:50%;
  transform:translate(-50%, -50%);
}

h1 {
  font-family:monospace;
}

@keyframes slide {
  0% {
    transform:translateX(-25%);
  }
  100% {
    transform:translateX(25%);
  }
}
        form, .content {
    width: 30%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
   
}
    </style><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#nextBtn").on("click", function () {
            // Navigate to details.php on the first click
            if ($(this).attr("value") === "save") {
                window.location.href = "vehicle.php";
            }
            // Navigate to vehicle.php on the second click
            else {
                window.location.href = "details.php";
            }
        });

        $("#resetBtn").on("click", function () {
            // Clear all input fields in the form
            $("form input[type='text'], form input[type='date']").val("");
        });
    });
    function validateForm() {
    var pkgMod = document.getElementById("pkg_mod").value;
    var noOfPkg = document.getElementById("no_of_pkg").value;
    var pkgSlno = document.getElementById("pkg_slno").value;

    if (pkgMod.trim() === "" || noOfPkg.trim() === "" || pkgSlno.trim() === "") {
      alert("Please fill in all the fields.");
      return false;
    }

    return true;
  }
</script>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form values
    $pkg_mod = $_POST["pkg_mod"];
    $no_of_pkg = $_POST["no_of_pkg"];
    $pkg_slno = $_POST["pkg_slno"];
  
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    // Create a new MySQLi connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO pkg_details (user_id, pkg_mod, no_of_pkg, pkg_slno) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $user_id, $pkg_mod, $no_of_pkg, $pkg_slno);

    // Set the user_id value (you need to modify this according to your requirements)
    $user_id = 1; // Replace 1 with the actual user ID

    // Execute the statement
    if ($stmt->execute()) {
        // Insertion successful
        echo "Values inserted successfully into the pkg_details table.";
    } else {
        // Insertion failed
        echo "Error inserting values: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <form style="width: 482px" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="mb-4">
            <label for="pkg_mod" class="block mb-2">Package Mod:</label>
            <input type="text" name="pkg_mod" id="pkg_mod" style="text-transform: uppercase;" required>
        </div>
        <div class="mb-4">
            <label for="no_of_pkg" class="block mb-2">No of Packages:</label>
            <input type="text" name="no_of_pkg" id="no_of_pkg" required>
        </div>
        <div class="mb-4">
            <label for="pkg_slno" class="block mb-2">Package SNO:</label>
            <input type="text" name="pkg_slno" id="pkg_slno" style="text-transform: uppercase;" required>
        </div>
        <div class="flex justify-between mt-6">
            <div class="inline-flex rounded-md shadow-sm">
                <a type="button" onclick="window.location.href='details.php'"
                   aria-current="page"
                   class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Prev
                </a>
                <button id="resetBtn" type="reset" value="Reset"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Reset
                </button>
                <button id="nextBtn" type="submit" value="save"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Next
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
