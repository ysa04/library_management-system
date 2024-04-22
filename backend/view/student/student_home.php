
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

  <div class="top-navbar">
    <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
    <p>e-Library</p>
    <!-- <img class="top-img" src="/frontend/img/AMAES-logo_header.png" alt="" height="40" width="90"/> -->

    <div class="nav-content">
      <ul class="nav-links">
        <a href="/"><li>HOME</li></a> 
        <a href="/"><li>CONTACT</li></a> 
        <a href="/"><li>PROFILE</li></a>  
      </ul>

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
    ?>
<!-- php end for session -->

       <div class="login-icon">
        <i class="fa-solid fa-user"></i>
        </div>

      <div style="display: flex;">
      <p>&nbsp;<?php echo $name; ?>,</p>
      <p>&nbsp; <?php echo $surName; ?></p> <br/>
      <p>&nbsp;&nbsp;USN: <?php echo $usn; ?></p>
      <input class="logout-button" type="button" value="logout"/>
      </div>
    
     </div>
     </div>


   <div style="background-color: rgb(191, 222, 234); border-radius: 5px; position: relative;" class="container">

    <div class="main-content ">
    <h4>"If you study to remember, you will forget; But if you study to understand you will remember" </h4>
    <h1>BOOK CATEGORIES</h1>

          
    <form class="nav-search" id="mySearchForm" action="/" method="GET">
      <input class="search-input" id="searchInput" type="text" name="query" placeholder="Search..." >
      <input class="search-button" type="submit" value="Search">
    </form>
   </div>

   <div class="book-image container">
    <div class="gallery">
      <a href="bookNavigate.php?category=adventure">
        <img src="/frontend/img/books/a1.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>
    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=biography">
        <img src="/frontend/img/Business/b2.jpg" alt="Mountains" >
        <p class="book-category" ></p>
      </a>
  
    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=comics">
        <img src="/frontend/img/IT/IT1.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>

    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=contemporary">
        <img src="/frontend/img/NURSING/n2.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>

    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=fantasy">
        <img src="/frontend/img/IT/IT2.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>
 
    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=fiction">
        <img src="/frontend/img/NURSING/n3.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>
 
    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=mystery">
        <img src="/frontend/img/books/a2.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>
  
    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=romance">
        <img src="/frontend/img/Business/b4.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>

    </div>

    <div class="gallery">
      <a href="bookNavigate.php?category=science">
        <img src="/frontend/img/books/a3.webp" alt="Mountains" >
        <p class="book-category"></p>
      </a>

    </div>

    
    <div class="gallery">
      <a href="bookNavigate.php?category=technology">
        <img src="/frontend/img/Business/b5.jpg" alt="Mountains" >
        <p class="book-category"></p>
      </a>
  
    </div>
   </div>

     <div class="chatbot-div">
      <img src="/frontend/img/chatbot.jpg" alt="chatbot" width="65" height="65"/>
      <a href="/"><p>Chat with Amaia</p></a>  
     </div>

  </div>

<?php

include '../../../frontend/components/student/footer.html';

?>




 
<script src="/frontend/js/bookNavigate.js"></script>
<script src="/frontend/js/retrieve_data.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>