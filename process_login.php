<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "bunjsacco";

    $conn = new mysqli($host, $usernameDB, $passwordDB, $dbname);

    // Check the 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['admin_logged_in'] = true;

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
