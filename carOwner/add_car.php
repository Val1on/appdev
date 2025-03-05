<?php

require 'database.php';

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carModel = $_POST["carModel"];
    $carManufacturer = $_POST["carManufacturer"];
    $carStatus = $_POST["carStatus"];
    $plateNum = $_POST["plateNum"];
    $color = $_POST["color"];
    $number_of_seats = intval($_POST["number_of_seats"]);
    $carOwnerID = intval($_POST["carOwnerID"]);

   
    $stmt = $con->prepare("SELECT ownerNO FROM carowner WHERE ownerNO = ?");
    $stmt->bind_param("i", $carOwnerID);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        $response["message"] = "Error: carOwnerID ($carOwnerID) does not exist in carowner table.";
        echo json_encode($response);
        exit;
    }

    $stmt->close();

 
    if (isset($_FILES["carImage"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["carImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

      
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($fileType, $allowedTypes)) {
            $response["message"] = "Only JPG, JPEG, and PNG files are allowed.";
            echo json_encode($response);
            exit;
        }

      
        if (move_uploaded_file($_FILES["carImage"]["tmp_name"], $targetFilePath)) {
        
            $stmt = $con->prepare("INSERT INTO cars (carModel, carManufacturer, carImage, carStatus, plateNum, color, number_of_seats, carOwnerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                $response["message"] = "Database prepare error: " . $con->error;
                echo json_encode($response);
                exit;
            }

            $stmt->bind_param("ssssssii", $carModel, $carManufacturer, $targetFilePath, $carStatus, $plateNum, $color, $number_of_seats, $carOwnerID);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Car registered successfully!";
            } else {
                $response["message"] = "Database execution error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $response["message"] = "File upload failed.";
        }
    } else {
        $response["message"] = "Please upload an image.";
    }
}

echo json_encode($response);

?>
