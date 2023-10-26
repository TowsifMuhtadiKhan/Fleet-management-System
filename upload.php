<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fms_db";


$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['upload'])) {
    $email = $_POST["uemail"];
    echo $email;
    // File upload handling
    $target_dir = "uploads/"; // Create a directory for storing uploaded images
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the image file is a real image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        // Allow only specific image file formats (you can customize this)
        if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Insert the file path into the database
                $image_path = $target_file;
                $sql = "UPDATE users SET `Image` = '$image_path' WHERE `Email` = '$email'";
                if ($mysqli->query($sql) === TRUE) {
                    
                    header("Location: userprofile.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

$mysqli->close();

?>