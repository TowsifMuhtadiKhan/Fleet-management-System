<?php
session_start(); // Start the session

if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page
    header("Location: login.html"); // Replace "login.php" with the desired destination
    exit();
}
?>
