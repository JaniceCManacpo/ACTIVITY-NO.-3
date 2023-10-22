<?php
// Database connection
$host     = "localhost";
$username = "root";
$password = "";
$database = "database_name";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the post data
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the data into the database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

if($stmt = $conn->prepare($sql)){
    // Bind the variables to the prepared statement as parameters
    $stmt->bind_param("sss", $username, $email, $hashed_password);
}