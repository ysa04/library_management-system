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
        <?php
    session_start();
    if (!isset($_SESSION['usn']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) {
        header("Location: studentlogin.php");
        exit();
    }
    $usn = $_SESSION['usn'];
    $name = $_SESSION['first_name'];
    $surName = $_SESSION['last_name'];
    require_once 'logout.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
        logout();
    }
    ?>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="top-icon" src="/frontend/img/header-book-icon.png" width="30" height="30" alt=""/>
                <p>e-Library</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PROFILE</a>
                    </li>
                </ul>
                <div style="display: flex; color: white; margin-top: 15px;">
                    <i style="margin-top: 4px;" class="fa-solid fa-user"></i>
                    <p>&nbsp;<?php echo $name; ?>,</p>
                    <p>&nbsp;<?php echo $surName; ?></p> <br/>
                    <p>&nbsp;&nbsp;USN: <?php echo $usn; ?></p>
                    <form method="post" action="/backend/view/index.php">
                        <input type="hidden" name="logout" value="true">
                        <button class="logout-button" type="submit">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    
    <div style="background-color: rgb(191, 222, 234); border-radius: 5px; position: relative;" class="container">
        <div class="main-content">
            <h4>"If you study to remember, you will forget; But if you study to understand you will remember"</h4>
            <h1>BOOK CATEGORIES</h1>
            
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
                        $password = "ysa_2024_gatongay";
                        $database = "library";

                        // Attempt to establish a connection to the MySQL database
                        $con = new mysqli($host, $username, $password, $database);

                        // Check if the connection was successful
                        if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                        }

                        // Check if the book ID is specified in the query parameters
                        if (isset($_GET['book_id'])) {
                            // Retrieve the book ID from the query parameter
                            $book_id = $_GET['book_id'];

                            // Prepare and execute a query to fetch details of the specified book
                            $query = "SELECT book_id, title, author, summary, genre, book_count, publication_year, status, image_name, image_data FROM books WHERE book_id = ?";
                            $stmt = $con->prepare($query);
                            $stmt->bind_param("i", $book_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Check if the book is found
                            if ($result->num_rows == 1) {
                                // Display details of the book
                                $row = $result->fetch_assoc();
                                echo "<h1 class='card-title'>" . $row['title'] . "</h1>";
                                echo "<img src='data:image/jpeg;base64," . base64_encode($row["image_data"]) . "' alt='" . $row["title"] . "' class='img-fluid mb-3'>";
                                echo "<p class='card-text'><strong>Author:</strong> " . $row['author'] . "</p>";
                                echo "<p class='card-text'><strong>Summary:</strong> " . $row['summary'] . "</p>";
                                echo "<p class='card-text'><strong>Genre:</strong> " . $row['genre'] . "</p>";
                                echo "<p class='card-text'><strong>Publication Year:</strong> " . $row['publication_year'] . "</p>";
                                echo "<p class='card-text'><strong>Book Count:</strong> " . $row['book_count'] . "</p>";
                                echo "<p class='card-text'><strong>Status:</strong> " . $row['status'] . "</p>";
                            } else {
                                echo "<p class='text-danger'>Book not found.</p>";
                            }
                        } else {
                            echo "<p class='text-danger'>Book ID not specified.</p>";
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
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
<!-- Footer -->
<?php include '../../../frontend/components/student/footer.html'; ?>
</html>
