<?php
session_start(); 
include 'database.php';

/*
if (!isset($_SESSION['ownerID'])) {
    echo "<script>alert('You must be logged in to post a trip!'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $carownerNO = $_SESSION['ownerID'];
*/

$carownerNO = 1; // Temporary value until login system is implemented


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postMsg = $_POST['postMsg'] ?? '';
    $carownerNO = $_POST['carownerNO'] ?? '';
    $departure = $_POST['departure'] ?? '';
    $destinationID = $_POST['destinationID'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $carID = $_POST['carID'] ?? '';
    $available_seats = $_POST['available_seats'] ?? '';
    $price_per_seat = $_POST['price_per_seat'] ?? '';
    $trip_description = $_POST['trip_description'] ?? '';
    
    // Handling Image Upload
    $postIMG = '';
    if (!empty($_FILES['postIMG']['name'])) {
        $targetDir = "uploads/";
        $postIMG = basename($_FILES['postIMG']['name']);
        $targetFilePath = $targetDir . $postIMG;
        move_uploaded_file($_FILES['postIMG']['tmp_name'], $targetFilePath);
    }
    
/*
    if (empty($postMsg) || empty($carownerNO) || empty($departure) || empty($destinationID) || empty($date) || empty($time) || empty($carID) || empty($available_seats) || empty($price_per_seat) || empty($trip_description)) {
        die("All fields are required.");
    }*/

    $sql = "INSERT INTO post (postMsg, carownerNO, postIMG, departure, destinationID, date, time, carID, available_seats, price_per_seat, trip_description) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sisssssiids", $postMsg, $carownerNO, $postIMG, $departure, $destinationID, $date, $time, $carID, $available_seats, $price_per_seat, $trip_description);
        
        if ($stmt->execute()) {
            echo "Trip posted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
}
$con->close();
?>
