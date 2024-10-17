<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz, wght, FILL, GRAD@48,400,0,0">
    <link rel="stylesheet" href="student_chatbox.css">
    <script src="student_chatbox.js" defer></script>
    <title>student Home Page</title>
    
</head>
<body>

<?php
// Start the session to get the logged-in user's information
session_start();

if (!isset($_SESSION['id'])){
 
}

$id = $_SESSION['id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_category"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Query to retrieve books requested by the specific user
$sql = "SELECT book_title, date_borrowed, date_returned, status 
        FROM studentbook 
        WHERE student_id = ? AND status != 'returned'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // Bind the id to the query
$stmt->execute();
$result = $stmt->get_result();

?>

<!-- Display the data in the table -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Placed on</th>
      <th scope="col">Return on</th>
      <th scope="col">Pick up Location</th>
      <th scope="col">Status</th>
      <th scope="col">Modify</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td scope="row"><?php echo htmlspecialchars($row["book_title"]); ?></td>
            <td scope="row"><?php echo htmlspecialchars($row["date_borrowed"]); ?></td>
            <td scope="row"><?php echo htmlspecialchars($row["date_returned"]); ?></td>
            <td scope="row">Library reception</td>
            <td scope="row"><?php echo htmlspecialchars($row["status"]); ?></td>
            <td><button class="btn btn-info">Cancel</button></td>
          </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
          <td colspan="5">You have not requested any books yet.</td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php
$stmt->close();
$conn->close();
?>


    <!-- Scripts -->
    <script src="/frontend/js/bookNavigate.js"></script>
    <script src="/frontend/js/retrieve_data.js"></script>
    <script src="/frontend/js/filtersearch.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Student Chatbox JS -->
    
</body>
</html>
