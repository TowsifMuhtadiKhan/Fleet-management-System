<?php
// Establish a MySQL database connection

$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";


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
    $repeatPassword = $_POST["repeatPassword"];

    // You should perform data validation and sanitization here.

    // Insert data into the database

    $sql = "INSERT INTO users (`Name`, `Phone`, `Email`, `Username`, `Password`) VALUES ('$name', '$phone', '$email', '$username', '$password')";

    if($password !== $repeatPassword){
        alert('Password not match');
    }

    else if ($conn->query($sql) === TRUE) {
        // Successfully registered
        // echo "Registration successful!";
        header('Location:login.html');

    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
