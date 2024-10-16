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


if (isset($_POST['title']) && isset($_POST['author'])) {
    // Sanitize and escape the input values to prevent SQL injection
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);

    // Construct the query to search for books with matching title and author
    $query = "SELECT * FROM books WHERE title = '$title' AND author = '$author'";

    // Execute the query
    $result = $conn->query($query);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output the search results as an array
        $search_results = [];
        while ($row = $result->fetch_assoc()) {
            $search_results[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'author' => $row['author'],
                'book_count' => $row['book_count'],
                'publication_year' => $row['publication_year'],
                'stat' => $row['stat']
            );
        }
        echo json_encode($search_results);
    } else {
        // No matching books found, return an empty array
        echo json_encode([]);
    }

    // Free result set
    $result->free();
} else {
    // If title and/or author parameters are not set, return an error message
    echo json_encode(['error' => 'Error: Missing parameters.']);
}

// Close the connection
$conn->close();
