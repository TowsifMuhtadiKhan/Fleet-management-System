<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";
$conn = new mysqli($servername, $username, $password, $database);
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
                <tbody id="car-table-body">
                    <!-- Table rows will be dynamically populated here -->
                </tbody>
            </table>
            <button id="add-car-button">Add Car</button>
        </div>
    </div>

    

    <div id="add-car-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="close-modal-button">&times;</span>
            <form id="add-car-form" action="process_addcar.php" method="post">
                <label for="car-type">Car Type:</label>
                <input type="text" id="car-type" name="carType" required><br>

                <label for="car-name">Car Name:</label>
                <input type="text" id="car-name" name="carName" required><br>

                <label for="car-model">Car Model:</label>
                <input type="text" id="car-model" name="carModel" required><br>

                <label for="registration-number">Registration Number:</label>
                <input type="text" id="registration-number" name="registrationNumber" required><br>

                <label for="chassis-number">Chassis Number:</label>
                <input type="text" id="chassis-number" name="chassisNumber" required><br>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

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


const carTableBody = document.getElementById('car-table-body');
const addCarButton = document.getElementById('add-car-button');
const addCarModal = document.getElementById('add-car-modal');
const addCarForm = document.getElementById('add-car-form');

let carData = [];

// Function to render car table
function renderCarTable() {
    carTableBody.innerHTML = '';
    carData.forEach((car, index) => {
        const row = `<tr>
                        <td>${index + 1}</td>
                        <td>${car.carType}</td>
                        <td>${car.carName}</td>
                        <td>${car.carModel}</td>
                        <td>${car.registrationNumber}</td>
                        <td>${car.chassisNumber}</td>
                        <td class="action-buttons">
                            <button class="sensor-button">Sensor</button>
                            <button class="gps-button">GPS</button>
                            <button class="scanner-button">Scanner</button>
                        </td>
                    </tr>`;
        carTableBody.innerHTML += row;
    });

    // Show action buttons if there is data in the table
    const actionButtons = document.querySelectorAll('.action-buttons');
    actionButtons.forEach(buttonGroup => {
        buttonGroup.style.display = 'flex';
    });
}

// Function to show add car modal
function showAddCarModal() {
    addCarModal.style.display = 'flex';
}

// Function to hide add car modal
function hideAddCarModal() {
    addCarModal.style.display = 'none';
    addCarForm.reset();
}

// Event listener for Add Car button
addCarButton.addEventListener('click', showAddCarModal);

// Event listener for Close button in the Add Car modal
document.getElementById('close-modal-button').addEventListener('click', hideAddCarModal);

// Event listener for Save button in the Add Car modal
addCarForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(addCarForm);
    const carObject = {};
    formData.forEach((value, key) => {
        carObject[key] = value;
    });
    carData.push(carObject);
    hideAddCarModal();
    renderCarTable();
});


    </script>
</body>
</html>