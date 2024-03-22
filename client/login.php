<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Village Banking System</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .navbar-custom {
      background-color: #007bff !important; /* Blue navbar */
    }
    .product-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <a class="navbar-brand" href="#">VCBS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Media</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>
</nav>
<?php
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if both username and password are provided
  if(isset($_POST['username']) && isset($_POST['password'])) {
      $username = $conn->real_escape_string($_POST['username']);
      $password = $conn->real_escape_string($_POST['password']);

      // Form validation: Check if username and password are not empty
      if(empty($username) || empty($password)) {
          $_SESSION['status'] = "Please enter both username and password";
          header("Location: login.php");
          exit;
      }

      $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Authentication successful, set session variables
          $_SESSION['username'] = $username;
          $_SESSION['status'] = "successful";

          header("Location: index.php");
          exit;
      } else {
          $_SESSION['status'] = "Invalid username or password";
          header("Location: login.php");
          exit;
      }

      // Close connection
      $conn->close();
  }
}

?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Client Login</h1>
                  <?php include('status.php'); ?>
                </div>
                <form class="user" action="#" method="POST">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Enter username..." required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="rememberMe">
                      <label class="custom-control-label" for="rememberMe">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  <hr>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="p-5">
        <h2 class="h4 mb-4">Welcome to VCBS</h2>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget felis vitae purus fermentum ullamcorper. Quisque rhoncus enim sit amet posuere mollis. Donec in dolor nisi.</p>
        <p>Proin ullamcorper nisi ac dapibus consectetur. Duis efficitur urna id magna malesuada, id posuere orci laoreet. Fusce sit amet ante ac elit lacinia aliquam. Integer euismod, nunc eget aliquam dapibus, quam nunc vestibulum magna, non interdum nunc metus sed velit.</p>
      </div>
    </div>
  </div>

</div>

<footer class="footer mt-5">
  <div class="container">
    <p>&copy; 2024 VCBS. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
