<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Database connection parameters
$host = "localhost";       // The hostname of the MySQL server
$username = "root";        // The MySQL username
$password = "ysa_2024_gatongay"; // The MySQL password
$database = "books";       // The name of the database to connect to

// Attempt to establish a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If there was an error connecting to the database, display the error message
    die("Connection failed: " . $conn->connect_error);
} else {
    // If the connection was successful, display a message indicating that the connection was established
    echo "Connected successfully";
}

// SQL query to retrieve all table names
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $tableNames = [];
    while ($row = $result->fetch_array()) {
        $tableNames[] = $row[0];
    }
    
    // Send the table names as JSON so that javascript can catch the data to render to other php file
    echo json_encode($tableNames);
} else {
    echo json_encode(['error' => $conn->error]);
}

// Close connection
$conn->close();







