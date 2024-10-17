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

 

    <?php

$host = "localhost";
$username = "root";
$password = "";
$database = "users_category";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Handle claim and delete requests
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'];
        $id = $_POST['id'];

        if ($action == 'claim') {
            // Update status to 'claimed'
            $updateQuery = "UPDATE studentbook SET status='claimed' WHERE id=?";
        } elseif ($action == 'delete') {
            // Delete the entry
            $updateQuery = "DELETE FROM studentbook WHERE id=?";
        }

        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        exit; // Exit after handling the request
    }

    // Query to get all records with status 'ready'
    $query = "SELECT sb.id, sb.student_id, sb.book_id, sb.borrow_type, sb.date_borrowed, sb.date_returned, b.title, b.author 
              FROM studentbook sb 
              JOIN books b ON sb.book_id = b.id 
              WHERE sb.status = 'ready'";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
      echo "<h4 class='container mt-2'>Books Ready for Claiming</h4>";
        echo "<table class='container table table-striped table-hover'>";
        echo "<thead>
                <tr>
                    <th>Student ID</th>
                    <th>Book Title</th>
                    <th>Book Author</th>
                    <th>Borrow Type</th>
                    <th>Date Borrowed</th>
                    <th>Date Returned</th>
                    <th>Actions</th>
                </tr>
              </thead>";
        echo "<tbody>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['borrow_type']}</td>
                    <td>{$row['date_borrowed']}</td>
                    <td>{$row['date_returned']}</td>
                    <td>
                        <button class='btn btn-primary btn-sm' onclick='claimBook({$row['id']})'>Claim</button>
                        <button class='btn btn-danger btn-sm' onclick='deleteBook({$row['id']})'>Delete</button>
                    </td>
                  </tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "<p class='container mt-2'>No books available for claiming.</p>";
    }

    $con->close();
    ?>

    <script>
    function claimBook(id) {
        if (confirm("Are you sure you want to claim this book?")) {
            sendRequest('claim', id);
        }
    }

    function deleteBook(id) {
        if (confirm("Are you sure you want to delete this book entry?")) {
            sendRequest('delete', id);
        }
    }

    function sendRequest(action, id) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "", true); // Adjust URL if necessary
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload(); // Reload the page to see updated data
            }
        };
        xhr.send(`action=${action}&id=${id}`);
    }
    </script>

    <script src="/frontend/js/borrowBook.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
