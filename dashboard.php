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

$uname = $_SESSION['user_name'];

$sql = "SELECT u.Name, u.Email, u.Phone, ac.Car_Model, ac.Car_Type, ac.Registration_Number
FROM users u
JOIN addcar ac ON u.Email = ac.Email";;
$result = $mysqli->query($sql);
$index = 0;

$sql2 = "SELECT * FROM sensor";
$result2 = $mysqli->query($sql2);
$index2 = 0;

$sql3 = "SELECT * FROM adddriver";
$result3 = $mysqli->query($sql3);
$index3 = 0;

$sql4 = "SELECT * FROM users";
$result4 = $mysqli->query($sql3);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: white; color: black;">
<!-- Home Page Starts Here -->

    <!-- NavBAr Section Starts here -->
    <nav>

        <div class="logo">
        <a href="index.html">
          <img src="image/logo.png" alt="Girl in a jacket" width="250" >
        </a>  
        </div>

        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>

        <ul class="flex items-center">
          <li><a  href="index.html">Home</a></li>  
        </ul>

      </nav>
<div class="container">
  <div class="left-column">
          <h1 class="welcomeText"><b>Welcome to the Admin Dashboard</b></h1>
     
          <div class="dashboard-header">
                    <div class="info-box">
                        <div class="icon">&#128100;</div>
                        <div class="info">Total Registered Users: <span id="totalUsers"><?php echo $result4->num_rows; ?></span></div>
                    </div><br>
                    <div class="info-box">
                        <div class="icon">&#128663;</div>
                        <div class="info">Total Registered Cars: <span id="totalCars"><?php echo $result->num_rows; ?></span></div>
                    </div><br>
                    <div class="info-box">
                      <div class="icon">&#128100;</div>
                      <div class="info">Total Registered Drivers: <span id="totalUsers"><?php echo $result3->num_rows; ?></span></div>
                  </div><br>
                  <a href="#userinfo" class="custom-button2">User Information</a><br>
                  <a href="#cardetails" class="custom-button2">Car Details</a><br>
                  <a href="#driverinfo" class="custom-button2">Driver Information</a><br>
                  <a href="signup.html"><button type="" name="" class="buttonCustom3">Add User</button></a><br>
                  <form action="logout.php" method="POST">
                    <button type="submit" name="logout" class="button-custom">Logout</button>
                  </form>
          </div>

  </div>
  <div class="right-column">
  <div class="welcome-message2">
      <p id="userinfo"><b>User Information</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search..." style="background-color: white;">
    </div>

    <table id="data-table">
      <thead>
      <tr>
      <th>Sl</th>
      <th>User Name</th>
      <th>User Email</th>
      <th>Phone</th>
      <th>Car Model</th>
      <th>Car Type</th>
      <th>Registration Number</th>
      <th>Action</th>
    </tr>
      </thead>
      <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){  
                    $index++;
                    ?>
      <tbody>
        <tr>
          <td><?php echo $index; ?></td>
          <td><?php echo $row['Name'] ?></td>
          <td><?php echo $row['Email'] ?></td>
          <td><?php echo $row['Phone'] ?></td>
          <td><?php echo $row['Car_Model'] ?></td>
          <td><?php echo $row['Car_Type'] ?></td>
          <td><?php echo $row['Registration_Number'] ?></td>
          <td>
          <form action="process_removeUser.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <!-- Hidden input field to store unique identifier -->
                       
                    <!-- Submit button to delete the record -->
                    <button type="submit" class="removeButton">Remove</button>
          </form>
          </td>
          
        </tr>
      </tbody>
    <?php } ?>
    </table>

    <!-- Car Details -->
    <div class="welcome-message2">
      <p id="cardetails"><b>Car Details</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search..." style="background-color: white;">
    </div>

    <table id="data-table">
      <thead>
      <tr>
      <th>Sl</th>
      <th>Time & Date</th>
      <th>Registration Number</th>
      <th>Temparature</th>
      <th>Humidity</th>
      <th>Air Pressure</th>
      <th>Longtitude</th>
      <th>Latitude</th>
    </tr>
      </thead>
      <?php while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){  
                    $index2++;
                    ?>
      <tbody>
        <tr>
          <td><?php echo $index2; ?></td>
          <td><?php echo $row2['Date_Time'] ?></td>
          <td><?php echo $row2['registrationNumber'] ?></td>
          <td><?php echo $row2['temperature'] ?></td>
          <td><?php echo $row2['humidity'] ?></td>
          <td><?php echo $row2['air_pressure'] ?></td>
          <td><?php echo $row2['longitude'] ?></td>
          <td><?php echo $row2['latitude'] ?></td>
          
        </tr>
      </tbody>
    <?php } ?>
    </table>

    <!-- Driver Details -->
    <div class="welcome-message2">
      <p id="driverinfo"><b>Driver's Information</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search..."style="background-color: white;">
    </div>

    <table id="data-table">
      <thead>
      <tr>
      <th>Sl</th>
      <th>Email</th>
      <th>Driver Name</th>
      <th>Phone Number</th>
      <th>License Number</th>
      <th>License Expire Date</th>
      
    </tr>
      </thead>
      <?php while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){  
                    $index3++;
                    ?>
      <tbody>
        <tr>
          <td><?php echo $index3; ?></td>
          <td><?php echo $row3['Email'] ?></td>
          <td><?php echo $row3['Driver_Name'] ?></td>
          <td><?php echo $row3['Driver_Number'] ?></td>
          <td><?php echo $row3['License_Number'] ?></td>
          <td><?php echo $row3['License_Expired'] ?></td>     
        </tr>
      </tbody>
    <?php } ?>
    </table>

  </div>



</div>
 
<script >
       

const totalUsers = document.getElementById('totalUsers');
const totalCars = document.getElementById('totalCars');
const searchInput = document.getElementById('search');
const dataTable = document.getElementById('data-table');

// Function to populate the table


// Event listener for search input
searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase();
    const filteredData = usersData.filter(user => {
        return user.userName.toLowerCase().includes(searchTerm) ||
               user.phone.includes(searchTerm) ||
               user.carModel.toLowerCase().includes(searchTerm) ||
               user.carType.toLowerCase().includes(searchTerm) ||
               user.registrationNumber.toLowerCase().includes(searchTerm);
    });
    renderTable(filteredData);
});

// Update total users and total cars count
totalUsers.textContent = usersData.length;
totalCars.textContent = usersData.length;
    </script>
</body>
</html>