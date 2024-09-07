<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Database connection parameters
$host = "localhost";       // The hostname of the MySQL server
$username = "root";        // The MySQL username
$password = ""; // The MySQL password
$database = "users_category";       // The name of the database to connect to

// Attempt to establish a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);


// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'title' is set in the POST request
if (isset($_POST['title'])) {
    // Escape the input to prevent SQL injection
    $title = $conn->real_escape_string($_POST['title']);
    
    // Query to search for book titles matching the input
    $query = "SELECT title FROM books WHERE title LIKE '%$title%' LIMIT 5";
    $result = $conn->query($query);

    // Check if any results were returned
    if ($result->num_rows > 0) {
        // Fetch and display each matching book title
        while ($row = $result->fetch_assoc()) {
            echo "<div class='suggestion-item' onclick='selectSuggestion(\"" . $row['title'] . "\")'>" . htmlspecialchars($row['title']) . "</div>";
        }
    } else {
        // If no results were found, display a "No suggestions" message
        echo "<div class='suggestion-item'>No suggestions</div>";
    }
}

// Close the connection
$conn->close();









