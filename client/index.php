<!DOCTYPE html>
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

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 text-center">
      <img src="bank_image.jpg" class="img-fluid mb-4" alt="Bank Image">
      <h1>Welcome to VCBS</h1>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-4">
      <div class="product-card">
        <h2>Product 1</h2>
        <p>Description of Product 1 goes here.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-card">
        <h2>Product 2</h2>
        <p>Description of Product 2 goes here.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-card">
        <h2>Product 3</h2>
        <p>Description of Product 3 goes here.</p>
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
