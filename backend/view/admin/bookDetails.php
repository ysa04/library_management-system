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

<!-- data is coming from updateBook.php -->
    <div  class="tableBookDetails">
   <table class="table">
   <h4 class="table-h4">Book Details</h4>
    <thead>
    <tr>
      <th scope="col">Book id</th>
      <th scope="col">Book Title</th>
      <th scope="col">Book Author</th>
      <th scope="col">Genre</th>
   
    </tr>
   </thead>
   <tbody>
    <tr>
      <th> <input type="text" id="id" value="<?php echo $book_data['id'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="title" value="<?php echo $book_data['title'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="author" value="<?php echo $book_data['author'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="genre" value="<?php echo $book_data['genre'];?>" style="width: 200px;"/> </th>
  
    </tr>
  </tbody>
   <thead>
      <tr>
      <th scope="col">Book Count</th>
      <th scope="col">Publication Year</th>
      <th scope="col">Status</th> 
      <th scope="col">Shelve</th>  
    </tr>
  </thead>
  <tbody>
    <tr>

       <th> <input type="text" id="book_count" value="<?php echo $book_data['book_count'];?>" style="width: 200px;"/> </th>  
      <th> <input type="text" id="publication_year" value="<?php echo $book_data['publication_year'];?>" style="width: 200px;"/> </th> 
      <th> <input type="text" id="stat" value="<?php echo $book_data['stat'];?>" style="width: 200px;"/> </th>
      <th> <input type="text" id="shelve" value="<?php echo $book_data['shelve'];?>" style="width: 200px;"/> </th>
      <!-- <th> <input type="text" id="summary" value="<?php echo $book_data['summary'];?>" style="width: 200px;"/></th> -->
    </tr> 
  </tbody>
    </table>

    <table>
      <thead>
        <tr>
          <th>Summary</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <th> <textarea id="summary" style="width: 300px;"><?php echo $book_data['summary'];?></textarea></th>
        </tr>
      </tbody>
    </table>
    </div>


    <br/>

     <div class="table-button">
      <!-- updatebookdetails funtion is in bookupdate.js -->
     <button onclick="updateBookDetails(<?php echo $book_data['id'];?>)">Update Details</button>
    <button class="close-tab" onclick="closeBookTab()">Close Tab</button>
   </div>

  

<script src="/frontend/js/update.js"></script>
<script src="/frontend/js/borrowBook.js"></script>
<script src="/frontend/js/bookUpdate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>