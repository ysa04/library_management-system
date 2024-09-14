
<?php include 'navbar.php'; ?> 


<?php
// Database connection

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'users_category';


// Database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from sub_dewey_classification
$sql = "SELECT * FROM sub_dewey_classification";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Dewey Classification Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h4>Sub Dewey Classification Data</h4>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <?php
                // Fetch and render column headers
                $columns = $result->fetch_fields();
                foreach ($columns as $column) {
                    if ($column->name !== 'id') { // Skip the 'id' column in headers
                        echo "<th>" . htmlspecialchars($column->name) . "</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and render table rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // Display ID
                foreach ($columns as $column) {
                    if ($column->name !== 'id') { // Skip the 'id' column
                        echo "<td><a href='subDdc_edit.php?id=" . urlencode($row['id']) . "&column=" . urlencode($column->name) . "'>" . htmlspecialchars($row[$column->name]) . "</a></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




