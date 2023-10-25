<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";


$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the 'addcar' table
$sql = "SELECT * FROM addcar";
$result = $mysqli->query($sql);
$index = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Populate the form fields with the retrieved data
    $carType = $row['Car_Type'];
    $carName = $row['Car_Name'];
    $carModel = $row['Car_Model'];
    $registrationNumber = $row['Registration_Number'];
    $chassisNumber = $row['Chassis_Number'];
}

$sql2 = "SELECT * FROM sensor_data";
$result2 = $mysqli->query($sql2);
$index2 = 0;

$sql3 = "SELECT * FROM gps_data";
$result3 = $mysqli->query($sql3);
$index3 = 0;
// if($result2->num_rows > 0){
//     $row2 = $result2->fetch_assoc();
// }

$mysqli->close();
?>
<body>
<!-- Home Page Starts Here -->

    <!-- NavBAr Section Starts here -->
    <nav>

        <div class="logo">
          <img src="image/logo.png" alt="Girl in a jacket" width="250" >
        </div>

        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>

        <ul>
          <li><a class="active" href="#">Home</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#features">Feature</a></li>
          <li><a href="#contactus">Contact</a></li>
          <li><a href="login.html">Login</a></li>
        </ul>

      </nav>
      <!-- NavBAr Section Ends here -->
      <div class="dashboard-container">
        <div class="profile-card">
            <label for="image-upload" class="image-upload-label">
                
                <input type="file" id="image-upload" accept="image/*">
                
                
                <span>Upload Image</span>
            </label>
            <div class="profile-picture" id="profile-picture"></div>
            <h2 id="user-name">User Name</h2>
            <p id="phone">Phone Number</p>
            <p id="email">Email Address</p>
            <p id="num-of-cars">Number of Cars</p>
            
        </div>
        <div class="content">
            <h2>Car Information</h2>
            <table id="car-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Car Type</th>
                        <th>Car Name</th>
                        <th>Car Model</th>
                        <th>Registration Number</th>
                        <th>Chassis Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){  
                    $index++;
                    ?>
                <tbody id="car-table-body">
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $row['Car_Type']; ?></td>
                        <td><?php echo $row['Car_Name']; ?></td>
                        <td><?php echo $row['Car_Name']; ?></td>
                        <td><?php echo $row['Registration_Number']; ?></td>
                        <td><?php echo $row['Chassis_Number']; ?></td>
                        <td class="action-buttons flex">
                            <button class="sensor-button" onclick="my_modal_1.showModal()">Sensor</button>
                            <button class="gps-button" onclick="my_modal_2.showModal()">GPS</button>
                            <button class="scanner-button">Scanner</button>
                            <button class="scanner-button">Drowsiness</button>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <a href="add_car.html"><button class="btn btn-primary">Add Car</button></a>
        </div>
    </div>
    
    <dialog id="my_modal_1" class="modal modal-bottom sm:modal-middle">
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
    <?php while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){ 
        $index2++;
        ?>
    <tbody>
      <!-- row 1 -->
      <tr class="bg-base-200">
        <td><?php echo $index2?></td>
        <td><?php echo $row2['Time_Date']; ?></td>
        <td><?php echo $row2['Temperature']; ?></td>
        <td><?php echo $row2['Humidity']; ?></td>
        <td><?php echo $row2['Air_Pressure']; ?></td>
      </tr>
      <!-- row 2 -->
      
    </tbody>
    <?php } ?>
  </table>
</div>
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>
    
<dialog id="my_modal_2" class="modal modal-bottom sm:modal-middle">
  <div class="modal-box w-full">
    <h3 class="font-bold text-lg">GPS Data</h3>
    
    <div class="modal-action">
      <form method="dialog">
      <div class="">
  <table>
    <!-- head -->
    <thead>
      <tr>
        <th>Sl no</th>
        <th>Time & Date</th>
        <th>Longitude</th>
        <th>Latitude</th>
        
      </tr>
    </thead>
    <?php while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){ 
        $index3++;
        ?>
    <tbody>
      <!-- row 1 -->
      <tr class="bg-base-200">
        <td><?php echo $index3?></td>
        <td><?php echo $row3['Time_Data']; ?></td>
        <td><?php echo $row3['Longitude']; ?></td>
        <td><?php echo $row3['Latitude']; ?></td>
      </tr>
      <!-- row 2 -->
      
    </tbody>
    <?php } ?>
  </table>
</div>
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>
    <script >
        const imageUpload = document.getElementById('image-upload');
const profilePicture = document.getElementById('profile-picture');
const userName = document.getElementById('user-name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const numOfCars = document.getElementById('num-of-cars');


// Function to handle image upload
imageUpload.addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        profilePicture.style.backgroundImage = `url('${e.target.result}')`;
    };

    reader.readAsDataURL(file);
});

const username = <?php echo isset($_SESSION['user_name']) ? json_encode($_SESSION['user_name']) : 'null'; ?>;
    const userPhone = <?php echo isset($_SESSION['user_phone']) ? json_encode($_SESSION['user_phone']) : 'null'; ?>;
    const userEmail = <?php echo isset($_SESSION['user_email']) ? json_encode($_SESSION['user_email']) : 'null'; ?>;

    // Display user details
    document.addEventListener('DOMContentLoaded', function() {
        // Check if user details are not null before displaying
        if (username !== null) {
            userName.textContent = username;
        }
        if (userPhone !== null) {
            phone.textContent = userPhone;
        }
        if (userEmail !== null) {
            email.textContent = userEmail;
        }
    });


numOfCars.textContent = 'Number of Cars: 3';







    </script>
</body>
</html>