<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="/frontend/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin home page</title>
</head>
<body>

<!-- php start for session catch data-->
<?php
       session_start();

         // Check if user is logged in
     if (!isset($_SESSION['usn']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) {
    header("Location: studentlogin.php");
    exit();
    }

    $usn = $_SESSION['usn'];
    $name = $_SESSION['first_name'];
    $surName = $_SESSION['last_name'];


// Include the logout function file
require_once '../student/logout.php';

// Check if logout button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Call the logout function
    logout();
}
?>

<!-- php end for session -->


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
    <p>e-Library</p>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
      
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">DASHBOARD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">BOOKS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            OTHERS
          </a>
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="#">COMPUTING</a></li>
            <li><a class="dropdown-item" href="#">ENGINEERING</a></li>
            <li><a class="dropdown-item" href="#">BUSINESS AND MANAGEMENT</a></li>
            <li><a class="dropdown-item" href="#">HOSPITALITY AND TOURISM MANAGEMENT</a></li>
            <li><a class="dropdown-item" href="#">SENIOR HIGH</a></li> -->

          </ul>
        </li>
      </ul>
      <div style="display: flex; color: white; margin-top: 15px;">
      <i style="margin-top: 4px;" class="fa-solid fa-user"></i>
      <p>&nbsp;<?php echo $name; ?>,</p>
      <p>&nbsp;<?php echo $surName; ?></p> <br/>
      <p>&nbsp;&nbsp;USN: <?php echo $usn; ?></p>
      <form method="post" action="/backend/view/index.php">
      <input type="hidden" name="logout" value="true">
      <button class="logout-button" type="submit">logout</button>
      </form>
      </div>
    </div>
  </div>
</nav>

<div class="admin-main">
<!-- side page start -->
<nav class="col-1">
            <ul class="side-link">
                <h5>STUDENT PROGRAMS</h5>
                <?php
                // Generate the links dynamically using PHP
                $programs = array(
                    "COMPUTING",
                    "BUSINESS AND MANAGEMENT",
                    "HOSPITALITY AND TOURISM MANAGEMENT",
                    "EDUCATION",
                    "ACCOUNTANCY",
                    "ENGINEERING",
                    "CRIMINOLOGY",
                    "ARTS AND SCIENCES",
                    "MEDICAL/NURSING/HEALTH",
                    "MARITIME",
                    "AVIATION",
                    "GRADUATE PROGRAMS",
                    "BASIC EDUCATION",
                    "SENIOR HIGH"
                );

                foreach ($programs as $program) {
                    echo '<li><a href="#" class="program-link">' . $program . '</a></li>';
                }
                ?>
            </ul>
        </nav>
  <!-- side page end -->

  <!-- upper header start -->
  <div class="col-2">
  	<header>
    <form>
    <label>student name</label>
    <input type="text" />
    <label>course</label>
    <input type="text">
    <input type="button" value="submit"/>
  </form>
    </header>
     <!-- upper header end -->

    <main class="content">
    <div class="details">
    <h4>Student Details</h4>
    <?php include 'studentdetails.php'; ?>
    </div>

    <article>
      <!-- table start -->
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Program</th>
      <th scope="col">Course</th>
      <th scope="col">Option</th>
    </tr>
  </thead>

  </table>
 
    </div>  
    <!-- table end -->
    </article>
    </main>

    <!-- footer start -->
  	<footer>Footer</footer>
  </div>
</div>

<!-- 
 <script src="/frontend/js/bookNavigate.js"></script> -->
<script src="/frontend/js/retrieve_data.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>