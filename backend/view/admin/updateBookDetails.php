<!-- this is being replaced by updateDetailsBook.php -->


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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $book_description = $_POST['book_description'];
    $sub_description = $_POST['sub_description'];
    $ddc = $_POST['ddc'];
    $sub_ddc = $_POST['sub_ddc'];
    $status = $_POST['stat'];
    $shelf = $_POST['shelf'];
    $book_count = $_POST['book_count'];
    $summary = $_POST['summary'];
    $publication_year = $_POST['publication_year'];
 

    // Database connection
    $conn = new mysqli("localhost", "username", "password", "database_name");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert or update the book details
    $sql = "INSERT INTO books (id, title, author, book_description, sub_description, dewey_number, sub_dewey_number, stat, shelf, book_count, summary, publication_year)
            VALUES ('$id', '$title', '$author', '$book_description', '$sub_description', '$ddc', '$sub_ddc', '$status', '$shelf', '$book_count', '$summary', '$publication_year', '$code_number')
            ON DUPLICATE KEY UPDATE 
            title='$title', author='$author', book_description='$book_description', sub_description='$sub_description', dewey_number='$ddc', sub_dewey_number='$sub_ddc',
            stat='$status', shelf='$shelf', book_count='$book_count', summary='$summary', publication_year='$publication_year'";

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}



