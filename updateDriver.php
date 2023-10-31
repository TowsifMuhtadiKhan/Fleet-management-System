<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['lnum'])) {
    $lic_num = $_POST['lnum'];
    $sql = "SELECT * FROM adddriver WHERE `License_Number` = '$lic_num'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if(isset($_POST['licnum'])){
    $dname = $_POST['dname'];
    $dcontact = $_POST['dcontact'];
    $lnum = $_POST['licnum'];
    $licexp = $_POST['lexdate'];

    $sql2 = "UPDATE `adddriver` SET `Driver_Name`='$dname',`Driver_Number`='$dcontact',`License_Expired`='$licexp' WHERE `License_Number`='$lnum'";
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
        
        <h2>Update Your Driver's info into <br><span class="colored-text">Fleet</span> Management</h2>
        <form id="signupForm" action="updateDriver.php" method="post">
            <div class="input-group">
                <label for="dname">Driver Name</label>
                <input type="text" id="dname" name="dname" value="<?php echo $row['Driver_Name']; ?>" required>
            </div>
            <div class="input-group">
                <label for="dcontact">Driver Number</label>
                <input type="text" id="dcontact" name="dcontact" value="<?php echo $row['Driver_Number']; ?>" required>
            </div>
            <div class="input-group">
                <label for="lnum">License Number</label>
                <input type="text" id="licnum" name="licnum" value="<?php echo $row['License_Number']; ?>" required readonly>
            </div>
            <div class="input-group">
                <label for="lexdate">License Expired</label>
                <input type="text" id="lexdate" name="lexdate" value="<?php echo $row['License_Expired']; ?>" required>
            </div>
          
            <button type="submit">Update Driver Info</button>
        </form>       
        </div>     
</body>
</html>

