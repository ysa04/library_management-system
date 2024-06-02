<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMA MAKATI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="/frontend/css/admin.css">
    
   </head>
   <body>

  <h4>Student record with borrowed books</h4>
  <div class="borrow-main">
    <table class="table">
      <thead>
        <tr>
            <th>Book ID</th>
            <th>Student ID</th>
            <th>Book Title</th>
            <th>Date Borrowed</th>
            <th>Date Returned</th>
            <th>Number of Books</th>
            <th>Penalty</th>
            <th>Book Status</th>
        </tr>
      </thead>
      <tbody id="borrow-main-table">
    <!-- borrowBook.js -->
      </tbody>
    </table>

    <button class="closeTab" onclick="closeBorrow()">close tab</button>
  </div>


  

<script src="/frontend/js/bookBarrow.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>