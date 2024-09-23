<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Symbols+Outlined:opsz, wght, FILL, GRAD@48,400,0,0">
    
    <title>Student Home Page</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .book-card {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .book-card img {
            max-width: 100%;
            height: auto;
        }



    </style>
</head>
<body>
        <!-- PHP for session data -->
        <?php include 'studentNavbar.php'; ?> 

    
    <div style="background-color: rgb(191, 222, 234); border-radius: 5px; position: relative;" class="container">
        <div class="main-content">
            
    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card book-card">
                    <div class="card-body">
                        <?php
                        // Database connection parameters


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
 
                  if (!isset($_SESSION['usn']) || !isset($_SESSION['id'])){
                     
                   }

                   $student_id = $_SESSION['id'];

                        // Check if the book ID is specified in the query parameters
                        if (isset($_GET['id'])) {
                            // Retrieve the book ID from the query parameter
                            $book_id = $_GET['id'];

                            // Prepare and execute a query to fetch details of the specified book
                            $query = "SELECT id, title, author, summary,book_count, publication_year, stat,image_data, dewey_number, sub_dewey_number, book_description, sub_description FROM books WHERE id = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("i", $book_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

    // Check if the book is found
   if ($result->num_rows == 1) {
        // Display details of the book
        $row = $result->fetch_assoc();
    
        echo "<div class='container mt-4'>";
        echo "<div class='row align-items-center'>";
        echo "<h3 class='card-title'>" . $row['title'] . "</h3>";
        // Image
        echo "<div class='col-md-4'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' alt='" . $row["title"] . "' class='img-fluid mb-3'>";
        echo "</div>";
        
        // Book details
        echo "<div class='col-md-8'>";
        echo "<p class='card-text'><strong>Book ID No.:</strong> " . $row['id'] . "</p>";
        echo "<p class='card-text'><strong>Author:</strong> " . $row['author'] . "</p>";
        echo "<p class='card-text'><strong>Publication year:</strong> " . $row['publication_year'] . "</p>";
        echo "<p class='card-text'><strong>Book Count:</strong> " . $row['book_count'] . "</p>";
        echo "<p class='card-text'><strong>Status:</strong> " . $row['stat'] . "</p>";
        echo "<p class='card-text'><strong>Book Description:</strong> " . $row['book_description'] . "</p>";
        echo "<p class='card-text'><strong>Sub Description:</strong> " . $row['sub_description'] . "</p>";
        echo "<p class='card-text'><strong>Book Code Number:</strong> " . $row['dewey_number'] . $row['sub_dewey_number'] . $row['publication_year'] . "</p>";
        echo "</div>";
        
        echo "</div>";
        echo "<div class='bookSummary mt-4'>";
        echo "<h5>Summary:</h5>";
        echo "<p>" . $row['summary'] . "</p>";
        echo "</div>";
// Add student_id to the borrow buttons
// Add student_id to the borrow buttons and include the book title
echo "<button class='borrow-btn' data-book-id='" . htmlspecialchars($row['id']) . "' data-borrow-type='inside' data-student-id='" . htmlspecialchars($student_id) . "' data-book-title='" . htmlspecialchars($row['title']) . "'>Borrow inside</button>";
echo "<button class='borrow-btn' data-book-id='" . htmlspecialchars($row['id']) . "' data-borrow-type='outside' data-student-id='" . htmlspecialchars($student_id) . "' data-book-title='" . htmlspecialchars($row['title']) . "'>Borrow outside</button>";


        echo "</div>";
    } else {
        echo "<p>Book not found.</p>";
    }
    
                        }
                        // Close the database connection
                        $con->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>    
    </div>         

    <script>
   document.querySelectorAll('.borrow-btn').forEach(button => {
    button.addEventListener('click', function() {
        const bookId = this.getAttribute('data-book-id');
        const borrowType = this.getAttribute('data-borrow-type');
        const studentId = this.getAttribute('data-student-id'); // Get student ID
        const bookTitle = this.getAttribute('data-book-title'); // Get book title

        // Modify the confirmation message to include the book title
        const confirmation = confirm(`Are you sure you want to borrow the book titled "${bookTitle}"?`);

        console.log(bookId, borrowType, studentId, bookTitle); // Log book title

        if (confirmation) {
            this.textContent = "Requested";
            this.disabled = true; // Optionally disable the button

            // Send borrow request to server
            fetch('borrow.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ bookId, borrowType, studentId, bookTitle }) // Include studentId
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    });
});

</script>

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<?php include '../../../frontend/components/student/footer.html'; ?>
</html>
