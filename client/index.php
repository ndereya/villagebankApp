<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Village Banking System</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom {
      background-color: #007bff !important;
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-brand {
      margin-left: 0;
    }
    .navbar-nav {
      width: 100%;
    }
    .navbar-nav .nav-link {
      padding-right: 20px;
    }
    .product-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      height: 100%;
      background-color: #f8f9fa;
    }
    .footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      text-align: center;
      width: 100%;
    }
    .header-img {
      width: 100%;
      height: auto;
      position: relative;
    }
    .header-text {
      position: absolute; 
      top: 50%; 
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 36px;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid">
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
          <a class="nav-link" href="#">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-12 text-center">
      <img src="fam.jpg" class="img-fluid header-img" alt="Bank Image">
      <div class="header-text">Welcome to VCBS</div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-4">
      <div class="product-card">
        <h2>Farmers Savings</h2>
        <p>A savings account tailored for farmers with attractive interest rates and flexible withdrawal options.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-card">
        <h2>Super Woman Saver</h2>
        <p>An exclusive savings account for women empowering them with financial independence and security.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-card">
        <h2>Loans</h2>
        <p>Various loan options available with competitive interest rates to fulfill your financial needs.</p>
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
