<?php

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

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["message" => "No data received"]);
    exit;
}

$bookId = $data['bookId'] ?? null;
$borrowType = $data['borrowType'] ?? null;
$studentId = $data['studentId'] ?? null;
$bookTitle = $data['bookTitle'] ?? null;

if (!$bookId || !$studentId || !$borrowType || !$bookTitle) {
    echo json_encode(["message" => "Missing data"]);
    exit;
}

// Prepare the insert query
$query = "INSERT INTO studentbook (book_id, book_title, student_id, borrow_type, status, date_borrowed, date_returned, approved) 
          VALUES (?, ?, ?, ?, 'pending', NOW(), DATE_ADD(NOW(), INTERVAL 4 HOUR), 0)";
$stmt = $con->prepare($query);

if (!$stmt) {
    echo json_encode(["message" => "Database prepare error: " . $con->error]);
    exit;
}

// Correct the order of parameters and types in bind_param()
// "i" for book_id, "s" for book_title, "i" for student_id, and "s" for borrow_type
$stmt->bind_param("isis", $bookId, $bookTitle, $studentId, $borrowType);

if ($stmt->execute()) {
    echo json_encode(["message" => "Borrow request submitted for approval."]);
} else {
    echo json_encode(["message" => "Error submitting request: " . $stmt->error]);
}

$stmt->close();
$con->close();

