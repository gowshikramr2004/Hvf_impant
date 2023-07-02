<?php
session_start();

// Check if the login form is submitted
if (isset($_POST['login_user'])) {
  // Get the entered username
  $username = $_POST['username'];
  // Get the entered password
  $password = $_POST['password'];

  // Connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'project');

  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL query to fetch user details
  $query = "SELECT * FROM users WHERE username=? LIMIT 1";

  // Prepare the statement
  $stmt = mysqli_prepare($db, $query);

  // Bind the parameter
  mysqli_stmt_bind_param($stmt, "s", $username);

  // Execute the query
  mysqli_stmt_execute($stmt);

  // Get the result
  $result = mysqli_stmt_get_result($stmt);

  // Check if the query was successful
  if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Verify the password using password_verify function
    if (password_verify($password, $user['password'])) {
      // Password is correct, set session variables and redirect to details.php
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $user['id'];
      header("Location: details.php");
      exit();
    } else {
      // Invalid password
      $attempts_query = "SELECT * FROM login_attempts WHERE username=?";
      $attempts_stmt = mysqli_prepare($db, $attempts_query);
      mysqli_stmt_bind_param($attempts_stmt, "s", $username);
      mysqli_stmt_execute($attempts_stmt);
      $attempts_result = mysqli_stmt_get_result($attempts_stmt);

      if ($attempts_result && mysqli_num_rows($attempts_result) > 0) {
        $attempts = mysqli_fetch_assoc($attempts_result);
        $count = $attempts['attempts'];

        if ($count >= 3) {
          $lockout_until = strtotime($attempts['lockout_time']);
          $current_time = time();

          if ($lockout_until > $current_time) {
            // User is locked out
            $remaining_time = $lockout_until - $current_time;
            echo '<script>';
            echo 'alert("Too many failed attempts. Login is locked for ' . $remaining_time . ' seconds.");';
            echo 'setTimeout(function(){ window.location.href = "loginscr.php"; }, ' . ($remaining_time * 1000) . ');';
            echo '</script>';
            exit();
          } else {
            // Reset attempts count and lockout time
            $reset_query = "UPDATE login_attempts SET attempts=0, lockout_time=NULL WHERE username=?";
            $reset_stmt = mysqli_prepare($db, $reset_query);
            mysqli_stmt_bind_param($reset_stmt, "s", $username);
            mysqli_stmt_execute($reset_stmt);
          }
        }
      }

      // Update login attempts
      $update_query = "INSERT INTO login_attempts (username, attempts) VALUES (?, 1)
        ON DUPLICATE KEY UPDATE attempts = attempts + 1, lockout_time = IF(attempts >= 3, NOW() + INTERVAL 30 SECOND, lockout_time)";
      $update_stmt = mysqli_prepare($db, $update_query);
      mysqli_stmt_bind_param($update_stmt, "s", $username);
      mysqli_stmt_execute($update_stmt);

      echo '<script>';
      echo 'alert("Invalid password. Please try again.");';
      echo 'window.location.href = "loginscr.php";';
      echo '</script>';
      exit();
    }
  } else {
    // Invalid username
    echo '<script>';
    echo 'alert("Invalid username. Please try again.");';
    echo 'window.location.href = "loginscr.php";';
    echo '</script>';
  }

  // Close the database connection
  mysqli_close($db);
} elseif (isset($_SESSION['user_id'])) {
  // If the user is already logged in, you can identify the current user using the user_id in the session
  $user_id = $_SESSION['user_id'];

  // Connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'project');

  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL query to fetch user details using user_id
  $query = "SELECT * FROM users WHERE id=? LIMIT 1";

  // Prepare the statement
  $stmt = mysqli_prepare($db, $query);

  // Bind the parameter
  mysqli_stmt_bind_param($stmt, "i", $user_id);

  // Execute the query
  mysqli_stmt_execute($stmt);

  // Get the result
  $result = mysqli_stmt_get_result($stmt);

  // Check if the query was successful
  if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // You can access the current user's details using the $user variable
    $username = $user['username'];
    // ... other user details

    // Redirect or display information for the logged-in user
    header("Location: details.php");
    exit();
  } else {
    // If the user_id in the session does not exist in the database, invalidate the session
    session_unset();
    session_destroy();

    // Redirect the user to the login page
    header("Location: loginscr.php");
    exit();
  }

  // Close the database connection
  mysqli_close($db);
}
?>