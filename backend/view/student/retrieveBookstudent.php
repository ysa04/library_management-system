// Get and sanitize input
$title = isset($_POST['title']) ? sanitize_input($_POST['title']) : '';

// Prepare the SQL query
$sql = "SELECT * FROM books WHERE title LIKE ?";
$stmt = $con->prepare($sql);
if (!$stmt) {
    die("Failed to prepare SQL statement: " . $con->error);
}

// Bind parameters and execute the query
$searchTerm = "%$title%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Check if any results were found
if ($result->num_rows > 0) {
    echo "<div class='book-container'>";
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        // Start a new row if necessary
        if ($count % 6 == 0) {
            // Close the previous row if not the first row
            if ($count > 0) {
                echo "</div>"; // Close previous row
            }
            // Start a new row
            echo "<div class='row mb-4'>"; // Added margin-bottom for spacing
        }

        // Output each book
        echo "<div class='col-md-2 mb-3'>"; // Column for book cover
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
} else {
    echo "<p>No results found.</p>";
}

// Close the prepared statement
$stmt->close();