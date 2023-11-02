<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['reg_num'])) {
    $reg_num = $_POST['reg_num'];
    $sql = "SELECT * FROM sensor WHERE `registrationNumber` = '$reg_num'";
    $result = $mysqli->query($sql);
    $index2 = 0;
    // You can use $reg_num as needed here
  } else {
    echo "Registration Number not received.";
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

    <style>
        .container {
            
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0 auto;
          
        }

        .table-container {
            margin-top: 100px;
            width: 80%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #edf2f7;
        }

        tr:nth-child(even) {
            background-color: #f7fafc;
        }
    </style>
</head>
<body class="bg-gray-100" style="color: black;">
    <div class="container">
        <div class="table-container p-6 bg-white rounded-lg shadow-lg">
            <h3 class="font-bold text-lg mb-4">Sensor Data</h3>
            
            <table class="w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th class="border p-2">Sl no</th>
                        <th class="border p-2">Time & Date</th>
                        <th class="border p-2">Temperature</th>
                        <th class="border p-2">Humidity</th>
                        <th class="border p-2">Air Pressure</th>
                    </tr>
                </thead>
                <!-- Filter Option -->
                <form method="post" class="mb-4">
                    <label for="start-date" class="mr-2">Start Date:</label>
                    <input type="date" id="start-date" name="start_date" class="border p-2 mr-4  filter invert">

                    <label for="end-date" class="mr-2">End Date:</label>
                    <input type="date" id="end-date" name="end_date" class="border p-2 mr-4  filter invert">

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Filter</button>
                </form>
                <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
                    $index2++;
                    ?>
                <tbody>
                    
                    <tr class="border">
                        <td class="border p-2"><?php echo $index2?></td>
                        <td class="border p-2"><?php echo $row['Date_Time']; ?></td>
                        <td class="border p-2"><?php echo $row['temperature']; ?></td>
                        <td class="border p-2"><?php echo $row['humidity']; ?></td>
                        <td class="border p-2"><?php echo $row['air_pressure']; ?></td>
                    </tr> 
                    
                </tbody>
                <?php } ?>
            </table>
            <div class="mt-4">
                <a href="userprofile.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Back</a>
            </div>
        </div>
    </div>

    </body>
</html>