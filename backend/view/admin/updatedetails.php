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
    $sql = "UPDATE student_info SET 
            first_name = ?,
            last_name = ?,
            email = ?,
            age = ?,
            usn_number = ?,
            contact_number = ?,
            number_visit = ?,
            number_barrowed = ?,
            book_returned = ?,
            penalty = ?,
            paid_penalty = ?,
            added_at = ?,
            program = ?,
            course = ?
            WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssissiiiiisssi",
        $newData['firstName'],
        $newData['lastName'],
        $newData['email'],
        $newData['age'],
        $newData['usn'],
        $newData['contact'],
        $newData['numberVisit'],
        $newData['numberBookBarrowed'],
        $newData['numberBookReturned'],
        $newData['penalty'],
        $newData['paidPenalty'],
        $newData['addedAt'],
        $newData['program'],
        $newData['course'],
        $id
    );

    // Execute the statement
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // If successful, send a success response
        $response = array("message" => "Data updated successfully");
        echo json_encode($response);
    } else {
        // If no rows were affected, send an error response
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Failed to update data"));
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

