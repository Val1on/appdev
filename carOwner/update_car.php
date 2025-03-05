<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "carpoolv2");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


function uploadVehicleImage($file) {
    $targetDir = "uploads/vehicles/"; 
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . time() . "_" . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

   
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        return false;
    }


    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $targetFilePath;
    }

    return false;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $model = mysqli_real_escape_string($conn, $_POST["model"]);
    $plate_no = mysqli_real_escape_string($conn, $_POST["plate_no"]);
    $color = mysqli_real_escape_string($conn, $_POST["color"]);
    $seats = (int)$_POST["seats"];
    $vehicle_id = isset($_POST["vehicle_id"]) ? (int)$_POST["vehicle_id"] : null; 

    $imagePath = null;
    if (!empty($_FILES["vehicle_image"]["name"])) {
        $imagePath = uploadVehicleImage($_FILES["vehicle_image"]);
        if (!$imagePath) {
            die("Error: Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }
    }

    if ($vehicle_id) {

        if ($imagePath) {
            $sql = "UPDATE carowner SET model='$model', plate_no='$plate_no', color='$color', seats='$seats', vehicle_image='$imagePath' WHERE id='$vehicle_id'";
        } else {
            $sql = "UPDATE carowner SET model='$model', plate_no='$plate_no', color='$color', seats='$seats' WHERE id='$vehicle_id'";
        }
    } else {
    
        $sql = "INSERT INTO carowner (model, plate_no, color, seats, vehicle_image) VALUES ('$model', '$plate_no', '$color', '$seats', '$imagePath')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Vehicle information successfully saved.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
