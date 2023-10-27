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
    $driverName = $_POST["driverName"];
    $driverNumber = $_POST["driverNumber"];
    $licenseNumber = $_POST["licenseNumber"];
    $licenseExpired = $_POST["licenseExpired"];
    $email = $_POST["email"];

    // You should perform data validation and sanitization here

    // Construct the SQL INSERT query
    $sql = "INSERT INTO adddriver (`Driver_Name`, `Driver_Number`, `License_Number`, `License_Expired`, `Email`) VALUES ('$driverName', '$driverNumber', ' $licenseNumber', '$licenseExpired', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location:userprofile.php');
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    // $sql2 = "SELECT `Driver_Name`, `Driver_Number`, `License_Number`, `License_Expired` FROM `adddriver`";

    // // $sql2 = "SELECT `Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number` FROM `addcar` WHERE `Registration_Number` = '$registrationNumber'";

    // $result = $conn->query($sql2);

    // if ($result->num_rows > 0) {
    //     $driverData = array();
    //     while ($row = $result->fetch_assoc()) {
    //         $driverData[] = $row;
    //     }
    //     header('Location: userprofile.php');
    // } else {
    //     echo 'error'; // No data found
    // }

  
    $conn->close();
}
?>
