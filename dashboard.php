<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);
$index = 0;

$sql2 = "SELECT * FROM addcar";
$result2 = $mysqli->query($sql2);
$index2 = 0;

$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
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

        <ul>
          <li><a class="active" href="#">Home</a></li>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#features">Feature</a></li>
          <li><a href="#contactus">Contact</a></li>
          <li><a href="login.html">Login</a></li>
        </ul>

      </nav>
      <!-- NavBAr Section Ends here -->
      <div class="dashboard-header">
        <div class="info-box">
            <div class="icon">&#128100;</div>
            <div class="info">Total Registered Users: <span id="totalUsers">100</span></div>
        </div>
        <div class="info-box">
            <div class="icon">&#128663;</div>
            <div class="info">Total Registered Cars: <span id="totalCars">150</span></div>
        </div>
    </div>

    <div class="search-container">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search...">
    </div>

    <table id="data-table">
        <!-- Table rows will be dynamically populated here -->
    </table>

    <script >
        const usersData = [
    // Sample user data
    { sl: 1, userName: "John Doe", phone: "123-456-7890", carModel: "Car A", carType: "Sedan", registrationNumber: "ABC123", sensor1: true, sensor2: false, sensor3: true, gps: true },
    // Add more user data as needed
];

const totalUsers = document.getElementById('totalUsers');
const totalCars = document.getElementById('totalCars');
const searchInput = document.getElementById('search');
const dataTable = document.getElementById('data-table');

// Function to populate the table
function renderTable(data) {
    dataTable.innerHTML = '<tr><th>Sl</th><th>User Name</th><th>Phone</th><th>Car Model</th><th>Car Type</th><th>Registration Number</th><th>Sensor 1</th><th>Sensor 2</th><th>Sensor 3</th><th>GPS</th></tr>';

    data.forEach((user, index) => {
        const row = `<tr>
                        <td>${user.sl}</td>
                        <td>${user.userName}</td>
                        <td>${user.phone}</td>
                        <td>${user.carModel}</td>
                        <td>${user.carType}</td>
                        <td>${user.registrationNumber}</td>
                        <td>${user.sensor1 ? 'Yes' : 'No'}</td>
                        <td>${user.sensor2 ? 'Yes' : 'No'}</td>
                        <td>${user.sensor3 ? 'Yes' : 'No'}</td>
                        <td>${user.gps ? 'Yes' : 'No'}</td>
                    </tr>`;
        dataTable.innerHTML += row;
    });
}

// Initial rendering of the table
renderTable(usersData);

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