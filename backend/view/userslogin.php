<?php
 // Retrieve the query parameter user from index.php
if(isset($_GET['user'])) {
    $user = $_GET['user'];

    // Rest of the code
} else {
    echo "User parameter is missing";
    exit();
}


// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "users_category";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    echo $con->connect_error;
} else {
    echo "Connected";
}

// If the connection was successful, start the session
session_start();

// Retrieve username and password from form submission from login.php
$usn = $_POST['usn'];
$password = $_POST['password'];


// Determine the table based on the user type
switch ($user) {
    case 'student':
        $table = "student_info";
        break;
    case 'admin':
        $table = "admin_info";
        break;
    case 'teacher':
        $table = "teacher_info";
        break;
    default:
        echo "Invalid user type";
        exit();
}

// Query the database to check if the username and password are correct
$sql = "SELECT * FROM $table WHERE usn_number='$usn' AND password='$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    // Fetch the user's details
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $name = $row['first_name']; 
    $surName = $row['last_name'];
    $age = $row['age'];
    $course = $row['course'];
    $email = $row['email'];
    $year = $row['year'];
    $contactNumber = $row['contact_number'];
    $photo = $row['photo'];


    // Store the retrieved data in session variables
    $_SESSION['usn'] = $usn;
    $_SESSION['id'] = $id;
    $_SESSION['first_name'] = $name;
    $_SESSION['last_name'] = $surName;
    $_SESSION['age'] = $age;
    $_SESSION['course'] = $course;
    $_SESSION['year'] = $year;
    $_SESSION['email'] = $email;
    $_SESSION['contact_number'] = $contactNumber;
    $_SESSION['photo'] = $photo;
    $_SESSION['user'] = $user; // Store the user type in session
    
    // Redirect to the appropriate dashboard based on user type
    switch ($user) {
        case 'student':
            header("Location: student/student_home.php");
            break;
        case 'admin':
            header("Location: admin/adminHome.php");
            break;
        case 'teacher':
            header("Location: teacher/teacher_home.php");
            break;
    }
    exit();
} else {
    // Username or password is incorrect, display error message
    echo "Incorrect username or password";
}

$con->close();

