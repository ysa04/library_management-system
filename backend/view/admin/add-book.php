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

<div class="add_book_form container">

<div style="margin-Top: 10px;">
<form class="row g-3 needs-validation mt-4" action="addedBook.php" method="post">

  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">BOOK TITLE</label>
    <input type="text" class="form-control" name="title"  required>

  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">BOOK AUTHOR</label>
    <input type="text" class="form-control" name="author" required>

  </div>

<div class="col-md-4">
    <label for="validationCustom04" class="form-label">BOOK DESCRIPTION</label>
    <select class="form-select" id="ddc" name="ddc" required>
      <option selected disabled value="">Choose...</option>

      <?php
// Database connection (replace with your actual connection parameters)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "users_category"; // Replace with your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the table
$sql = "SELECT  dewey_number, description FROM dewey_classification";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Generate options for dropdown
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<option value="' . htmlspecialchars($row['dewey_number']) . '|' . htmlspecialchars($row['description']) . '">';
    echo htmlspecialchars($row['dewey_number']) . ' - ' . htmlspecialchars($row['description']);
    echo '</option>';
}
} else {
    echo '<option disabled>No categories available</option>';
}

// Free the result and close the connection
$result->free();
$conn->close();
        ?>
    </select>
  </div>


  <div class="col-md-4">
    <label for="validationCustom04" class="form-label">SUB DESCRIPTION</label>
    <select class="form-select" id="subDescription" name="subDescription" required>
      <option selected disabled value="">Choose...</option>
   <!-- addBook.js -->
    </select>
  </div>

  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">STATUS</label>
    <input type="text" class="form-control" name="status"  required>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">PUBLICATION YR</label>
    <input type="text" class="form-control" name="publication_year" required>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">BOOK COUNT</label>
    <input type="text" class="form-control" name="book_count" required>
  </div>


  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">SHELF NUMBER</label>
    <input type="text" class="form-control" name="shelf" required>
  </div>


  <div class="mb-4">
  <label for="exampleFormControlTextarea1" class="form-label">BOOK SUMMARY</label>
  <textarea class="form-control" name="book_summary" rows="3"></textarea>
</div>

<div class="col-mb-2">
  <label for="formFile" class="form-label">BOOK IMAGE</label>
  <input class="form-control" type="file" id="formFile" name="imageFile">
</div>

  <div class="col-12 mb-4">
    <button class="btn btn-primary" type="submit">Add Book</button>
  </div>
</form>
</div>


</div>
   


<script src="/frontend/js/addBook.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>