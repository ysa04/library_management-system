<?php require 'script.php' ?>


<?php
$servername = "localhost";
$username = "root";
$password = "ysa_2024_gatongay";
$dbname = "users_category";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT sb.student_id, sb.book_title, sb.published_date, sb.status, sb.date_returned, sb.penalty, si.first_name, si.last_name, si.email, si.contact_number 
        FROM studentbook sb
        JOIN student_info si ON sb.student_id = si.id
        WHERE sb.status = 'not returned'";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Execution failed: " . $stmt->error);
}

// Collecting data
$emailsData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emailsData[] = $row;
    }
} else {
    echo "No students found who have not returned their books.";
}

$stmt->close();
$conn->close();

// Sending emails
foreach ($emailsData as $data) {
    $email = $data["email"];
    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $book_title = $data["book_title"];
    $date_returned = $data["date_returned"];
    $penalty = $data["penalty"];

    $subject = "Library Book Return Reminder";
    $message = "Dear $first_name $last_name,<br><br>";
    $message .= "This is a friendly reminder regarding the book titled '<strong>$book_title</strong>' that you borrowed from the school library.<br>";
    $message .= "The book was due to be returned by <strong>$date_returned</strong>. As of today, it has not been returned yet. Please return the book as soon as possible to avoid a penalty of <strong>$penalty</strong>.<br><br>";
    $message .= "Thank you for your prompt attention to this matter.<br><br>";
    $message .= "Best regards,<br>Your School Library";

    $emailStatus = sendMail($email, $subject, $message);
    echo "Email status for $first_name $last_name: $emailStatus<br>";
}
?>

