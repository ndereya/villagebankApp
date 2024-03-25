<?php
session_start();
include('includes/dbconfig.php');

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        // Prepare and execute the query
        $query = "SELECT * FROM admins WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error in prepare statement: " . $conn->error);
        }

        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if login is successful
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user_name'] = $user['username']; 
            header("Location: index.php"); 
            exit();
        } else {
            $login_error = "Invalid username or password";
        }
    }
}else{
    echo "not set";
}
?>