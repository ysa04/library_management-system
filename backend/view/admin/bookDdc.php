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
// Database connection

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';


// Database connection
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch all records from the dewey_classification table
$sql = "SELECT * FROM dewey_classification";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start a transaction
    $conn->begin_transaction();

    try {
        // Prepare the update statement for dewey_classification
        $stmt = $conn->prepare("UPDATE dewey_classification SET main_category = ?, description = ? WHERE id = ?");

        // Loop through all submitted fields to update the records
        foreach ($_POST['id'] as $index => $id) {
            $dewey_number = $_POST['main_category'][$index];
            $description = $_POST['description'][$index];

            // Bind parameters and execute the query for dewey_classification
            $stmt->bind_param('ssi', $dewey_number, $description, $id);
            $stmt->execute();

            // Check if the column already exists in sub_dewey_classification
            $check_column_sql = "SHOW COLUMNS FROM sub_dewey_classification LIKE '$description'";
            $column_result = $conn->query($check_column_sql);

            if ($column_result->num_rows === 0) {
                // Add a new column in sub_dewey_classification if the description is new
                $add_column_sql = "ALTER TABLE sub_dewey_classification ADD COLUMN `$description` VARCHAR(255)";
                if (!$conn->query($add_column_sql)) {
                    throw new Exception("Error adding column: " . $conn->error);
                }
            }
        }

        // Commit the transaction
        $conn->commit();
        $stmt->close();
        header("Location: bookDdc.php");
    } catch (Exception $e) {
        // Rollback the transaction if something failed
        $conn->rollback();
        echo "Failed to update: " . $e->getMessage();
    }
}

$conn->close();
?>

<div class="table_ddc container">
    <form method="POST">
        <table class="table">
            <h4 class="table-h4">Book Description</h4>
            
            <thead>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <!-- Hidden input to store the ID for each row -->
                    <input type="hidden" name="id[]" value="<?= htmlspecialchars($row['id']); ?>">
                    <th>
                        <input type="text" id="main_category" class="form-control" name="main_category[]" value="<?= htmlspecialchars($row['main_category']); ?>" style="width: 150px;">
                    </th>
                    <th>
                        <input type="text" id="description" class="form-control" name="description[]" value="<?= htmlspecialchars($row['description']); ?>" style="width: 300px;">
                    </th>
                </tr>
                <?php } ?>
            </thead>
        </table>
        <button type="button" onclick="window.history.back();" class="btn btn-primary">Go Back</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="add_description.php" class="btn btn-secondary">Add Description</a>
    
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




