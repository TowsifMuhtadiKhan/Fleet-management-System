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
        <img src="image/logo.png" alt="Girl in a jacket"  >
    </div>
    
    <div class="login-container">
        
        <h2>Add Your Car into <br><span class="colored-text">Fleet</span> Management</h2>
        <form id="signupForm" action="process_addcar.php" method="post">
            <div class="input-group">
                <label for="name">Car Type</label>
                <input type="text" id="name" name="carType" required>
            </div>
            <div class="input-group">
                <label for="phone">Car Name</label>
                <input type="text" id="phone" name="carName" required>
            </div>
            <div class="input-group">
                <label for="email">Car Model</label>
                <input type="text" id="email" name="carModel" required>
            </div>
            <div class="input-group">
                <label for="username">Registration Number</label>
                <input type="text" id="username" name="registrationNumber" required>
            </div>

            <div class="input-group">
                <label for="password">Chassis Number</label>
                <input type="text" id="password" name="chassisNumber" required>
            </div>

            <div class="input-group">
                <label for="password">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $uemail; ?>" readonly>
            </div>

            <button type="submit">Add Car</button>
        </form>
        
        </div>

       
</body>

</html>
