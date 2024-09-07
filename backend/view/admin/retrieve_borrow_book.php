<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "users_category"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentId = $_GET['studentId'];

 $sql = "SELECT * FROM studentbook WHERE student_id = $studentId";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Create an array to hold student data
    $studentData = array();
    // Output data of each row
    while($row = $result->fetch_assoc()) {

        // Add each row (student data) to the $studentData array
        $studentData[] = $row;
    }
    
    // Output the student data as JSON
    echo json_encode($studentData);

} else {
    echo json_encode(array()); // No matching records found
}

// Close database connection
$conn->close();

