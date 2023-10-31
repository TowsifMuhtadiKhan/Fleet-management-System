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
    $sql = "SELECT * FROM addcar WHERE `Registration_Number` = '$reg_num'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if(isset($_POST['regs_num'])){
    $cname = $_POST['cname'];
    $ctype = $_POST['ctype'];
    $cmodel = $_POST['cmodel'];
    $csnum = $_POST['csnum'];
    $regs_num = $_POST['regs_num'];

    $sql2 = "UPDATE `addcar` SET `Car_Type`='$ctype',`Car_Name`='$cname',`Car_Model`='$cmodel',`Registration_Number`='$regs_num',`Chassis_Number`='$csnum' WHERE `Registration_Number` = '$regs_num'";
    $result2 = $mysqli->query($sql2);
    
    
    header('Location: userprofile.php');
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
        
        <h2>Update Your Car Info <br><span class="colored-text">Fleet</span> Management</h2>
        <form id="signupForm" action="updateCar.php" method="post">
            <div class="input-group">
            <label for="ctype">Car Type</label>
                <select id="ctype" name="ctype" required>
                    <option value="<?php echo $row['Car_Type']; ?>" selected><?php echo $row['Car_Type']; ?> </option>
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
                <label for="cname">Car Name</label>
                <select id="cname" name="cname" required>
                    <option value="<?php echo $row['Car_Name']; ?>" selected><?php echo $row['Car_Name']; ?></option>
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
                <label for="cmodel">Car Model</label>
                <input type="text" id="cmodel" name="cmodel" value="<?php echo $row['Car_Model']; ?>" required>
            </div>
            <div class="input-group">
                <label for="regs_num">Registration Number</label>
                <input type="text" id="regs_num" name="regs_num" value="<?php echo $row['Registration_Number']; ?>" required>
            </div>

            <div class="input-group">
                <label for="password">Chassis Number</label>
                <input type="text" id="csnum" name="csnum" value="<?php echo $row['Chassis_Number']; ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>       
        </div>      
</body>
</html>


