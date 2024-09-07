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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the values from the form
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $author = isset($_GET['author']) ? $_GET['author'] : '';

    // Prepare SQL statement
    $sql = "SELECT * FROM books WHERE title = ? AND author = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $author);
    
    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    // Check if there are any matching rows
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // echo "<span class='book-title'>" . $row["title"] . "</span>";
            // echo "<span class='book-author'>" . $row["author"] . "</span>";
    
        }
    } else {
        echo "No matching records found";
    }
    
    // Close statement
    $stmt->close();
}

// Close connection

// Close connection
$conn->close();
