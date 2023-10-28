<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the registration number from the form
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
?>
