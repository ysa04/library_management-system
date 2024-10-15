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
    
   <?php include 'navbar.php'; ?>
<div class="daily-borrow-portal">

  <div class="container">
  <form  class="header-form" id="searchBook" method="post"> 
    <label for="title">Title</label>
    <input type="text" id="title" name="title" required/>
    <label for="author">Author</label>
    <input type="text" id="author" name="author" required>
    <button type="submit">Search</button>
   </form>
   <span id="searchResult">
   <?php
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users_category";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

         // Sanitize user input
        $title = trim(strtolower($_POST['title']));
        $author = trim(strtolower($_POST['author']));

    // Prepare and bind SQL statement
    $sql = "SELECT * FROM books WHERE LOWER(TRIM(title)) = ? AND LOWER(TRIM(author)) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $author);

    // Execute query
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead><tr>
        <th>Title</th>
        <th>Author</th>
        <th>Book ID</th>
        <th>Publication Year</th>
        <th>Status</th
        </tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["publication_year"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stat"]) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No results found. Please check your input.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

</span>
</div>

  <div class="container daily-borrow">
  <form method="post" action="save_borrow_data.php">
  <table>
  <h4>Daily borrow books</h4>
    <thead>
      <tr>
           <th>Book ID</th>
            <th>Student ID</th>
            <th>Book Title</th>      
      </tr>
    </thead>
    <tbody>
      <tr>
      <th><input type="text" id="book_id" name="book_id" style="width: 200px;" required></th>
      <th><input type="text" id="student_id" name="student_id" style="width: 200px;" required></th>
      <th><input type="text" id="book_title" name="book_title" style="width: 200px;" required></th>
      </tr>
    </tbody>
    <thead>
      <tr>
            <th>Book Author</th>
            <th>Published Date</th>       
            <th>Date Borrowed</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <th><input type="text" id="book_author" name="book_author" style="width: 200px;" required></th>
      <th><input type="text" id="published_date" name="published_date" style="width: 200px;" required></th>
      <th><input type="date" id="date_borrowed" name="date_borrowed" style="width: 200px;" required></th>
      </tr>
    </tbody>
     <thead>
      <tr>
           <th>Date Returned</th>
            <th>Number Of Books</th>
            <th>Penalty</th>
      </tr>
     </thead>
     <tbody>
      <tr>
      <th><input type="date" id="date_returned" name="date_returned" style="width: 200px;" required></th>
      <th><input type="text" id="number_of_books" name="number_of_books"style="width: 200px;" required></th>
      <th><input type="text" id="penalty" name="penalty" style="width: 200px;" required></th>
      </tr>
     </tbody>
     <thead>
      <tr>
      <th>Paid Penalty</th>
      </tr>
     </thead>
     <tbody>
      <tr>
      <th><input type="text" id="paid_penalty" name="paid_penalty" style="width: 200px;" required></th>
      </tr>
     </tbody>
  </table>
  <button class="borrow-button">submit</button>
  </form>
  </div>
  </div>

  

<script src="/frontend/js/borrowBook.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>