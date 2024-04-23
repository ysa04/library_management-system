<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/frontend/css/student.css"> <!-- Include your CSS file -->
<title>Register - Library Management System</title>


</head>
<body style="background-color: rgb(197, 227, 239);">

       <div class="top-navbar">
          <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
           <p>e-Library</p>
          </div>

  <div class="register-form">

   <div>
  
    <form action="/backend/view/student/signup.php" method="post">
    <h2>Student Register</h2>
    <br/>
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
