<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Library Management System</title>
<link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form action="/backend/view/student/signup.php" method="post">
        <div class="input-group">
            <label for="usn_number">USN:</label>
            <input type="text" id="usn_number" name="usn_number" required>
        </div>

    <!--<div class="input-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div> -->

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="input-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn">Register</button>
        </div>
    </form>
    <p>Already have an account? <a href="login.html">Login here</a></p>
    <p>Go Back to <a href="index.php">Homepage</a></p>
</div>
</body>
</html>
