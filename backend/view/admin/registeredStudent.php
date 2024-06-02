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

<div class="registeredStudent-div container">
<div class="bookModaldetails">
  <!-- this area is for student details when details button click -->
  </div>

  <div id="book-borrow">
  <?php include 'bookBorrowed.php'; ?>
  </div>

    <div class="registerStudent-form">
      <!-- function is in adminSearchStudent.js -->
    <form id="studentSearch">
    <label>Firstname</label>
    <input type="text" name="first_name" id="first_name" style="width: 200px;"/>
    <label>Lastname</label>
    <input type="text" name="last_name" id="last_name" style="width: 200px;"/>
    <label>Course</label>
    <input type="text" name="course" id="course" style="width: 200px;"/>
    <label>Usn NO.</label>
    <input type="text" name="usn_number" id="usn_number" style="width: 200px;"/>
    <button>search</button>
    </form>
    </div>
    <hr/>

    <div class="registeredStudent-table">
    <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>FIRSTNAME</th>
      <th>LASTNAME</th>
      <th>AGE</th>
      <th>EMAIL</th>
      <th>USN NUMBER</th>
      <th>CONTACT NUMBER</th>
      <th>OPTION</th>
    </tr>
  </thead>
  <tbody id="adminTable">
  
  </tbody>
  </table>
    </div>

</div>
<script src="/frontend/js/retrieve_data.js"></script>
<script src="/frontend/js/adminSearchStudent.js"></script>
<script src="/frontend/js/update.js"></script>
<script src="/frontend/js/borrowBook.js"></script>
<script src="/frontend/js/bookUpdate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>