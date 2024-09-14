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

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';

// Database connection
$conn = new mysqli($host, $user, $password, $dbname);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$column = isset($_GET['column']) ? $_GET['column'] : '';

// Fetch record details
if ($id && $column) {
    $stmt = $conn->prepare("SELECT id, `$column` FROM sub_dewey_classification WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_value = $_POST['value'];

    // Update record
    $stmt = $conn->prepare("UPDATE sub_dewey_classification SET `$column` = ? WHERE id = ?");
    $stmt->bind_param('si', $new_value, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the main page
    header("Location: sub_ddc.php"); // Change this to your main page
    exit;
}
?>

<div class="container mt-4">
    <h4>Edit Sub Description</h4>
    <?php if ($record) { ?>
    <form method="POST">
        <div class="mb-3">
            <label for="value" class="form-label">Sub Description</label>
            <input type="text" id="value" name="value" class="form-control" value="<?= htmlspecialchars($record[$column]); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="sub_ddc.php" class="btn btn-secondary">Cancel</a> <!-- Change this to your main page -->
    </form>
    <?php } else { ?>
    <p>Record not found.</p>
    <?php } ?>
</div>

<!-- Bootstrap JS and dependencies -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>


<?php
// Close connection
$conn->close();
?>
