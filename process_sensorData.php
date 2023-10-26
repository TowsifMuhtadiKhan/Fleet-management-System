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
    $sql = "SELECT * FROM sensor_data WHERE `Registration_Number` = '$reg_num'";
    $result = $mysqli->query($sql);
    $index2 = 0;
    // You can use $reg_num as needed here
    echo $reg_num;
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
</head>
<body>
<div class="modal-box w-full">
    <h3 class="font-bold text-lg">Sensor Data</h3>
    
    <div class="modal-action">
      <form method="dialog">
      <div class="">
  <table>
    <!-- head -->
    <thead>
      <tr>
        <th>Sl no</th>
        <th>Time & Date</th>
        <th>Temperature</th>
        <th>Humidity</th>
        <th>Air_Pressure</th>
      </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $index2++;
        ?>
    <tbody>
      <!-- row 1 -->
      <tr class="bg-base-200">
        <td><?php echo $index2?></td>
        <td><?php echo $row['Time_Date']; ?></td>
        <td><?php echo $row['Temperature']; ?></td>
        <td><?php echo $row['Humidity']; ?></td>
        <td><?php echo $row['Air_Pressure']; ?></td>
      </tr>
      <!-- row 2 -->
      
    </tbody>
    <?php } ?>
  </table>
</div>
        <!-- if there is a button in form, it will close the modal -->
        <a href="userprofile.php">Back</a>
      </form>
    </div>
  </div>
</body>
</html>