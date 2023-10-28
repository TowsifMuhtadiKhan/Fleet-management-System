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
        
        <h2>Add Your Car into <br><span class="colored-text">Fleet</span> Management</h2>
        <form id="signupForm" action="process_addcar.php" method="post">
            <div class="input-group">
                <label for="name">Car Type</label>
                <select id="carType" name="carType" required>
                    <option value="JEEP">JEEP</option>
                    <option value="SUV">SUV</option>
                    <option value="SEDAN">SEDAN</option>
                    <option value="MINI TRUCK">MINI TRUCK</option>
                    <option value="TRUCK">TRUCK</option>
                    <option value="BUS">BUS</option>
                    <option value="COVER VAN">COVER VAN</option>
                </select>
            </div>

         
            <div class="input-group">
                <label for="phone">Car Name</label>
                <select id="carName" name="carName" required>
                    <option value="TOYOTA">TOYOTA</option>
                    <option value="NISSAN">NISSAN</option>
                    <option value="SUZUKI">SUZUKI</option>
                    <option value="MITSUBISHI">MITSUBISHI</option>
                    <option value="BMW">BMW</option>
                    <option value="AUDI">AUDI</option>
                    <option value="HYUNDAI">HYUNDAI</option>
                    <option value="JEEP">JEEP</option>
                    <option value="TATA">TATA</option>
                    <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                    <option value="LEXUS">LEXUS</option>
                </select>

                
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
