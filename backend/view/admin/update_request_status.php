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

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "No data received"]);
    exit;
}

// Get requestId and action
$requestId = $data['requestId'] ?? null;
$action = $data['action'] ?? null;

if (!$requestId || !$action) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

// Prepare the update query based on the action
if ($action === 'approve') {
    // Update approved count and change status to 'ready'
    $sql = "UPDATE studentbook SET approved = approved + 1, status = 'ready' WHERE id = ?";
} elseif ($action === 'reject') {
    // Update status to rejected (you can change this as needed)
    $sql = "UPDATE studentbook SET approved = 0, status = 'rejected' WHERE id = ?";
} else {
    echo json_encode(["success" => false, "message" => "Invalid action"]);
    exit;
}

// Prepare and execute the statement
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $requestId);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Request status updated successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error updating request: " . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$con->close();

