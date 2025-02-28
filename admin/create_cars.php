<?php
require 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $carModel = trim($_POST['carModel']);
    $manufacturer = trim($_POST['manufacturer']);
    $plateNumber = trim($_POST['plateNumber']);
    $carOwnerId = trim($_POST['carOwnerId']);


    if (empty($carModel) || empty($manufacturer) || empty($plateNumber) || empty($carOwnerId)) {
        die("All fields are required.");
    }


    $stmt = $con->prepare("INSERT INTO cars (carModel, carManufacturer, plateNum, carOwnerID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $carModel, $manufacturer, $plateNumber, $carOwnerId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Car added successfully!'); window.location.href='cars.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $con->close();
} else {
    echo "Invalid request.";
}
?>