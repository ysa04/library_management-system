<?php

// Database connection parameters
$host = "localhost";       // The hostname of the MySQL server
$username = "root";        // The MySQL username
$password = "ysa_2024_gatongay"; // The MySQL password
$database = "student_record";    // The name of the database to connect to

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



// SQL query to select data from the database
$sql = "SELECT * FROM student_information";

// Execute the query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the results as an associative array
    while ($row = $result->fetch_assoc()) {
        // Output each row of data
        echo "student name: " . $row['first_name'] . ", Age: " . $row['last_name'] .  ", email: " . $row['email'] . ", password:" . $row['password']. "\n";
    }
} else {
    // If there was an error executing the query, display the error message
    echo "Error executing query: " . $con->error;
}

// Close the database connection
$con->close();