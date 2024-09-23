<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz, wght, FILL, GRAD@48,400,0,0">
    <link rel="stylesheet" href="student_chatbox.css">
    <script src="student_chatbox.js" defer></script>
    <title>student Home Page</title>
    
</head>
<body>

<?php

session_start();

// Check if user is logged in (assuming this session is from userslogin.php)
if (!isset($_SESSION['usn']) || !isset($_SESSION['id']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['course']) || !isset($_SESSION['age']) || !isset($_SESSION['contact_number'])|| !isset($_SESSION['year']) || !isset($_SESSION['photo'])){
    // Redirect to login page or perform appropriate action
    // header("Location: studentlogin.php");
    // exit();
}

// Extract session variables
$usn = $_SESSION['usn'];
$id = $_SESSION['id'];
$name = $_SESSION['first_name'];
$surName = $_SESSION['last_name'];
$age = $_SESSION['age'];
$course = $_SESSION['course'];
$contactNumber = $_SESSION['contact_number'];
$email = $_SESSION['email'];
$year = $_SESSION['year'];
$photo = $_SESSION['photo'];

// Base64 encode the photo for embedding in the HTML
$encodedPhoto = base64_encode($photo);
$photoMimeType = 'image/jpeg'; // Adjust this if your image is not JPEG

?>


<div class="card mb-4">
          <div class="card-body">
          <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Student Id</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $id?></p>
              </div>
              <hr>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $name . ' ' . $surName; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $email?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Age</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $age?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Usn Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $usn?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $contactNumber?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Course</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $course?></p>
              </div>
            </div>
          </div>
        </div>


</body>
</html>