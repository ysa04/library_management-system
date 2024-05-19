<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "ysa_2024_gatongay";
$database = "library";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Initialize variables for search/filter criteria
$title = isset($_POST['title']) ? sanitize_input($_POST['title']) : '';
$author = isset($_POST['author']) ? sanitize_input($_POST['author']) : '';
$genre = isset($_POST['genre']) ? sanitize_input($_POST['genre']) : '';
$year = isset($_POST['year']) ? sanitize_input($_POST['year']) : '';
$status = isset($_POST['status']) ? sanitize_input($_POST['status']) : '';
// add location $later

// Prepare the SQL query
$sql = "SELECT * FROM books WHERE 1";

// Add search criteria to the SQL query if filters are applied
if (!empty($title)) {
    $sql .= " AND title LIKE '%$title%'";
}
if (!empty($author)) {
    $sql .= " AND author LIKE '%$author%'";
}
if (!empty($genre)) {
    $sql .= " AND genre = '$genre'";
}
if (!empty($year)) {
    $sql .= " AND publication_year = '$year'";
}
if (!empty($status)) {
    $sql .= " AND stat = '$status'";
}

// Execute the query
$result = $con->query($sql);

// Check if any results were found
if ($result->num_rows > 0) {
    // Open the container div for book covers
    echo "<div class='book-container'>";

    // Output data of each row
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        // If # covers are already displayed in a row, close the row div and open a new one
        if ($count % 5 == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col'>";
        echo "<a href='bookNavigate.php?book_id=" . $row["book_id"] . "'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' alt='" . $row["title"] . "' class='book-cover'>";
        echo "<p class='book-category'></p>";
        echo "</a>";
        echo "</div>";

        // Increment the count
        $count++;

        // If # covers are displayed, close the row div
        if ($count % 5 == 0) {
            echo "</div>"; // Close row div
        }
    }

    // Close the container div for book covers
    echo "</div>";
} else {
    echo "<p>No results found.</p>";
}

// Close the database connection
$con->close();

