<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cd = $_POST['cd'];
        $avl = $_POST['avl'];

        // Get the current user's ID (assuming you have stored it in a session variable)
        session_start();
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO doc_details (user_id, cd, avl) VALUES ('$user_id', '$cd', '$avl')";

        if ($connection->query($sql) === true) {
            echo "<p>Data inserted successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $connection->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <style>
        /* Add your custom styles here */
        body {
  margin: 0;
  background-image: url("https://plus.unsplash.com/premium_photo-1661875576496-01a57a1f13a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: inherit;
  z-index: inherit;
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
        .form-container {
            width: 30%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 20px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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

        .inline-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .rounded-l-lg {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .rounded-r-md {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-blue-700 {
            --text-opacity: 1;
            color: #2b6cb0;
            color: rgba(43, 108, 176, var(--text-opacity));
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity));
        }

        .border {
            border-width: 1px;
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity));
        }

        .border-t {
            border-top-width: 1px;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .hover\:bg-gray-100:hover {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .hover\:text-blue-700:hover {
            --text-opacity: 1;
            color: #2b6cb0;
            color: rgba(43, 108, 176, var(--text-opacity));
        }

        .focus\:z-10:focus {
            z-index: 10;
        }

        .focus\:ring-2:focus {
            --ring-opacity: 1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
            outline: none;
            border-color: #93c5fd;
            border-color: rgba(147, 197, 253, var(--ring-opacity));
        }

        .focus\:ring-blue-700:focus {
            --ring-opacity: 1;
            box-shadow: 0 0 0 3px rgba(43, 108, 176, 0.5);
            outline: none;
            border-color: #2b6cb0;
            border-color: rgba(43, 108, 176, var(--ring-opacity));
        }

        /* Mobile-friendly styles */
        @media (max-width: 640px) {
            .form-container {
                width: 100%;
                padding: 10px;
            }

            input[type="text"] {
                font-size: 16px;
            }

            .inline-flex {
                flex-direction: column;
            }

            .rounded-l-lg {
                border-top-left-radius: 0.375rem;
                border-top-right-radius: 0.375rem;
            }

            .rounded-r-md {
                border-top-left-radius: 0.375rem;
                border-top-right-radius: 0.375rem;
                border-bottom-right-radius: 0.375rem;
            }

            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .text-sm {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <?php include "nav.php"; ?>
  
    <main class="block mb-2" data-aos="fade-up">
        <div style="position:relative; top:80px;" class="form-container">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="mb-4">
                    <label for="cd" class="block mb-2">CD:</label>
                    <input type="text" name="cd" id="cd" required>
                </div>
                <div class="mb-4">
                    <label for="avl" class="block mb-2">AVL:</label>
                    <input type="text" name="avl" id="avl" required>
                </div>
                <div class="inline-flex rounded-md shadow-sm">
                    <a id="prevBtn" type="button" onclick="window.location.href='vehicle.php'" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Prev
                    </a>
                    <a id="resetBtn" type="reset" value="Reset" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Reset
                    </a>
                    <button id="nextBtn" type="submit" value="save" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Next
                    </button>
                </div>
            </form>
            <?php
            if (isset($success_message)) {
                echo '<p class="text-green-500 mt-4">' . $success_message . '</p>';
            }
            if (isset($error_message)) {
                echo '<p class="text-red-500 mt-4">' . $error_message . '</p>';
            }
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
