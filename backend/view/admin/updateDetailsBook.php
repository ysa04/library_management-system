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

var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $author = isset($_POST['author']) ? $_POST['author'] : '';
    $book_description = isset($_POST['book_description']) ? $_POST['book_description'] : '';
    $sub_description = isset($_POST['sub_description']) ? $_POST['sub_description'] : '';
    $ddc = isset($_POST['ddc']) ? $_POST['ddc'] : '';
    $sub_categ = isset($_POST['sub_category']) ? $_POST['sub_category'] : '';
    $status = isset($_POST['stat']) ? $_POST['stat'] : '';
    $shelf = isset($_POST['shelf']) ? $_POST['shelf'] : '';
    $book_count = isset($_POST['book_count']) ? $_POST['book_count'] : '';
    $summary = isset($_POST['summary']) ? $_POST['summary'] : '';
    $publication_year = isset($_POST['publication_year']) ? $_POST['publication_year'] : '';
 

    // SQL query to insert or update the book details
    $sql = "INSERT INTO books (id, title, author, book_description, sub_description, dewey_number, sub_category, stat, shelf, book_count, summary, publication_year)
            VALUES ('$id', '$title', '$author', '$book_description', '$sub_description', '$ddc', '$sub_categ', '$status', '$shelf', '$book_count', '$summary', '$publication_year')
            ON DUPLICATE KEY UPDATE 
            title='$title', author='$author', book_description='$book_description', sub_description='$sub_description', dewey_number='$ddc', sub_category='$sub_categ',
            stat='$status', shelf='$shelf', book_count='$book_count', summary='$summary', publication_year='$publication_year'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Record saved successfully');
        window.history.back(); // Navigate to the previous page
          </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}



