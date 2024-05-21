<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>student Home Page</title>

</head>
<body>
<?php include 'studentNavbar.php'; ?>

<?php
    

         // Check if user is logged in this session is from userslogin.php
     if (!isset($_SESSION['usn']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['course'])  || !isset($_SESSION['year'])   ){
    // header("Location: studentlogin.php");
    // exit();
    }

    $usn = $_SESSION['usn'];
    $name = $_SESSION['first_name'];
    $surName = $_SESSION['last_name'];
    $course = $_SESSION['course'];
    $year = $_SESSION['year'];

?>

   <div class="e-card container">
    <div class="card-content">
        <div class="card-details">
        <img src="/frontend/img/AMAES-logo_header.png" alt="ama" width="100px" height="50px"/>
        <h6>NAME: <?php echo $name . ' ' . $surName; ?></h6>
        <h6>COURSE: <?php echo $course ?></h6>
        <h6>YEAR: <?php echo $year ?></h6>
        <h6>USN: <?php echo $usn?></h6>
 
      <div class="card-signature">
     <span>_____________________________</span>
     <p>librarian signature</p>
      </div>
    </div>
    <div class="card-header">
    <img src="/frontend/img/chatbot.jpg" alt="e-card" width="150px"/>
    <div class="card-validation">
        <p>validation sticker here</p>
    </div>
    </div>
    </div>
    <div>
    <a href="generate-pdf.php" target="_blank">Download E-Card</a>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
