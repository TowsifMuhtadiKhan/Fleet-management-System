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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You should perform data validation and sanitization here.

    // Insert data into the database
<<<<<<< HEAD
    $sql = "INSERT INTO users (`Name`, `Phone`, `Email`, `Username`, `Password`) VALUES ('$name', '$phone', '$email', '$username', '$password')";
=======
    $sql = "INSERT INTO users (name, phone, email, username, password) VALUES ('$name', '$phone', '$email', '$username', '$password')";
>>>>>>> bffab85a2da2befa23bec052c9c440146454dde2

    if ($conn->query($sql) === TRUE) {
        // Successfully registered
        echo "Registration successful!";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
