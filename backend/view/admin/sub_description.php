<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$deweyNumber = $_POST['dewey_number'] ?? '';
$description = $_POST['description'] ?? '';

// Prepare the SQL query to fetch the column values from sub_dewey_classification
$sql = "SELECT `$description` AS book_description FROM sub_dewey_classification";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Generate dropdown options
if ($result->num_rows > 0) {
    $index = 1;  // Initialize an index counter

    while ($row = $result->fetch_assoc()) {
        $value = $row['book_description'] ?? '';  // Safeguard for empty values

        if ($value) {
            // Output the value and append the index in the dropdown
            $optionValue = htmlspecialchars($index) . '|' . htmlspecialchars($value);
            echo '<option value="' . $optionValue . '">' . htmlspecialchars($value) . ' - ' . htmlspecialchars($index) . '</option>';
            $index++;
        }
    }
} else {
    echo '<option disabled>No sub-descriptions available</option>';
}



// Close the connection
$stmt->close();
$conn->close();
