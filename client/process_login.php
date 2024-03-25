<?php
session_start();
include('dbconfig.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["accountnumber"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE account_number=? AND password1=?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_account_number'] = $user['account_number']; 
        $_SESSION['user_name'] = $user['full_name']; 
        $_SESSION['user_balance'] = $user['balance']; 
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
