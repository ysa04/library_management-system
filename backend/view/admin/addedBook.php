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
    
    // $subDdc = $_POST['subDescription'];
    $status = $_POST['status'];
    $publicationYear = $_POST['publication_year'];
    $bookCount = $_POST['book_count'];
    $shelf = $_POST['shelf'];
    $bookSummary = $_POST['book_summary'];
    $imageData = $_POST['imageFile'];

    // Prepare the SQL statement to insert book details
    $sql = "INSERT INTO books (title, author, summary, book_count, publication_year, stat, image_data, shelf, dewey_number, book_description, sub_dewey_number, sub_description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters (add $ddcDescription to be saved in the database)
    $stmt->bind_param(
        'sssiissiisis', 
        $title, 
        $author, 
        $bookSummary, 
        $bookCount, 
        $publicationYear, 
        $status, 
        $imageData, 
        $shelf, 
        $ddcNumber,   // dewey_number
        $ddcDescription,  // dewey_description
        $subDdc,
        $subDescription  
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

