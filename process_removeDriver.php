<?php
// Check if the form is submitted

    // Establish a connection to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fms_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    // process_removeDriver.php
    
    // Establish database connection
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $driverName = $_POST['driverName']; // Replace 'driver_name' with the actual name attribute of your input field
        $driverNumber = $_POST['driverNumber']; // Replace 'driver_number' with the actual name attribute of your input field
        $licenseNumber = $_POST['licenseNumber'];
        $licenseExpired = $_POST['licenseExpired']; // Replace 'license_number' with the actual name attribute of your input field
    
        // Construct the DELETE query
        $sql = "DELETE FROM adddriver WHERE Driver_Name = '$driverName' AND Driver_Number = '$driverNumber' AND License_Number = '$licenseNumber' AND License_Expired = '$licenseExpired'";
    
        // Execute the DELETE query
        if (mysqli_query($conn, $sql)) {
            // echo "Record deleted successfully";
            header('Location:userprofile.php');
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    
        // Close database connection
        mysqli_close($conn);
    }
    ?>
    
