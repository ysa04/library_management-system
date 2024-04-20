<?php
session_start();

// MySQL Configuration
$host = 'localhost';
$username = 'root';  // Your MySQL username
$password = '';      // Your MySQL password
$database = 'library'; // Your database name

// Connect to MySQL
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and trim whitespace
    $usnOrEmail = trim($_POST['usn_or_email']);
    $password = $_POST['pwd'];

    

    // Convert to lowercase for case-insensitive comparison
    $usnOrEmail = strtolower($usnOrEmail);

    // Prepare and execute SQL statement to retrieve user data
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE lower(usn) = ? OR lower(email) = ?");
    $stmt->bind_param("ss", $usnOrEmail, $usnOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Error handling
    if (!$stmt) {
        die('Error executing query: ' . $mysqli->error);
    }

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['pwd'])) {
            // Password is correct, set session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['usn'] = $user['usn'];
            
            // Redirect to dashboard or any other page
            header("Location: dashboard.php");
            exit();
        } else {
            // Incorrect password
            $error = "Invalid password";
        }
    } else {
        // User does not exist
        $error = "Invalid username or email";
    }
    $stmt->close();
}

// Close MySQL connection
$mysqli->close();

// If login was not successful, display error message
if (isset($error)) {
    echo $error;
}

