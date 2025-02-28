<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addCarOwner($con);
}

function addCarOwner($con) {
    if (!isset($_POST["firstName"], $_POST["lastName"], $_POST["mi"], $_POST["contact"], $_POST["email"], $_POST["carId"])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    $firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
    $mi = mysqli_real_escape_string($con, $_POST["mi"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $carID = mysqli_real_escape_string($con, $_POST["carId"]);

    $sql = "INSERT INTO carowner (firstName, lastName, middleInitial, contactNO, email, carID) 
            VALUES ('$firstName', '$lastName', '$mi', '$contact', '$email', '$carID')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Car owner added successfully!');
                window.location.href = 'car_owners.php';
              </script>";
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
}
?>