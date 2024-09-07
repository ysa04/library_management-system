<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMA MAKATI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
</head>
<body>

<?php
// Retrieve the query parameter category from index.php
$user = $_GET['user'];

?>
          <div class="main">
          <div class="top-content">
          <img class="top=logo" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
           <p>e-Library</p>
          </div>
          <img  class="ama-logo" src="/frontend/img/AMAES-logo_header.png" alt=""/>
          <img class="side-image" src="/frontend/img/book2.png" alt=""/>

            <div class="student-login">
            <p style="font-weight: 700;"><?php echo strtoupper($user) ?> LOGIN</p>
        <!-- FORM START-->
              
            <form action="/backend/view/userslogin.php?user=<?php echo $_GET['user']; ?>" method="post">
              <div class="login-input">
                <label for="usn">USN</label>
                <input class="input" name="usn" type="text" placeholder="USN"/>
              </div>
              
            <div class="password-input">
              <label for="password">Password</label>
              <input class="input" name="password" type="password" placeholder="Password"/>
            </div>
        
            <div class="submit-login">
              <input type="submit" value="Submit"/>
              <a href=""><p>Forgot / Reset Password</p></a>
            </div>
            </form>
        <!--FORM END  -->

 <!-- start of conditional statement if user is admin and teacher signup link will not appear -->
 <?php
 if ($user !== "admin" && $user !== "teacher") {
?>
<p style="margin-left: 50px;">Not Registered? <a href="/backend/view/student/Register.php<?php echo isset($_GET['user']) ? "?user=" . $_GET['user'] : ""; ?>">Sign up now</a></p>
<?php
}
?>      
 <!-- end of conditional statement if user is admin and teacher signup link will not appear -->
    </div>
      <!-- FOOTER START -->
     <div class="footer">
      <p>&copy; 2024 AMACC Makati e-Lib All rights reserved</p>
     </div>
     </div>
      <!-- FOOTER END -->
   

 <script src="/frontend/js/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
