<?php
// Include database connection
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "carpoolv2";
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields to prevent undefined errors
    $postMsg = $_POST['postMsg'] ?? '';
    $carownerNO = $_POST['carownerNO'] ?? 0;
    $departure = $_POST['departure'] ?? '';
    $destinationID = $_POST['destinationID'] ?? 0;
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $carID = $_POST['carID'] ?? 0;
    $available_seats = $_POST['available_seats'] ?? 0;
    $price_per_seat = $_POST['price_per_seat'] ?? 0.00;
    $trip_description = $_POST['trip_description'] ?? '';

    // Ensure carID exists before inserting
    $car_check = mysqli_query($conn, "SELECT carID FROM cars WHERE carID = '$carID'");
    if (mysqli_num_rows($car_check) == 0) {
        die("Error: The carID does not exist.");
    }

    // Handle file upload safely
    if (!empty($_FILES["postIMG"]["name"])) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $postIMG = basename($_FILES["postIMG"]["name"]);
        $target_file = $upload_dir . $postIMG;

        if (!move_uploaded_file($_FILES["postIMG"]["tmp_name"], $target_file)) {
            die("Error: Failed to upload image.");
        }
    } else {
        $postIMG = ""; // Default value if no file uploaded
    }

    // Insert into database
    $sql = "INSERT INTO post (postMsg, carownerNO, postIMG, departure, destinationID, date, time, carID, available_seats, price_per_seat, trip_description) 
            VALUES ('$postMsg', '$carownerNO', '$postIMG', '$departure', '$destinationID', '$date', '$time', '$carID', '$available_seats', '$price_per_seat', '$trip_description')";

    if (mysqli_query($conn, $sql)) {
        echo "Post uploaded successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Upload Trip Post</title>
</head>
<body>
    <h2>Upload a New Trip</h2>
    <form action="post.php" method="POST" enctype="multipart/form-data">
        <label>Post Message:</label>
        <input type="text" name="postMsg" required><br>
        
        
        <label>Departure:</label>
        <input type="text" name="departure" required><br>
        
        
        <label>Date:</label>
        <input type="date" name="date" required><br>
        
        <label>Time:</label>
        <input type="time" name="time" required><br>
        
        <label>Available Seats:</label>
        <input type="number" name="available_seats" required><br>
        
        <label>Price per Seat:</label>
        <input type="text" name="price_per_seat" required><br>
        
        <label>Trip Description:</label>
        <textarea name="trip_description" required></textarea><br>
        
        <label>Upload Image:</label>
        <input type="file" name="postIMG" required><br>
        
        <button type="submit">Upload Post</button>
    </form>
</body>
</html>
