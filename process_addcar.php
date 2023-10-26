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
    $email = $_POST["email"];

    // You should perform data validation and sanitization here

    // Construct the SQL INSERT query
    $sql = "INSERT INTO addcar (`Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number`, `Email`) VALUES ('$carType', '$carName', '$carModel', '$registrationNumber', '$chassisNumber', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    $sql2 = "SELECT `Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number` FROM `addcar`";

    // $sql2 = "SELECT `Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number` FROM `addcar` WHERE `Registration_Number` = '$registrationNumber'";

    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $carData = array();
        while ($row = $result->fetch_assoc()) {
            $carData[] = $row;
        }
        header('Location: userprofile.php');
    } else {
        echo 'error'; // No data found
    }

    // Prepare the SQL statement
    
    // Bind parameters
    //$stmt->bind_param("sssss", $carType, $carName, $carModel, $registrationNumber, $chassisNumber);
    // $sql2 = "SELECT carType, carName, carModel, registrationNumber, chassisNumber FROM cars WHERE registrationNumber = '$registrationNumber'";

    // $result = $conn->query($sql2);

    // if ($result->num_rows > 0) {
    //     $carData = array();
    //     while ($row = $result->fetch_assoc()) {
    //         $carData[] = $row;
    //     }
    //     echo json_encode($carData);
    // } else {
    //     echo 'error'; // No data found
    // }

    // Execute the statement
    

    // Close the statement and the database connection
  
    $conn->close();
}
?>
