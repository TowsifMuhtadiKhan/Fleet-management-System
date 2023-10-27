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
    $sql = "SELECT * FROM gps_data WHERE `Registration_Number` = '$reg_num'";
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
            height: 100vh;
            margin: 0 auto;
        }

        .table-container {
            width: 80%;
            width: 80%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="container">
        <div class="table-container p-6 bg-white rounded-lg shadow-lg">
            <h3 class="font-bold text-lg mb-4">GPS Data</h3>
            <table class="w-full">
    <!-- head -->
    <thead>
      <tr>
        <th class="border p-2">Sl no</th>
        <th class="border p-2">Time & Date</th>
        <th class="border p-2">Longitude</th>
        <th class="border p-2">Latitude</th>
        
      </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $index2++;
        ?>
    <tbody>
      <!-- row 1 -->
      <tr class="border">
        <td class="border p-2"><?php echo $index2?></td>
        <td class="border p-2"><?php echo $row['Time_Data']; ?></td>
        <td class="border p-2"><?php echo $row['Longitude']; ?></td>
        <td class="border p-2"><?php echo $row['Latitude']; ?></td>
      </tr>
      <!-- row 2 -->
      
    </tbody>
    <?php } ?>
  </table>
  <div class="mt-4">
                <a href="userprofile.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Back</a>
            </div>
</div>

        <!-- if there is a button in form, it will close the modal -->
        
      </form>
    </div>
  </div>
</body>
</html>