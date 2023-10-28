<?php

if (isset($_POST['uemail'])) {
    $uemail = $_POST['uemail'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_car.css">
    <title>Add_Car</title>
</head>

<body>
    <div class="logo">
        <a href="index.html">
        <img src="image/logo.png" alt="Girl in a jacket"  >
        </a>
    </div>
    
    <div class="login-container">
        
        <h2>Add Your Driver's info into <br><span class="colored-text">Fleet</span> Management</h2>
        <form id="signupForm" action="process_adddriver.php" method="post">
            <div class="input-group">
                <label for="name">Driver Name</label>
                <input type="text" id="name" name="driverName" required>
            </div>
            <div class="input-group">
                <label for="phone">Driver Number</label>
                <input type="text" id="phone" name="driverNumber" required>
            </div>
            <div class="input-group">
                <label for="email">License Number</label>
                <input type="text" id="email" name="licenseNumber" required>
            </div>
            <div class="input-group">
                <label for="username">License Expired</label>
                <input type="text" id="username" name="licenseExpired" required>
            </div>


            <div class="input-group">
                <label for="password">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $uemail; ?>" readonly>
            </div>

            <button type="submit">Add Driver</button>
        </form>
        
        </div>

       
</body>

</html>
