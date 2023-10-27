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
    <style>
        .circular-frame {
            width: 150px;
            height: 150px;
            border-radius: 50%; /* Create a circular frame */
            overflow: hidden; /* Hide image overflow outside the circular frame */
        }
        
    </style>
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
$userEmail = $_SESSION['user_email'];
// Fetch data from the 'addcar' table
$sql = "SELECT * FROM addcar WHERE `Email` = '$userEmail'";
$result = $mysqli->query($sql);
$index = 0;

$sql2 = "SELECT * FROM sensor_data";
$result2 = $mysqli->query($sql2);
$index2 = 0;

$sql3 = "SELECT * FROM gps_data";
$result3 = $mysqli->query($sql3);
$index3 = 0;
// if($result2->num_rows > 0){
//     $row2 = $result2->fetch_assoc();
// }

$sql4 = "SELECT `Image` FROM users WHERE `email` = '$userEmail'";
$result4 = $mysqli->query($sql4);

if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $image_path = $row4['Image']; 
    
} else {
    echo "User not found or image not available.";
}

$reg_num = "";
if (isset($_POST['reg_num'])) {
  $reg_num = $_POST['reg_num'];
  
  // You can use $reg_num as needed here
  echo $reg_num;
} else {
  
}
$sql5 = "SELECT * FROM sensor_data WHERE `Registration_Number` = '$reg_num'";
$result5 = $mysqli->query($sql5);




$sql6 = "SELECT * FROM adddriver WHERE `Email` = '$userEmail'";
$result6 = $mysqli->query($sql6);
$index6 = 0;


$mysqli->close();
?>
<body style="background-color: white;">
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

        <h2 style="font-size: 30px; color:black"><b>Welcome to your Profile</b></h2><br>

            
                
            <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="image-upload" name="image" accept="image/*" required>
        <input type="hidden" name="uemail" value=<?php echo $userEmail; ?> >
        <button type="submit" name="upload">Upload</button>
    </form>

    <div class="profile-picture" id="profile-picture" style="background-image: url('<?php echo $image_path; ?>')"></div>   
    
            <h2 id="user-name">User Name</h2>
            <p id="phone">Phone Number</p>
            <p id="email">Email Address</p>
            <p id="num-of-cars">Number of Cars</p>

            <br>
            <form action="add_car.php" method="POST">
              <input type="hidden" name="uemail" value="<?php echo $userEmail; ?>">
            <button class="btn btn-primary" style="width: 80%; background-color: rgb(4, 182, 84); transition: background-color 0.3s ease;">Add Car</button>

            </form> <br>

            <form action="add_driver.php" method="POST">
              <input type="hidden" name="uemail" value="<?php echo $userEmail; ?>">
            <button class="btn btn-primary" style="width: 80%;">Add Driver</button>
            </form> <br>
            <form action="logout.php" method="POST">
            <button type="submit" name="logout" class="btn btn-error">Logout</button>
          </form>
            
        </div>
        <div class="content">
        <h2 style="background-color: rgb(4, 182, 84); padding: 10px;color: white;"><b>Car Information</b></h2><br>

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
                        <td><?php echo $row['Car_Model']; ?></td>
                        <td><?php echo $row['Registration_Number'];?></td>
                        <td><?php echo $row['Chassis_Number']; ?></td>
                        <td class="action-buttons flex">
                          <form action="process_sensorData.php" method="POST">
                            <input type="hidden" name="reg_num" value="<?php echo $row['Registration_Number']; ?>">
                          <button type="submit" class="sensor-button">Sensor</button>
                          </form>
                        <form action="process_gpsData.php" method="POST">
                        <input type="hidden" name="reg_num" value="<?php echo $row['Registration_Number']; ?>">
                        <button type="submit" class="gps-button">GPS</button>
                        </form>
                        
                        <button class="scanner-button">Scanner</button>
                        <button class="scanner-button">Drowsiness</button>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <!-- <form action="add_car.php" method="POST">
              <input type="hidden" name="uemail" value="<?php echo $userEmail; ?>">
            <button class="btn btn-primary" style="width: 80%;">Add Car</button>
            </form> -->
            <a href="add_car.html"></a>
            <h2 style="background-color: rgb(4, 182, 84); padding: 10px;color: white;"><b>Driver Information</b></h2>
                  <br>
            <table id="car-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Driver Name</th>
                        <th>Driver's Contact No.</th>
                        <th>License Number</th>
                        <th>License Expired Date</th>
                       
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_array($result6, MYSQLI_ASSOC)){  
                    $index6++;
                    ?>
                <tbody id="car-table-body">
                    <tr>
                        <td><?php echo $index6; ?></td>
                        <td><?php echo $row['Driver_Name']; ?></td>
                        <td><?php echo $row['Driver_Number']; ?></td>
                        <td><?php echo $row['License_Number']; ?></td>
                        <td><?php echo $row['License_Expired'];?></td>
                
                </tbody>
                <?php } ?>
            </table>

           

            

            
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
    <?php while($row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC)){ 
        $index2++;
        ?>
    <tbody>
      <!-- row 1 -->
      <tr class="bg-base-200">
        <td><?php echo $index2?></td>
        <td><?php echo $row5['Time_Date']; ?></td>
        <td><?php echo $row5['Temperature']; ?></td>
        <td><?php echo $row5['Humidity']; ?></td>
        <td><?php echo $row5['Air_Pressure']; ?></td>
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




// function sendRegistrationNumber(button) {
//         // Get the Registration_Number value from the data-regnum attribute
//         var registrationNumber = button.getAttribute('data-regnum');
//     alert('Registration Number: ' + registrationNumber);
//         // Send the value to a PHP script using AJAX
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'userprofile.php', true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === 4 && xhr.status === 200) {
//                 // Handle the response from the server, if needed
//                 console.log(xhr.responseText);
//             }
//         };
//         xhr.send(registrationNumber);
//         my_modal_1.showModal();
//     }

const imageUpload = document.getElementById('image-upload');
const profilePicture = document.getElementById('profile-picture');
const userName = document.getElementById('user-name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const numOfCars = document.getElementById('num-of-cars');


// Function to handle image upload
// imageUpload.addEventListener('change', function(event) {
//     const file = event.target.files[0];
//     const reader = new FileReader();

//     reader.onload = function (e) {
//         profilePicture.style.backgroundImage = url('./uploads/14.jpg');
//     };

//     reader.readAsDataURL(file);
// });

    const username = "User Name: "+<?php echo isset($_SESSION['user_name']) ? json_encode($_SESSION['user_name']) : 'null'; ?>;
    const userPhone = "Phone Number: "+<?php echo isset($_SESSION['user_phone']) ? json_encode($_SESSION['user_phone']) : 'null'; ?>;
    const userEmail = "Email Address: "+<?php echo isset($_SESSION['user_email']) ? json_encode($_SESSION['user_email']) : 'null'; ?>;

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


numOfCars.textContent = "Number of Cars:"+<?php echo $index; ?>;



    </script>
</body>
</html>