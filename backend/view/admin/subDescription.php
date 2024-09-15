<?php
$sql = "SHOW COLUMNS FROM sub_dewey_classification";
$result = $conn->query($sql);

$columns = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $columns[] = $row['Field']; // Fetch column names
    }
}
$conn->close();
?>

<!-- HTML form with dropdown -->
<form action="your_form_handler.php" method="post">
    <label for="sub_ddc">Choose a category:</label>
    <select name="sub_ddc" id="sub_ddc">
        <?php foreach ($columns as $column): ?>
            <?php if ($column != 'id'): // Exclude 'id' column ?>
                <option value="<?= $column; ?>"><?= ucfirst($column); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Submit">
</form>
