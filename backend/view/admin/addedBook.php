<?php
// Database connection

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $title = $_POST['title'];
    $author = $_POST['author'];

    // Split the DDC value into dewey_number and description
    list($ddcNumber, $ddcDescription) = explode('|', $_POST['ddc']); 
    list($subDdc, $subDescription) = explode('|', $_POST['subDescription']); 

    $status = $_POST['status'];
    $publicationYear = (int)$_POST['publication_year']; // Cast to int
    $bookCount = (int)$_POST['book_count']; // Cast to int
    $shelf = $_POST['shelf'];
    $bookSummary = $_POST['book_summary'];
    $imageData = $_POST['imageFile'];

    // Prepare the SQL statement to insert book details
    $sql = "INSERT INTO books (title, author, summary, book_count, publication_year, stat, image_data, shelf, dewey_number, sub_category, book_description, sub_description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param(
        'sssiiissssss', // Adjusted to match the number of variables
        $title, 
        $author, 
        $bookSummary, 
        $bookCount, 
        $publicationYear, 
        $status, 
        $imageData, 
        $shelf, 
        $ddcNumber, 
        $subDdc, 
        $ddcDescription,
        $subDescription// Assuming you want to store this as well
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>
        alert("Book Successfully Added");
        window.location.href = document.referrer;
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();


