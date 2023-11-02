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
  include 'chart_generator.php'; 
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
            margin-top: 50px;
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
            background-color: rgb(4, 182, 84);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f7fafc;
        }
        .popup {   
          display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgb(4, 182, 84);
            border: 5px solid white; /* White border around the map */
            z-index: 9999;
    }
        

        .popup-content {
            position: relative;
            padding: 20px;
        }
        .close{
          position: absolute;
          top: 10px;
          right: 10px;
          cursor: pointer;
          font-size: 24px;
          color: #555;
      }
    </style>
</head>
<body class="bg-gray-100" style="color: black;">
<div class="container">
        <div class="table-container p-6 bg-white rounded-lg shadow-lg">
        <h3 class="font-bold text-lg mb-4" style="background-color:rgb(4, 182, 84); padding: 5px; color: white; text-align:center">GPS Data</h3>
           
            <table class="w-full">
    <!-- head -->
    <thead>
      <tr>
        <th class="border p-2">Sl no</th>
        <th class="border p-2">Time & Date</th>
        <th class="border p-2">Longitude</th>
        <th class="border p-2">Latitude</th>
        <th class="border p-2">View</th>
        
      </tr>
    </thead>
    <!-- Filter Option -->
    <form method="post" class="mb-10"> 
                    <label for="start-date" class="mr-2" style="color:rgb(4, 182, 84)">Start Date:</label>
                    <input type="date" id="start-date" name="start_date" class="border p-2 mr-4  bg-green-500">

                    <label for="end-date" class="mr-2 " style="color:rgb(4, 182, 84)">End Date:</label>
                    <input type="date" id="end-date" name="end_date" class="border p-2 mr-4  bg-green-500">

                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Filter</button>
                </form><br><br>
        <?php 
        $iframeUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41302.52822922945!2d90.38577628734889!3d23.795039604406824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1698933139133!5m2!1sen!2sbd";
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
              $index2++;
        ?>
        <tbody>
            <!-- row 1 -->
            <tr class="border">
                <td class="border p-2"><?php echo $index2?></td>
                <td class="border p-2"><?php echo $row['Date_Time']; ?></td>
                <td class="border p-2"><?php echo $row['longitude']; ?></td>
                <td class="border p-2"><?php echo $row['latitude']; ?></td>
                <td class="border p-2">
                    <button class="btn-map" onclick="openPopup('<?php echo $index2; ?>')">
                        View Location
                    </button>
                </td>
            </tr>
            <!-- Popup for this row -->
            <div id="popup_<?php echo $index2; ?>" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup('<?php echo $index2; ?>')">&times;</span>
                    <iframe src="<?php echo $iframeUrl; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </tbody>
        <?php } ?>
            </table>
   
        <div class="mt-4">
                <a href="userprofile.php" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Back</a>
            </div>
        </div>
</div> 
    
    
    <script>
        function openPopup(index) {
            var popup = document.getElementById('popup_' + index);
            popup.style.display = 'block';
        }
    
        function closePopup(index) {
            var popup = document.getElementById('popup_' + index);
            popup.style.display = 'none';
        }
    </script>

</body>
</html>