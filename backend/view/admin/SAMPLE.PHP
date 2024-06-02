<?php
// require 'path/to/PHPMailerAutoload.php'; // Make sure you have included PHPMailer library

// Function to send mail
function sendMail($email, $subject, $message) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAILHOST;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = strip_tags($message);
    
    if (!$mail->send()) {
        return 'Email not sent. Please try again.';
    } else {
        return 'Success';
    }
}

// SQL query to fetch students who have not returned the book
$dateTwoDaysFromNow = date('Y-m-d', strtotime('+2 days'));

$sql = "SELECT sb.student_id, sb.book_title, sb.published_date, sb.status, sb.date_returned, sb.penalty, si.first_name, si.last_name, si.email, si.contact_number 
        FROM studentbook sb
        JOIN student_info si ON sb.student_id = si.id
        WHERE sb.status = 'not returned' AND sb.date_returned = DATE_ADD(CURDATE(), INTERVAL 2 DAY)";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        $student_id = $row["student_id"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $book_title = $row["book_title"];
        $date_returned = $row["date_returned"];
        $penalty = $row["penalty"];
        $status = $row["status"];
        
        $subject = "Library Book Return Reminder";
        $message = "Dear $first_name $last_name,\n\n";
        $message .= "This is a friendly reminder regarding the book titled '$book_title' that you borrowed from the school library.\n";
        $message .= "The book was due to be returned by $date_returned. As of today, it has not been returned yet. Please return the book as soon as possible to avoid a penalty of $penalty.\n\n";
        $message .= "Thank you for your prompt attention to this matter.\n\n";
        $message .= "Best regards,\nYour School Library";
        
        $result = sendMail($email, $subject, $message);
        echo "Email status for $first_name $last_name ($email): $result<br>";
    }
} else {
    echo "No students found who have not returned their books.";
}
?>
