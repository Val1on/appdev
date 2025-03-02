<?php

include 'database.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $plate_no = mysqli_real_escape_string($con, $_POST['plate_no']);
    $color = mysqli_real_escape_string($con, $_POST['color']);
    $seats = (int) $_POST['seats'];


    $target_dir = "uploads/";
    $image_name = basename($_FILES["vehicle_image"]["name"]);
    $target_file = $target_dir . time() . "_" . $image_name; 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($imageFileType, $allowed_types)) {
        die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
    }

    if (move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], $target_file)) {

        $sql = "INSERT INTO vehicles (model, plate_no, color, seats, image_path) VALUES ('$model', '$plate_no', '$color', $seats, '$target_file')";

        if (mysqli_query($con, $sql)) {
            echo "Vehicle added successfully!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error uploading image.";
    }
}

mysqli_close($con);
?>
