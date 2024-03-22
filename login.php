<?php
$page_title = "Admin login";
include('includes/header.php'); 
include('includes/dbconfig.php');

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if both username and password are provided
  if(isset($_POST['username']) && isset($_POST['password'])) {
      $username = $conn->real_escape_string($_POST['username']);
      $password = $conn->real_escape_string($_POST['password']);

      $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // Authentication successful, set session variables
          $_SESSION['username'] = $username;
          $_SESSION['status']= "successful";

          header("Location: index.php");
          exit;
      } else {
          $_SESSION['status']= "Invalid username or password";
          header("Location: login.php");

      }

      // Close connection
      $conn->close();
  }
}

?>


<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Staff Login</h1>
                <?php

 include('status.php');

                ?>
              </div>

                <form class="user" action="#" method="POST">

                    <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-user" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit"  class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

