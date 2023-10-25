<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";



$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the 'addcar' table
$sql = "SELECT * FROM addcar";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Populate the form fields with the retrieved data
    $carType = $row['Car_Type'];
    $carName = $row['Car_Name'];
    $carModel = $row['Car_Model'];
    $registrationNumber = $row['Registration_Number'];
    $chassisNumber = $row['Chassis_Number'];
}

$mysqli->close();

?>
