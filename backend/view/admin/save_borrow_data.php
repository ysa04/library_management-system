<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "users_category"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
$book_id = $_POST['book_id'];
$student_id = $_POST['student_id'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
$book_title = $_POST['book_title'];
$book_author = $_POST['book_author'];
$published_date = $_POST['published_date'];
$date_borrowed = $_POST['date_borrowed'];
$date_returned = $_POST['date_returned'];
$number_of_books = $_POST['number_of_books'];
$penalty = $_POST['penalty'];
$paid_penalty = $_POST['paid_penalty'];

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO studentbook (book_id, student_id, book_title, book_author,published_date,date_borrowed, date_returned, number_of_books, penalty,paid_penalty) 
        VALUES ('$book_id', '$student_id','$book_title', '$book_author','$published_date','$date_borrowed', '$date_returned', '$number_of_books', '$penalty', '$paid_penalty')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New Data Successfully Recorded');</script>";
    echo "<script>window.location.href = 'borrowedRecord.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

