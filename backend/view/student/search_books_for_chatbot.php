<?php
// search_books_for_chatbot.php

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$title = $input['title'] ?? '';

if (empty($title)) {
    echo json_encode(["error" => "No title provided"]);
    exit;
}

// Database connection (adjust credentials as needed)
$servername = "localhost";
$username = "root";
$password = "ysa_2024_gatongay";
$dbname = "users_category";

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$sql = $conn->prepare("SELECT id, image_name, image_data FROM books WHERE title LIKE ?");
$searchTerm = "%$title%";
$sql->bind_param("s", $searchTerm);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
    echo json_encode([
        'id' => $book['id'],
        'image_name' => $book['image_name'],
        'image_data' => base64_encode($book['image_data']) // Assuming image_data is binary
    ]);
} else {
    error_log("No book found for title: $title");
    echo json_encode(["error" => "No book found"]);
}

$conn->close();
?>
