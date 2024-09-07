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


// this data is coming from adminSearchStudent.js using ajax and modal function.
$query_id = $_GET['id'];


$query_id = mysqli_real_escape_string($conn, $query_id);

// Query to retrieve student data based on query ID
$sql = "SELECT * FROM student_info WHERE id = '$query_id'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // Fetch student data
    $student_data = mysqli_fetch_assoc($result);
    // Pass student data to another PHP file for rendering
 
    include 'studentdetails.php';
} else {
    echo "No student data found for the provided query ID.";
}

// Close database connection
mysqli_close($conn);

