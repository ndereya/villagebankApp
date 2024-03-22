<?php
include('includes/dbconfig.php');

// Check if the database connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch clients from the database
$sql = "SELECT full_name, job, longitude, latitude FROM users";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

$clients = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clients[] = $row;
    }
}

// Close the database connection
$conn->close();

header('Content-Type: application/json');
echo json_encode($clients);
?>
