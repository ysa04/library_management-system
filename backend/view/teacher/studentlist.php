<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Student List</title>
    <style>
        /* Custom CSS for table */
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #00008B;
        }
        th {
            background-color: #93FFE8;
        }
        /* Alternating row color */
        tr:nth-child(even) {
            background-color: #43C6DB;
        }
        tr:nth-child(odd) {
            background-color: #3EA99F;
        }
        
    </style>
</head>
<body>
<!-- php start for session catch data-->
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['usn']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) {
    header("Location: teacherlogin.php");
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
        <a class="navbar-brand" href="teacher_home.php">
            <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
            <p>e-Library</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="teacher_home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">STUDENTS</a>
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

<div style="background-color: rgb(191, 222, 234); border-radius: 5px; position: relative;" class="container">
    <div class="main-content ">
        <h1>Student Information</h1>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search by USN or Name">
            <input type="submit" name="submit" value="Search">
        </form>

        <div class="table-responsive">
            <?php include 'retrieve_students.php'; ?>
        </div>
        
        <div class="chatbot-div">
            <img src="/frontend/img/chatbot.jpg" alt="chatbot" width="65" height="65"/>
            <a href="/"><p>Chat with Amaia</p></a>  
        </div>
    </div>
</div>

</body>


<?php
include '../../../frontend/components/student/footer.html';
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>
