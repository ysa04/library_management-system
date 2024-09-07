<?php

// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password =  '';      // Your MySQL password
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
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    age int(30) NOT NULL,
    usn_number varchar(30) NOT NULL,
    contact_number varchar(30) NOT NULL,
    number_visit int(50) NOT NULL,
    added_at varchar(50) NOT NULL DEFAULT current_timestamp(),
    password varchar(50) NOT NULL,
    course varchar(30) NOT NULL,
    program varchar(255) NOT NULL,
    photo longblob NOT NULL,
    year varchar(30) NOT NULL

    
    
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
    $year = $_POST['year'];
    $course = $_POST['course'];
    $program = $_POST['program'];
    $contact_number = $_POST['contact_number'];

    $password = $_POST['password']; 
    
    
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
    $insertSql = "INSERT INTO student_info (usn_number, first_name, last_name, age, email, year, course, program, contact_number, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $mysqli->prepare($insertSql);
    
    // Bind parameters and execute statement
    $stmtInsert->bind_param("ssssssssss", $usn_number, $first_name, $last_name, $age, $email, $year, $course, $program, $contact_number, $password);
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

?>

