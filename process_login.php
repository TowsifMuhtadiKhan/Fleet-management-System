<?php
// Establish a MySQL database connection
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";
=======
$servername = "your_mysql_server";
$username = "your_mysql_username";
$password = "your_mysql_password";
$database = "your_database_name";
>>>>>>> bffab85a2da2befa23bec052c9c440146454dde2

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
<<<<<<< HEAD
    $sql = "SELECT * FROM users WHERE `Username`='$username' AND `Password`='$password'";
=======
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
>>>>>>> bffab85a2da2befa23bec052c9c440146454dde2

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
<<<<<<< HEAD
        header("Location: userprofile.html");
=======
        header("Location: dashboard.html");
>>>>>>> bffab85a2da2befa23bec052c9c440146454dde2
        exit();
    } else {
        // Login failed
        echo "Login failed. Please check your username and password.";
    }

    $conn->close();
}
?>
