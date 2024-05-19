<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "ysa_2024_gatongay";
$dbname = "users_category";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the number of results per page
$results_per_page = 5;

if (isset($_GET['program'])) {
    $program = $_GET['program'];
    
    // Determine which page number the visitor is currently on
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    // Calculate the starting row for the SQL query
    $offset = ($page - 1) * $results_per_page;

    // Prepare a SQL statement to prevent SQL injection
    $query = "SELECT * FROM student_info WHERE program = ? LIMIT ?, ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $program, $offset, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Get total number of students for the program to calculate total pages
        $query_total = "SELECT COUNT(*) as total FROM student_info WHERE program = ?";
        $stmt_total = $conn->prepare($query_total);
        $stmt_total->bind_param("s", $program);
        $stmt_total->execute();
        $result_total = $stmt_total->get_result();
        $total_row = $result_total->fetch_assoc();
        $total_students = $total_row['total'];
        $total_pages = ceil($total_students / $results_per_page);

        // Add pagination info to the response
        $response = [
            'data' => $data,
            'total_pages' => $total_pages,
            'current_page' => $page
        ];

        echo json_encode($response);
    } else {
        echo json_encode(['data' => [], 'total_pages' => 0, 'current_page' => $page]);
    }
} else {
    echo json_encode(['error' => 'No program specified.']);
}

// Close connection
$conn->close();

