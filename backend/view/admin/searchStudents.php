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
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['course']) && isset($_POST['usn_number'])){
    // Sanitize and escape the input values to prevent SQL injection
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $course = $conn->real_escape_string($_POST['course']);
    $usnNumber = $conn->real_escape_string($_POST['usn_number']);

   // Construct the query to search for students with matching first name, last name, course, and usn number using LIKE
    $query = "SELECT * FROM student_info 
              WHERE first_name LIKE '%$firstName%' 
              AND last_name LIKE '%$lastName%' 
              AND course LIKE '%$course%' 
              AND usn_number LIKE '%$usnNumber%'";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output the search results as an array
        $student_results = array();
        while($row = $result->fetch_assoc()) {
            $student_results[] = array(
                'id' => $row['id'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'age' => $row['age'],
                'email' => $row['email'],
                'usn_number' => $row['usn_number'],
                'contact_number' => $row['contact_number']
            );
        }
        echo json_encode($student_results);
    } else {
        // No matching students found
        echo json_encode(array('message' => 'No matching students found.'));
    }

    // Free result set
    $result->free();
} else {
    // If parameters are not set, return an error message
    echo json_encode(array('error' => 'Error: Missing parameters.'));
}

// Close the connection
$conn->close();
