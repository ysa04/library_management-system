<?php

// Database connection parameters
$host = "localhost";       // The hostname of the MySQL server
$username = "root";        // The MySQL username
$password = ""; // The MySQL password
$database = "users_category";    // The name of the database to connect to

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    // If there was an error connecting to the database, display the error message
    echo $con->connect_error;
} else {
    // If the connection was successful, display a message indicating that the connection was established
    echo "Connected";
}



// Retrieve username and password from form submission studentlogin.html
$usn = $_POST['usn'];
$password = $_POST['password'];

// Query the database to check if the username and password are correct
$sql = "SELECT * FROM student_information WHERE usn_number='$usn' AND password='$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    // Username and password are correct, redirect to home page
    header("Location:  admin_home.php"); // use this file arrangement to target the path if the file is in another folder
    exit();
} else {
    // Username or password is incorrect, display error message
    echo "Incorrect username or password";
}

$con->close();