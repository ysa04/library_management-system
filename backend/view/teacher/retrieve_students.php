<?php
// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password =  'ysa_2024_gatongay';      // Your MySQL password
$database = 'library'; // Your database name

// Connect to MySQL
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if the search form is submitted
if (isset($_POST['submit'])) {
    // Get the search term
    $search = $_POST['search'];
    
    // Modify the query to search by USN, first name, last name, or full name
    $query = "SELECT * FROM student_info WHERE usn_number LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%'";
} else {
    // Default query to select all student information
    $query = "SELECT * FROM student_info";
}

// Execute the query
$result = $mysqli->query($query);

// Check if there are any students in the database
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='5'>";
    echo "<tr>
        <th>USN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Contact Number</th>
        <th>Number of Visits</th>
        <th>Number of Books Borrowed</th>
        <th>Number of Books Returned</th>
        <th>Penalty</th>
        <th>Paid Penalty</th>
        <th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["usn_number"] . "</td>";
        echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["contact_number"] . "</td>";
        echo "<td>" . $row["number_visit"] . "</td>";
        echo "<td>" . $row["no_books_barrowed"] . "</td>";
        echo "<td>" . $row["no_books_returned"] . "</td>";
        echo "<td>" . $row["penalty"] . "</td>";
        echo "<td>" . $row["paid_penalty"] . "</td>";
        echo "<td>" . $row["added_at"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No students found in the database.";
}

// Close MySQL connection
$mysqli->close();
?>
