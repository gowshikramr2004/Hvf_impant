<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f8f8;
      overflow: hidden;
    }

    .header {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ffffff;
      color: #000000;
      padding: 2rem;
      transition: background-color 0.3s ease;
    }

    .header h2 {
      font-size: 1.5rem;
      text-align: center;
    }

    form {
      margin: 2rem auto;
      max-width: 400px;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    form.show {
      opacity: 1;
      transform: translateY(0);
    }

    .input-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 0.5rem;
      transition: color 0.3s ease;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem;
      border-radius: 0.25rem;
      border: 1px solid #ccc;
      outline: none;
      transition: background-color 0.3s ease, border-color 0.3s ease;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    input[type="text"].focus,
    input[type="password"].focus {
      background-color: #ffffff;
      border-color: #000000;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
    }

    .btn {
      background-color: #000000;
      color: #ffffff;
      padding: 0.75rem 1rem;
      border-radius: 0.25rem;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .btn:hover {
      background-color: #333333;
    }

    p {
      margin-top: 1.5rem;
      text-align: center;
      transition: color 0.3s ease;
    }

    p a {
      color: #000000;
    }

    p a:hover {
      text-decoration: underline;
    }

    .input-group i {
      margin-right: 0.5rem;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("form").addClass("show");
    });
  </script>
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>

  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <i class="far fa-user"></i>
      <label for="username">Enter Username</label>
      <input type="text" name="username" id="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <label for="password">Enter Password</label>
      <input type="password" name="password_1" id="password">
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="password_2" id="confirm_password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>
