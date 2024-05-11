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
  <div class="details">
    <h4>Student Details</h4>
    <!-- this php file can only see in an onclick event -->
    <?php include 'studentdetails.php'; ?> 
    </div>

    <div id="book-borrow">
    <!-- this php file can only see in an onclick event -->
    <?php include 'bookBorrowed.php'; ?>
    </div>

  	<header >
    <!-- data process in searchResult.php / the submit event is in filtersearch.js -->
    <form  class="header-form" id="searchForm" method="post"> 
    <label for="first_name">Firstname</label>
    <input type="text" id="first_name" name="first_name"/>
    <label for="last_name">Lastname</label>
    <input type="text" id="last_name" name="last_name">
    <label for="usn_number">USN</label>
    <input type="text" id="usn_number" name="usn_number">
    <label for="course">Course</label>
    <input type="text" id="course" name="course">
    <button type="submit">Search</button>
   </form>
    </header>
     <!-- upper header end -->

    <main class="content">
    <article>
    <div>
   
   <!-- table start -->
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
<tbody id="studentTableBody">
<!-- retrieve_data.js -->
</tbody>
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
<script src="/frontend/js/filtersearch.js"></script>
<script src="/frontend/js/borrowBook.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>