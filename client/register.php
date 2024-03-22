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
                <h1 class="h4 text-gray-900 mb-4">Register a Client Here!</h1>
                <?php
                    include('status.php');
                ?>
              </div>

              <form action="process_register.php" method="POST">

                <div class="modal-body">

                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" name="registerbtn" class="btn btn-primary">Register</button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="p-5">
      <h2 class="h4 mb-4">Why Register with VCBS?</h2>
      <p class="mb-4">Registering with VCBS allows you to access a wide range of banking services tailored to meet your needs. Experience the convenience of online banking, secure transactions, and personalized customer support.</p>
      <p>Join VCBS today and take control of your financial future!</p>
    </div>
  </div>

</div>

</div>

<script>
  // Get location using HTML5 Geolocation API
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  // Display position
  function showPosition(position) {
    document.getElementById("latitude").value = position.coords.latitude;
    document.getElementById("longitude").value = position.coords.longitude;
  }

  // Call getLocation() when the page is loaded
  window.onload = getLocation;
</script>
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
