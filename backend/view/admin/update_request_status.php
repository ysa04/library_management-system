<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "users_category";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Database connection code here

$data = json_decode(file_get_contents("php://input"), true);
$requestId = $data['requestId'] ?? null;
$action = $data['action'] ?? null;

if (!$requestId || !$action) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

if ($action === 'approve') {
    // Update approved count and change status to 'ready'
    $updateSql = "UPDATE studentbook SET approved = approved + 1, status = 'ready' WHERE id = ?";
    $stmt = $con->prepare($updateSql);
    $stmt->bind_param("i", $requestId);

    if ($stmt->execute()) {
        // Insert the approved book into approvedBooks
        $insertSql = "INSERT INTO approvedbooks (book_id, user_id, title, author, approved_date) 
                      SELECT book_id, student_id, title, author, NOW() FROM studentbook WHERE id = ?";
        
        $insertStmt = $con->prepare($insertSql);
        $insertStmt->bind_param("i", $requestId);

          // Log the insertion attempt
        error_log("Inserting into approvedbooks for request ID: $requestId");

        if ($insertStmt->execute()) {
            echo json_encode(["success" => true, "message" => "Request approved and stored in approvedbooks."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error storing approved book: " . $insertStmt->error]);
        }
        
        $insertStmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Error updating request: " . $stmt->error]);
    }
} elseif ($action === 'reject') {
    // Update status to rejected
    $updateSql = "UPDATE studentbook SET approved = 0, status = 'rejected' WHERE id = ?";
    $stmt = $con->prepare($updateSql);
    $stmt->bind_param("i", $requestId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Request status updated to rejected."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating request: " . $stmt->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid action"]);
    exit;
}

// Close the statement and connection
$stmt->close();
$con->close();


