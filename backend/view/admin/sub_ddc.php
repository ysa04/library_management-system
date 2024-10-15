
<?php include 'navbar.php'; ?> 
<!-- <button type="button" onclick="window.history.back();" class="btn btn-primary mt-2" style="margin-Left: 10px;">Go Back</button> -->

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

// Fetch column names (objects) once
$sql_columns = "SHOW COLUMNS FROM sub_dewey_classification";
$columns_result = $conn->query($sql_columns);

$columns = [];
while ($col_row = $columns_result->fetch_assoc()) {
    if ($col_row['Field'] != 'id') {
        $columns[] = $col_row['Field']; // Exclude 'id' column
    }
}

// Fetch all data from sub_dewey_classification only once
$sql_data = "SELECT * FROM sub_dewey_classification";
$data_result = $conn->query($sql_data);

$rows = [];
while ($row = $data_result->fetch_assoc()) {
    $rows[] = $row; // Store fetched data in an array for reuse
}
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

<div class="container">
    <h4>Edit Sub Description</h4>

    <form action="addSubDdc.php" method="post">
        <label for="category">Select Category:</label>
        <select id="category" name="category" required style="border-radius: 5px">
            <option value="">Select a Category</option>
            <?php
            // Populate options with column names (only once)
            foreach ($columns as $column) {
                echo "<option value='" . htmlspecialchars($column) . "'>" . ucfirst($column) . "</option>";
            }
            ?>
        </select>
        <label for="data">Data:</label>
        <input type="text" id="data" name="data" required  style="border-radius: 5px">
        <input type="submit" value="Add Data" style="width: 80px; padding: 5px; font-size: 14px;background-color: skyblue; " >
        </form>

    <br/> <br/>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <?php
                // Render column headers only once
                foreach ($columns as $column) {
                    echo "<th>" . htmlspecialchars($column) . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Render table rows using the fetched data
            foreach ($rows as $row) {
                echo "<tr>";
                foreach ($columns as $column) {
                    echo "<td><a href='subDdc_edit.php?id=" . urlencode($row['id']) . "&column=" . urlencode($column) . "'>" . htmlspecialchars($row[$column]) . "</a></td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




