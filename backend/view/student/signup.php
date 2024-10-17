<?php

// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password =  '';      // Your MySQL password
$database = 'users_category'; // Your database name

// Connect to MySQL
$mysqli = new mysqli($host, $username, $password);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create database if not exists
$createDbSql = "CREATE DATABASE IF NOT EXISTS $database";
$mysqli->query($createDbSql);
$mysqli->select_db($database);

// Create student_information table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS student_info ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    usn_number VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    course VARCHAR(30) NOT NULL,
    year VARCHAR(30) NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($createTableSql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $usn_number = trim($_POST['usn_number']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);
    $year = trim($_POST['year']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    // Check if USN or email already exists
    $is_usn_taken = false;
    $is_email_registered = false;
    
    // Prepare SELECT statements
    $selectUsnSql = "SELECT id FROM student_info WHERE usn_number = ?";
    $selectEmailSql = "SELECT id FROM student_info WHERE email = ?";
    
    // Check if USN number is already taken
    $stmtUsn = $mysqli->prepare($selectUsnSql);
    $stmtUsn->bind_param("s", $usn_number);
    $stmtUsn->execute();
    $stmtUsn->store_result();
    if ($stmtUsn->num_rows > 0) {
        $is_usn_taken = true;
    }
    $stmtUsn->close();
    
    // Check if email is already registered
    $stmtEmail = $mysqli->prepare($selectEmailSql);
    $stmtEmail->bind_param("s", $email);
    $stmtEmail->execute();
    $stmtEmail->store_result();
    if ($stmtEmail->num_rows > 0) {
        $is_email_registered = true;
    }
    $stmtEmail->close();
    
    // If USN or email already taken, redirect back to register.php with error messages
    if ($is_usn_taken || $is_email_registered) {
        $error_params = "";
        if ($is_usn_taken) {
            $error_params .= "error_usn=USN%20number%20is%20already%20taken.";
        }
        if ($is_email_registered) {
            $error_params .= "&error_email=Email%20is%20already%20registered.";
        }
        header("Location: register.php?$error_params");
        exit();
    }
    
    // If not already taken, proceed with registration
    // Prepare INSERT statement
    $insertSql = "INSERT INTO student_info (first_name, last_name, email, usn_number, course, year, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $mysqli->prepare($insertSql);
    
    // Bind parameters and execute statement
    $stmtInsert->bind_param("sssssss",  $first_name, $last_name, $email, $usn_number, $course, $year, $password);
    $stmtInsert->execute();
    
    // Check if registration was successful
    if ($stmtInsert->affected_rows > 0) {
        // Redirect to success page
        header("Location: ../../../backend/view/index.php");
        exit(); // Stop further execution
    } else {
        echo "Registration failed. Please try again.";
    }
    
    // Close statements
    $stmtInsert->close();
}

// Close MySQL connection
$mysqli->close();


