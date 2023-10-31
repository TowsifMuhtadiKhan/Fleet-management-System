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
    <title>Document</title>
</head>
<body>
<form action="updateDriver.php" method="POST">
     
        <label for="dmname">Driver Name</label>
        <input type="text" name="dname" id="dname" value="<?php echo $row['Driver_Name']; ?>">
        <br><br>
        <label for="dcontact">Driver's Contact No.</label>
        <input type="text" name="dcontact" id="dcontact" value="<?php echo $row['Driver_Number']; ?>">
        <br><br>
        <label for="lnum">License Number</label>
        <input type="text" name="licnum" id="lnum" value="<?php echo $row['License_Number']; ?>" readonly>
        <br><br>
        <label for="lexdate">License Expired Date</label>
        <input type="text" name="lexdate" id="lexdate" value="<?php echo $row['License_Expired']; ?>">
        <br><br>
        
        <button type="submit" class="btn">Update</button>
      </form>
</body>
</html>