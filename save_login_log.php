<?php
$servername = "localhost";
$username = "root";
$password = ""; // Your database password
$dbname = "login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from request
$username = $_POST['username'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO login_logs (username) VALUES (?)");
$stmt->bind_param("s", $username);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
