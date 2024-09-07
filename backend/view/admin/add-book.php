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
<form class="row g-3 needs-validation mt-4" novalidate>

  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">BOOK TITLE</label>
    <input type="text" class="form-control" id="validationCustom01"  required>

  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">BOOK AUTHOR</label>
    <input type="text" class="form-control" id="validationCustom02"  required>

  </div>

  <div class="col-md-4">
    <label for="validationCustom04" class="form-label">BOOK DESCRIPTION</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
  </div>

  <div class="col-md-4">
    <label for="validationCustom04" class="form-label">SUB DESCRIPTION</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
  </div>

  
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">STATUS</label>
    <input type="text" class="form-control" id="validationCustom02"  required>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">PUBLICATION YR</label>
    <input type="text" class="form-control" id="validationCustom03" required>
  </div>

  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">BOOK COUNT</label>
    <input type="text" class="form-control" id="validationCustom03" required>
  </div>


  <div class="col-md-4">
    <label for="validationCustom03" class="form-label">SHELF NUMBER</label>
    <input type="text" class="form-control" id="validationCustom03" required>
  </div>


  <div class="mb-4">
  <label for="exampleFormControlTextarea1" class="form-label">BOOK SUMMARY</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<div class="col-mb-2">
  <label for="formFile" class="form-label">BOOK IMAGE</label>
  <input class="form-control" type="file" id="formFile">
</div>

  <div class="col-12 mb-4">
    <button class="btn btn-primary" type="submit">Add Book</button>
  </div>
</form>
</div>


</div>
   



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>