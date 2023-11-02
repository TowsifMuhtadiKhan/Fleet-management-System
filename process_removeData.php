<?php

$regNum = $_POST["reg_num"];

// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the registration number from the form
    // Prepare SQL query to delete the row based on registration number
    $sql = "DELETE FROM addcar WHERE Registration_Number = '$regNum'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // echo "Record removed successfully";
        header('Location:userprofile.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the database connection
    $conn->close();
}
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        $sql5 = "DELETE FROM users WHERE `Email` = '$email'";
        $result5 = $mysqli->query($sql5);
    
        $sql6 = "DELETE FROM adddriver WHERE `Email` = '$email'";
        $result6 = $mysqli->query($sql6);
    
        $sql7 = "DELETE FROM addcar WHERE `Email` = '$email'";
        $result7 = $mysqli->query($sql7);
        header('Location:dashboard.php');
    } 
    else {  
        echo "Error";
    }
?>
