<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "ysa_2024_gatongay"; // Replace with your database password
$dbname = "users_category"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a program parameter is set in the request
if (isset($_GET['program'])) {
    // Fetch student information for the specified program when a tag link clicked
    $program = $_GET['program'];
    
    // Prepare a SQL statement to prevent SQL injection
    $query = "SELECT * FROM student_info WHERE program = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $program); // "s" indicates a string parameter and bind it
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        $data = array(); // Initialize an empty array to store data
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; // Append each row to the data array
        }
        // Encode the data array as JSON and echo the JSON string
        echo json_encode($data);
    } else {
        echo "No students found for program";
    }
} else {
    echo "No program specified.";
}

// Close connection
$conn->close();

