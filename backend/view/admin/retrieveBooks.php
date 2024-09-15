<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMA MAKATI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
 
    
   </head>
   <body>
   <?php include 'navbar.php'; ?> 
 
   <button type="button" onclick="window.history.back();" class="btn btn-primary mt-2" style="margin-Left: 10px;">Go Back</button>
   <div class="container retrieve-books">


   <div class="bookForm-div">

  <!--the function adminSearchBook.js -->
    <form id="bookForm">
    <label for="book-title">Book Title</label>
    <input type="text" id="title" name="title"/>
    <label for="book-author">Book Author</label>
    <input type="text" id="author" name="author">
    <button type="submit" class="bookForm_button">Search</button>
  </form>
  </div>

  <br/> <br/>
 <div>
  <table class="table book_table">
  <thead>
    <tr>
      <th>BOOK ID</th>
      <th>BOOK TITLE</th>
      <th>BOOK AUTHOR</th>
      <th>BOOK COUNT</th>
      <th>PUBLICATION YEAR</th>
      <th>STATUS</th>
      <th>OPTION</th>
    </tr>
  </thead>
  <tbody id="adminTableBody">
  
  </tbody>
  </table>

     <div class="bookModaldetails">
  <!-- book detail located -->
  </div>

 </div>



<script src="/frontend/js/update.js"></script>
<script src="/frontend/js/adminSearchBook.js"></script>
<script src="/frontend/js/bookUpdate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>