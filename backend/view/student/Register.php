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
</style>

</head>
<body style="background-color: rgb(197, 227, 239);">


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

  <div class="register-form">

   <div>
  
    <form action="/backend/view/student/signup.php" method="post">
    <h2>Student Register</h2>
    <br/>
       <?php
        // Display error messages if they exist
        if (!empty($error_usn)) {
            echo "<p class='error-message'>$error_usn</p>";
        }
        if (!empty($error_email)) {
            echo "<p class='error-message'>$error_email</p>";
        }
        ?>
        <div class="input-group">
            <label  for="usn_number">USN:</label>
            <input type="text" id="usn_number" name="usn_number" required>
        </div>

        <div class="input-group">
            <label for="firstname">Firstname:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>

        <div class="input-group">
            <label for="lastname">Lastname:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>

        <div class="input-group">
            <label for="age">Age:</label>
            <input type="text" id="email" name="age" required>
        </div>


    <div class="input-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="email">Year:</label>
            <input type="text" id="year" name="year" required>
        </div>

        <div class="input-group">
            <label for="email">Course:</label>
            <input type="text" id="course" name="course" required>
        </div>

        <div class="input-group">
            <label for="email">Program:</label>
            <input type="text" id="program" name="program" required>
        </div>

        <div class="input-group">
            <label for="contact">Mobile:</label>
            <input type="text" id="contact_number" name="contact_number" required>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
          
        <div class="input-group">
            <label  for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="input-group">
            <button type="submit" class="btn">Register</button>
        </div>

      <div>
      <p>Already have an account? <a href="/frontend/components/student/student_login.html">Login here</a></p>
     <p>Go Back to <a href="index.php">Homepage</a></p>
      </div>
    
    </form>
 
    </div>


</div>
</body>
</html>
