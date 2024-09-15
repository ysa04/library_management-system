<?php
// Database connection

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';


// Database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$category = $_POST['category'];
$data = $_POST['data'];

// Escape special characters to prevent SQL injection
$category = mysqli_real_escape_string($conn, $category);
$data = mysqli_real_escape_string($conn, $data);

// Prepare the SQL query to insert a new row with the category and data
$query = "INSERT INTO sub_dewey_classification ($category) VALUES ('$data')";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Data added successfully!";
} else {
    echo "Error adding data: " . mysqli_error($conn);
}
