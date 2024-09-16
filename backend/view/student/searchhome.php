<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "users_category";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Get and sanitize input
$booksPerPage = 12; // Number of books per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $booksPerPage;

// Get and sanitize input
$title = isset($_POST['title']) ? sanitize_input($_POST['title']) : '';

// Prepare the SQL query to fetch total number of books
$sql = "SELECT COUNT(*) AS count FROM books WHERE title LIKE ?";
$stmt = $con->prepare($sql);
if (!$stmt) {
    die("Failed to prepare SQL statement: " . $con->error);
}
$searchTerm = "%$title%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
$totalBooks = $result->fetch_assoc()['count'];
$totalPages = ceil($totalBooks / $booksPerPage);

// Prepare the SQL query to fetch books for the current page
$sql = "SELECT * FROM books WHERE title LIKE ? LIMIT ?, ?";
$stmt = $con->prepare($sql);
if (!$stmt) {
    die("Failed to prepare SQL statement: " . $con->error);
}
$stmt->bind_param("sii", $searchTerm, $offset, $booksPerPage);
$stmt->execute();
$result = $stmt->get_result();

// Display books
if ($result->num_rows > 0) {
    echo "<div class='container mt-4'>";
    echo "<div class='row'>";
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        // Start a new row if necessary
        if ($count % 6 == 0 && $count > 0) {
            echo "</div><div class='row '>"; // Close previous row and start a new one
        }

        // Output each book
        echo "<div class='col'>"; // Column for book cover
        echo "<a href='bookNavigate.php?id=" . $row["id"] . "'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' alt='" . htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8') . "' class='book-cover img-fluid'>";
        echo "</a>";
        echo "</div>";

        $count++;
    }

    // Close the last row if it was not fully populated
    if ($count % 6 != 0) {
        echo "</div>"; // Close the last incomplete row
    }

    echo "</div>"; // Close the container div

    // Pagination controls
    echo "<nav aria-label='Page navigation'>";
    echo "<ul class='pagination justify-content-center mt-4'>";
    
    // Previous button
    echo "<li class='page-item " . ($page <= 1 ? 'disabled' : '') . "'>";
    echo "<a class='page-link' href='?page=" . max(1, $page - 1) . "'>Previous</a>";
    echo "</li>";
    
    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'>";
        echo "<a class='page-link' href='?page=" . $i . "'>" . $i . "</a>";
        echo "</li>";
    }
    
    // Next button
    echo "<li class='page-item " . ($page >= $totalPages ? 'disabled' : '') . "'>";
    echo "<a class='page-link' href='?page=" . min($totalPages, $page + 1) . "'>Next</a>";
    echo "</li>";
    
    echo "</ul>";
    echo "</nav>";

} else {
    echo "<p>No results found.</p>";
}

// Close the prepared statement and connection
$stmt->close();
$con->close();