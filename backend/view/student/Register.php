<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/frontend/css/student.css"> <!-- Include your CSS file -->
<title>Register - Library Management System</title>
<style>
    .error-message {
            color: red;
        }

        .mb-3 {
    display: flex;
    align-items: center; /* Aligns items vertically */
        }

        label {
            width: 100px; /* Fixed width for labels */
            margin-right: 10px; /* Space between label and input */
        }

        .form-control {
            flex: 1; /* Input takes the remaining space */
        }

        .register-forms{
            display: flex;
            justify-content: center;
          background-color: rgb(151, 215, 240);
          width: 50%;
          border-radius: 5px;
          margin-top: 10px;
        }

</style>

</head>
<body>


<?php
// Retrieve the query parameter category from login.php
$user = isset($_GET['user']) ? $_GET['user'] : null;


// Define variables to store error messages
$error_usn = "";
$error_email = "";

// Check if there are error messages from signup.php
if (isset($_GET['error_usn'])) {
    $error_usn = $_GET['error_usn'];
}
if (isset($_GET['error_email'])) {
    $error_email = $_GET['error_email'];
}
?>

       <div class="top-navbar">
          <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
           <p>e-Library</p>
          </div>

  
   <div class="register-forms container">

    <form class="mt-4" action="/backend/view/student/signup.php" method="post">
    <h4>Register Account</h4>
    <?php
        // Display error messages if they exist
        if (!empty($error_usn)) {
            echo "<p class='error-message'>$error_usn</p>";
        }
        if (!empty($error_email)) {
            echo "<p class='error-message'>$error_email</p>";
        }
        ?>

  <div class="md-2 pb-1">
  <label for="firstname">Firstname:</label>
  <input type="text" id="first_name" name="first_name" class="form-control transparent-input" required>
  </div>

  
  <div class="md-3 pb-1">
  <label for="lastname">Lastname:</label>
  <input type="text" id="last_name" name="last_name" class="form-control transparent-input" required>
  </div>


  <div class="md-3 pb-1">
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" class="form-control transparent-input" required>
  </div>

  <div class="md-3 pb-1">
  <label  for="usn_number">USN:</label>
  <input type="text" id="usn_number" name="usn_number" class="form-control transparent-input" required>
  </div>

  <div class="md-3 pb-1">
  <label  for="usn_number">Password:</label>
  <input type="text" id="paswword" name="password" class="form-control transparent-input" required>
  </div>

  <div class="mb-3">
        <label for="course" class="form-label">Course</label>
        <select class="form-select" id="course" aria-label="Select an option">
            <option selected>Choose...</option>
            <option value="BSIT">BSIT</option>
            <option value="BSCS">BSCS</option>
            <option value="BSBA">BSBA</option>
            <option value="NURSING">NURSING</option>
            <option value="PROFESSOR">PROFESSOR</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="year_level" class="form-label">Year Level</label>
        <select class="form-select" id="year" aria-label="Select an option">
            <option selected>Choose...</option>
            <option value="High School">High School</option>
            <option value="1st year College">1st year College</option>
            <option value="2nd year College">2nd year College</option>
            <option value="3rd year College">3rd year College</option>
            </select>
        </div>

  <div class="col-12 mb-4">
    <button class="btn btn-primary" type="submit">Register</button>
  </div>
     

        <p>Already have an account? <a href="/frontend/components/student/student_login.html">Login here</a></p>
       <p>Go Back to <a href="index.php">Homepage</a></p>
</form>
</div>


</div>
</body>
</html>
