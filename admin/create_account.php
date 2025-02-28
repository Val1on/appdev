<?php
require 'database.php';
createAccount($con);

function createAccount($con) {
    if (!isset($_POST["firstName"], $_POST["lastName"], $_POST["mi"], $_POST["contact"], $_POST["email"], $_POST["role"])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    $firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
    $mi = mysqli_real_escape_string($con, $_POST["mi"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $role = mysqli_real_escape_string($con, $_POST["role"]);

    $sql = "INSERT INTO account (firstName, lastName, middleInitial, contactNO, email, role, feedbackNO, rating, reportNO) 
            VALUES ('$firstName', '$lastName', '$mi', '$contact', '$email', '$role', 0, 0, 0)";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Course added successfully!');
                window.location.href = 'accounts.php';
              </script>";
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
}
?>
