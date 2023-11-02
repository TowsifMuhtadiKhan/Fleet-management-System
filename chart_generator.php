<?php 
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL query to fetch sensor data
$sql1 = "SELECT temperature, humidity, air_pressure FROM sensor";
$result1 = $mysqli->query($sql1);

// Calculate average temperature, humidity, and air pressure
$totalTemperature = 0;
$totalHumidity = 0;
$totalAirPressure = 0;
$rowCount = 0;

while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
    $totalTemperature += $row['temperature'];
    $totalHumidity += $row['humidity'];
    $totalAirPressure += $row['air_pressure'];
    $rowCount++;
}

// Calculate averages
$averageTemperature = $rowCount > 0 ? $totalTemperature / $rowCount : 0;
$averageHumidity = $rowCount > 0 ? $totalHumidity / $rowCount : 0;
$averageAirPressure = $rowCount > 0 ? $totalAirPressure / $rowCount : 0;

// JSON encode the averages for JavaScript usage
$averages = json_encode(['Temperature' => $averageTemperature, 'Humidity' => $averageHumidity, 'AirPressure' => $averageAirPressure]);
?>