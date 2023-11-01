<?php
date_default_timezone_set('Asia/Dhaka');
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get temperature and registration number from the sensor table
$sql = "SELECT temperature, Date_Time, registrationNumber FROM sensor ORDER BY Date_Time DESC LIMIT 1";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $temperature = $row["temperature"];
        $date_time = $row["Date_Time"]; // Get the timestamp from the sensor table
        $registration_number = $row["registrationNumber"]; // Get registration number

        // Check if temperature is above 10
        if ($temperature > 10) {
            // Check if there are less than 5 records for the same registration number
            $count_sql = "SELECT COUNT(*) as count FROM temperature_history WHERE registrationNumber = '$registration_number'";
            $count_result = $conn->query($count_sql);
            $count_row = $count_result->fetch_assoc();
            $record_count = $count_row["count"];

            if ($record_count < 5) {
                // Save the temperature, current date/time, registration number, and notification time to the history table
                $insert_sql = "INSERT INTO temperature_history (temperature, date_time, registrationNumber, notification_time) VALUES ($temperature, '$date_time', '$registration_number', NOW())";
                if ($conn->query($insert_sql) === TRUE) {
                    echo "Your temperature is above 10. Current temperature: " . $temperature . "°C<br>";
                    echo "Notification sent at: " . date('Y-m-d H:i:s'); // Display the current timestamp
                } else {
                    echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }
             }// else {
            //     echo "Cannot store more than 5 records for the same registration number. ";
            //     echo "Notification sent at: " . date('Y-m-d H:i:s'); // Display the current timestamp
            // }
        } else {
            echo "Temperature is not above 10.";
        }
    } else {
        echo "No temperature data found.";
    }
}

// Close connection
$conn->close();
?>
