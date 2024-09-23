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

// Query to fetch borrow requests that are not approved
$query = "SELECT sb.id, sb.student_id, sb.book_id, sb.borrow_type, sb.date_borrowed, sb.date_returned, b.title, b.author 
          FROM studentbook sb 
          JOIN books b ON sb.book_id = b.id 
          WHERE sb.approved = 0";

$result = $con->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Borrow Requests for Approval</h1>";
    echo "<table class='table'>";
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
                    <button onclick='approveRequest({$row['id']})'>Approve</button>
                    <button onclick='rejectRequest({$row['id']})'>Reject</button>
                </td>
              </tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "<p>No borrow requests found.</p>";
}

$con->close();
?>



<script>


function approveRequest(requestId) {
    if (confirm("Are you sure you want to approve this request?")) {
        updateRequestStatus(requestId, 'approve');
    }
}

function rejectRequest(requestId) {
    if (confirm("Are you sure you want to reject this request?")) {
        updateRequestStatus(requestId, 'reject');
    }
}



function updateRequestStatus(requestId, action) {
    fetch('update_request_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            requestId: requestId,
            action: action
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // Refresh the page to reflect changes
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}



</script>



<script src="/frontend/js/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>