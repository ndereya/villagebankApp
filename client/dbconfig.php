<?php

$server = 'localhost';
$username = 'root';
$pass = '';
$db = 'bunjsacco';


$conn = mysqli_connect($server, $username, $pass, $db);

if (!$conn) {
   
    die('Connection failed: ' . mysqli_connect_error());
}

?>
