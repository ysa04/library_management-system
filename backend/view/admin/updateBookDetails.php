<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "ysa_2024_gatongay"; // Replace with your database password
$dbname = "users_category"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data sent in the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract the ID and newData from the decoded JSON data
    $id = $data['id'];
    $newData = $data['newData'];

    // Construct an SQL UPDATE query
    $sql = "UPDATE books SET 
            title = ?,
            author = ?,
            summary = ?,
            genre = ?,
            book_count = ?,
            publication_year = ?,
            stat = ?,
            shelve = ?
            WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Failed to prepare statement"));
        exit();
    }

    // Bind parameters
    $stmt->bind_param("ssssiissi",
        $newData['bookTitle'],
        $newData['bookAuthor'],
        $newData['summary'],
        $newData['genre'],
        $newData['bookCount'],
        $newData['publicationYear'],
        $newData['stat'],
        $newData['shelve'],
        $id
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // If successful, send a success response
            $response = array("message" => "Data updated successfully");
            echo json_encode($response);
        } else {
            // If no rows were affected, send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(array("error" => "Failed to update data"));
        }
    } else {
        // If statement execution failed, send an error response
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Failed to execute statement"));
    }

    // Close statement
    $stmt->close();
} else {
    // If the request method is not POST, return an error response
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("error" => "Method not allowed"));
}

// Close database connection
$conn->close();

