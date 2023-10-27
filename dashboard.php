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

        <ul class="flex items-center">
          <li><a class="active" href="#">Home</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#features">Feature</a></li>
          <li><a href="#contactus">Contact</a></li>
          <form action="logout.php" method="POST">
            <button type="submit" name="logout" class="btn btn-error custom-btn">Logout</button>
          </form>
        </ul>

      </nav>
      
        
      
        <!-- Rest of your content here -->
        <div class="welcome-message text-3xl font-bold">
          <h1>Welcome to the Admin Dashboard Panel</h1>
      </div>
      <br>
      <br>
      <!-- NavBAr Section Ends here -->
      <div class="dashboard-header">
        <div class="info-box">
            <div class="icon">&#128100;</div>
            <div class="info">Total Registered Users: <span id="totalUsers"><?php echo $result4->num_rows; ?></span></div>
        </div>
        <div class="info-box">
            <div class="icon">&#128663;</div>
            <div class="info">Total Registered Cars: <span id="totalCars"><?php echo $result->num_rows; ?></span></div>
        </div>
        <div class="info-box">
          <div class="icon">&#128100;</div>
          <div class="info">Total Registered Drivers: <span id="totalUsers"><?php echo $result3->num_rows; ?></span></div>
      </div>
    </div>

    <div class="welcome-message2">
      <p><b>User Information</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search...">
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
          
        </tr>
      </tbody>
    <?php } ?>
    </table>

    <!-- Car Details -->
    <div class="welcome-message2">
      <p><b>Car Details</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search...">
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
      <p><b>Driver's Information</b></p>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search...">
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