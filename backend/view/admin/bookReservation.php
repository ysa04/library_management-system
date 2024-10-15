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

$host = "localhost";
$username = "root";
$password = "";
$database = "users_category";

// Attempt to establish a connection to the MySQL database
$con = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle approve and reject requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'approve') {
        // Update status to 'ready' and set date_returned based on borrow_type
        $query = "SELECT borrow_type FROM studentbook WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($borrowType);
        $stmt->fetch();
        $stmt->close();

        if ($borrowType === 'outside') {
            // Set the date returned to 3 days from now
            $dateReturned = date('Y-m-d H:i:s', strtotime('+3 days'));
        } else {
            // No date returned for inside borrowing
            $dateReturned = date('Y-m-d H:i:s', strtotime('+1 hour'));
        }

        $updateQuery = "UPDATE studentbook SET status='ready', approved = approved + 1, date_returned=? WHERE id=?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("si", $dateReturned, $id);
    } elseif ($action == 'reject') {
        $updateQuery = "UPDATE studentbook SET status='rejected' WHERE id=?";
        $stmt = $con->prepare($updateQuery);
        $stmt->bind_param("i", $id);
    }

    $stmt->execute();
    $stmt->close();
    exit; // Exit after handling the request
}

// Your existing query
$query = "SELECT sb.id, sb.student_id, sb.book_id, sb.borrow_type, sb.date_borrowed, sb.date_returned, b.title, b.author 
          FROM studentbook sb 
          JOIN books b ON sb.book_id = b.id 
          WHERE sb.status = 'pending'";

$result = $con->query($query);

if ($result->num_rows > 0) {
    echo "<h4>Borrow Requests for Approval</h4>";
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
                    <button class='btn btn-success btn-sm mb-2'  onclick='approveRequest({$row['id']})'>Approve</button>
                    <button class='btn btn-danger btn-sm' onclick='rejectRequest({$row['id']})'>Reject</button>
                </td>
              </tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "<p class='container mt-2'>No borrow requests found.</p>";
}
?>

<script>
function approveRequest(id) {
    if (confirm("Are you sure you want to approve this request?")) {
        sendRequest('approve', id);
    }
}

function rejectRequest(id) {
    if (confirm("Are you sure you want to reject this request?")) {
        sendRequest('reject', id);
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

<?php
$con->close();
?>


<script src="/frontend/js/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>