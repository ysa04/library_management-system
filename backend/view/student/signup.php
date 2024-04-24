<?php

// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password =  'ysa_2024_gatongay';      // Your MySQL password
$database = 'users_category'; // Your database name

// Connect to MySQL
$mysqli = new mysqli($host, $username, $password);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Create database if not exists
$createDbSql = "CREATE DATABASE IF NOT EXISTS $database";
$mysqli->query($createDbSql);
$mysqli->select_db($database);

// Create student_information table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS student_info ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    usn_number VARCHAR(20) NOT NULL, -- Change data type to VARCHAR and specify maximum length
    password VARCHAR(255) NOT NULL
)";
$mysqli->query($createTableSql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $usn_number = $_POST['usn_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    
    
    // Prepare INSERT statement
    $insertSql = "INSERT INTO student_info (usn_number,first_name,last_name,age,email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertSql);
    
    // Bind parameters and execute statement
    $stmt->bind_param("ssssss", $usn_number,$first_name, $last_name,$age,$email,$password);
    $stmt->execute();
    
    // Check if registration was successful
    if ($stmt->affected_rows > 0) {
        // Redirect to success page
        header("Location: ../../../backend/view/index.php");
        exit(); // Stop further execution
    } else {
        echo "Registration failed. Please try again.";
    }
    
    // Close statement
    $stmt->close();
}

// Close MySQL connection
$mysqli->close();

