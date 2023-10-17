<?php
// Establish a MySQL database connection
$servername = "your_mysql_server";
$username = "your_mysql_username";
$password = "your_mysql_password";
$database = "your_database_name";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a session
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You should perform data validation and sanitization here.

    // Query the database to check if the username and password match
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        header("Location: dashboard.html");
        exit();
    } else {
        // Login failed
        echo "Login failed. Please check your username and password.";
    }

    $conn->close();
}
?>
