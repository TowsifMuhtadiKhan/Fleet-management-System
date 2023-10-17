<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $carType = $_POST["carType"];
    $carName = $_POST["carName"];
    $carModel = $_POST["carModel"];
    $registrationNumber = $_POST["registrationNumber"];
    $chassisNumber = $_POST["chassisNumber"];

    // You should perform data validation and sanitization here

    // Construct the SQL INSERT query
    $sql = "INSERT INTO addcar (`Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number`) VALUES ('$carType', '$carName', '$carModel', '$registrationNumber', '$chassisNumber')";
    
    // Prepare the SQL statement
    
    // Bind parameters
    //$stmt->bind_param("sssss", $carType, $carName, $carModel, $registrationNumber, $chassisNumber);

    // Execute the statement
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    // Close the statement and the database connection
  
    $conn->close();
}
?>
