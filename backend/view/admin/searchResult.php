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

//THIS IS FROM SEARCH FORM ADMIN_HOME.PHP

 // Check if form is submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $usn_number = $_POST["usn_number"];
    $course = $_POST["course"];

    // Prepare SQL query
    $sql = "SELECT * FROM student_info WHERE first_name = '$firstname' AND last_name = '$lastname' AND usn_number = '$usn_number'  AND course = '$course'";
    $result = $conn->query($sql);

     
    

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    $data = array();
    // Loop through the results and store each student's details in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Output the data as JSON
    echo json_encode($data);
} else {
    // If no results are found, return an empty array
    echo json_encode(array());
}

}
// Close database connection
$conn->close();

