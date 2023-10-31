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
    <title>Document</title>
</head>
<body>
<form action="updateCar.php" method="POST">
     
     <label for="ctype">Car Type</label>
     <input type="text" name="ctype" id="ctype" value="<?php echo $row['Car_Type']; ?>">
     <br><br>
     <label for="cname">Car Name</label>
     <input type="text" name="cname" id="cname" value="<?php echo $row['Car_Name']; ?>">
     <br><br>
     <label for="cmodel">Car Model</label>
     <input type="text" name="cmodel" id="cmodel" value="<?php echo $row['Car_Model']; ?>" readonly>
     <br><br>
     <label for="regs_num">Registration Number</label>
     <input type="text" name="regs_num" id="regs_num" value="<?php echo $row['Registration_Number']; ?>" readonly>
     <label for="csnum">Chassis Number</label>
     <input type="text" name="csnum" id="csnum" value="<?php echo $row['Chassis_Number']; ?>">

     <br><br>
     
     <button type="submit" class="btn">Update</button>
   </form>
</body>
</html>