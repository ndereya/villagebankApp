<?php
session_start();

if (!isset($_SESSION['user_account_number']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_balance'])) {
    header("Location: login.php"); 
    exit();
}

$user_account_number = $_SESSION['user_account_number'];
$user_name = $_SESSION['user_name'];
$user_balance = $_SESSION['user_balance']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      color: #333;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #007bff;
    }
    p {
      margin-bottom: 20px;
    }
    a {
      display: block;
      margin-bottom: 10px;
      color: #007bff;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    .product-card {
      border: 1px solid #007bff;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #fff;
      color: #007bff;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }
    .product-card:hover {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>
<body>
  <h2>Welcome, <?php echo $user_name; ?>!</h2>
  <p>Your Account balance: <?php echo $user_balance; ?></p>
  <a href="#">Profile</a><br>
  <a href="#">Subscribe to Products</a><br>
   <a href="index.php">Logout</a>
   <div class="product-card">
      <h3>Product 1</h3>
      <p>Description of Product 1 goes here.</p>
    </div>
    <div class="product-card">
      <h3>Product 2</h3>
      <p>Description of Product 2 goes here.</p>
    </div>
    <div class="product-card">
      <h3>Product 3</h3>
      <p>Description of Product 3 goes here.</p>
    </div>
  </div>
</body>
</html>