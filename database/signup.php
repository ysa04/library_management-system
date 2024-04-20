<?php
// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password = '';      // Your MySQL password
$database = 'library'; // Your database name

// Connect to MySQL
$mysqli = new mysqli($host, $username, $password);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Create database if not exists
$createDbSql = "CREATE DATABASE IF NOT EXISTS $database";
$mysqli->query($createDbSql);
$mysqli->select_db($database);

// Create users table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usn VARCHAR(20) NOT NULL, -- Change data type to VARCHAR and specify maximum length
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($createTableSql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $usn = $_POST['usn'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];
    
    // Prepare INSERT statement
    $insertSql = "INSERT INTO users (usn, pwd, email) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($insertSql);
    
    // Bind parameters and execute statement
    $stmt->bind_param("sss", $usn, $pwd, $email);
    $stmt->execute();
    
    // Check if registration was successful
    if ($stmt->affected_rows > 0) {
        // Redirect to success page
        header("Location: login.html");
        exit(); // Stop further execution
    } else {
        echo "Registration failed. Please try again.";
    }
    
    // Close statement
    $stmt->close();
}

// Close MySQL connection
$mysqli->close();

