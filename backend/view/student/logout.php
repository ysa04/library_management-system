<?php
// Function to logout
function logout() {
    // Start the session
    session_start();

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: student_login.html");
    exit;
}

