

<!-- 
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $book_title = $_POST["book_title"];
    $date_returned = $_POST["date_returned"];
    $penalty = $_POST["penalty"];
    $status = $_POST["status"];
    
    $subject = "Library Book Return Reminder";
    $message = "Dear $first_name $last_name,\n\n";
    $message .= "This is a friendly reminder regarding the book titled '$book_title' that you borrowed from the school library.\n";
    $message .= "The book was due to be returned by $date_returned. As of today, it has not been returned yet. Please return the book as soon as possible to avoid a penalty of $penalty.\n\n";
    $message .= "Thank you for your prompt attention to this matter.\n\n";
    $message .= "Best regards,\nYour School Library";
    
    $result = sendMail($email, $subject, $message);
    echo $result;

}
?> -->


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



<?php

if(@$response == "success"){
    ?>
    <p>email sent successfully</p>
    <?php
}else{
    ?>
    <p> <?php echo @$response ?></p>
    <?php
}

?>


<div class="student-borrow container">
<h3>Students with borrowed books</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "ysa_2024_gatongay";
$dbname = "users_category";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$due_date = date('Y-m-d', strtotime('+3 days'));

// Prepare SQL query to fetch data from studentbook and join with student_info
$sql = "SELECT sb.student_id, sb.book_title, sb.published_date, sb.status, sb.date_returned, sb.penalty, si.first_name, si.last_name, si.email, si.contact_number 
        FROM studentbook sb
        JOIN student_info si ON sb.student_id = si.id
        WHERE sb.status = 'not returned'";
        

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<tr>
            <th>Student ID</th>
            <th>Book Title</th>
            <th>Published Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Book should return by</th>
            <th>Penalty</th>
            <th>Status</th>
    
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["book_title"] . "</td>";
        echo "<td>" . $row["published_date"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contact_number"] . "</td>";
        echo "<td>" . $row["date_returned"] . "</td>";
        echo "<td>" . $row["penalty"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>
                <form method='post' action=''>
                    <input type='hidden' name='email' value='" . $row["email"] . "' />
                    <input type='hidden' name='student_id' value='" . $row["student_id"] . "' />
                    <input type='hidden' name='first_name' value='" . $row["first_name"] . "' />
                    <input type='hidden' name='last_name' value='" . $row["last_name"] . "' />
                    <input type='hidden' name='book_title' value='" . $row["book_title"] . "' />
                    <input type='hidden' name='date_returned' value='" . $row["date_returned"] . "' />
                    <input type='hidden' name='penalty' value='" . $row["penalty"] . "' />
                    <input type='hidden' name='status' value='" . $row["status"] . "' />
        
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No students found in the studentbook table.";
}

// Close the connection
$conn->close();

?>

</div>
  

<!-- <script src="/frontend/js/retrieve_data.js"></script>
<script src="/frontend/js/filtersearch.js"></script>
<script src="/frontend/js/borrowBook.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>