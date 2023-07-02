\<!DOCTYPE html>
<html>
<head>
    <title>Escort Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">
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
        html {
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
        <script>
        function confirmSubmit() {
            if (confirm("Are you sure you want to submit press cancel goto home page?")) {
                return true; // Continue with form submission
            } else {
                // Redirect to details.php when cancel is pressed
                window.location.href = "details.php";
                return false; // Cancel form submission
            }
        }
        
    </script>
</head>
<body>
    <?php
    // Establish database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $connection = new mysqli($host, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $escrt_id = $_POST["escrt_id"];
        $escrt_nam = $_POST["escrt_nam"];
        $escrt_desg = $_POST["escrt_desg"];

        $sql = "SELECT user_id FROM users ORDER BY id DESC LIMIT 10";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row["user_id"];

            // Insert data into the database
            $sql = "INSERT INTO escrt_details (user_id, escrt_id, escrt_nam, escrt_desg) VALUES ('$user_id', '$escrt_id', '$escrt_nam', '$escrt_desg')";
            if ($connection->query($sql) === true) {
                header("Location: navpage.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        }
    }

    // Close the database connection
    $connection->close();
    ?>

    <?php include "nav.php"; ?>
  

    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label for="escrt_id" class="block mb-2">Escort ID:</label>
                <input type="text" name="escrt_id" id="escrt_id">
            </div>
            <div class="mb-4">
                <label for="escrt_nam" class="block mb-2">Escort Name:</label>
                <input type="text" name="escrt_nam" id="escrt_nam">
            </div>
            <div class="mb-4">
                <label for="escrt_desg" class="block mb-2">Escort Designation:</label>
                <input type="text" name="escrt_desg" id="escrt_desg">
            </div>

            <div class="inline-flex rounded-md shadow-sm">
                <button id="prevBtn" type="button" onclick="window.location.href='document.php'" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Prev
                </button>
                <button id="resetBtn" type="reset" value="Reset" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Reset
                </button>
                <button id="nextBtn" type="submit"  onclick="return confirmSubmit();" value="save" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>