<?php
// Check if the form is submitted
if (isset($_POST['reg_user'])) {
  // Get the entered username, password, and confirm password
  $username = $_POST['username'];
  $password = $_POST['password_1'];
  $confirm_password = $_POST['password_2'];

  // Validate the form data
  if (empty($username) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all fields";
  } elseif ($password !== $confirm_password) {
    echo "Password and Confirm Password do not match";
  } else {
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'project');

    // Check the connection
    if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the username already exists in the database
    $check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $check_result = mysqli_query($db, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      // Username already exists
      echo '<script>';
      echo 'if(confirm("Username already exists. Do you want to go to the login page?")){';
      echo 'window.location.href = "loginscr.php";';
      echo '}';
      echo '</script>';
    } else {
      // Hash the password using bcrypt
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Generate a unique 4-digit number as the user ID
      $user_id = mt_rand(10000, 99999);

      // Insert the new user into the database with the generated user ID
      $insert_query = "INSERT INTO users (user_id, username, password) VALUES ('$user_id', '$username', '$hashed_password')";

      // Execute the insert query
      if (mysqli_query($db, $insert_query)) {
        // User registration successful
        echo '<script>alert("User registered successfully. Your account has been created. Your User ID is '.$user_id.'");</script>';
        echo '<script>window.location.href = "loginscr.php";</script>';
        exit();
      } else {
        // Error occurred while inserting user
        echo "Error: " . mysqli_error($db);
      }
    }

    // Close the database connection
    mysqli_close($db);
  }
}
?>



