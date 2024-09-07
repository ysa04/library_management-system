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

<?php include 'navbar.php'; ?> 

<div class="admin">
    <h5>Admin Dashboard</h5>
</div>
<hr class="container"/>
<div class="box-div container">

<div class="box">
<div class="box-content">
    <a class="link" href="retrieveBooks.php">Books</a>
<i class="fa-solid fa-book"></i>
</div>
   
</div>

<div class="box">
    <div class="box-content">
    <a class="link" href="borrowedRecord.php">Borrow Today</a>
    <i class="fa-solid fa-book-open"></i>
    </div>
</div>

<div class="box">
    <div class="box-content">
    <a class="link" href="studentBorrow.php">Student with Borrowed books </a>
    <i class="fa-solid fa-person"></i>
    </div>
   
</div>

<div class="box">
    <div class="box-content">
    <a class="link" href="registeredStudent.php">Registered Students</a>
  
    <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    
</div>

<div class="box">
    <div class="box-content">
    <a class="link" href="#">Visit Reservations</a>
    <i class="fa-solid fa-person"></i>
    </div>
    
</div>


<div class="box">
    <div class="box-content">
    <a class="link" href="add-book.php">Add Book</a>
    <i class="fa-solid fa-person"></i>
    </div>
</div>




</div>




 <script src="/frontend/js/bookNavigate.js"></script>
<script src="/frontend/js/retrieve_data.js"></script>
<script src="/frontend/js/filtersearch.js"></script>
<script src="/frontend/js/borrowBook.js"></script>
<script src="/frontend/js/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>