<?php
// Database connection

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dewey_number = $_POST['main_category'];
    $description = $_POST['description'];

    // Prepared statement to insert into dewey_classification
    $stmt = $conn->prepare("INSERT INTO dewey_classification (main_category, description) VALUES (?, ?)");
    $stmt->bind_param('ss', $dewey_number, $description);

    if ($stmt->execute()) {
        // After successfully adding a new description, also add a column in sub_dewey_classification
        $add_column_sql = "ALTER TABLE sub_dewey_classification ADD COLUMN `$description` VARCHAR(255)";
        
        if ($conn->query($add_column_sql)) {
            echo "Description added successfully updated!";
        } else {
            echo "Error adding column in sub_dewey_classification: " . $conn->error;
        }
    } else {
        echo "Error adding description: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: bookDdc.php"); // Redirect to the main page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Description</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h4>Add New Dewey Classification Description</h4>
        <form method="POST">
            <div class="mb-3">
                <label for="main_category" class="form-label">Main Category</label>
                <input type="text" class="form-control" id="main_category" name="main_category" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Description</button>
            <a href="bookDdc.php" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>