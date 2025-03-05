<?php
session_start();
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "carpoolv3";
$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postMsg = $_POST['postMsg'] ?? '';
    $carownerID = $_POST['carownerID'] ?? 0; 
    $departure = $_POST['departure'] ?? '';
    $destinationID = $_POST['destinationID'] ?? 0;
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $carID = $_POST['carID'] ?? 0;
    $available_seats = $_POST['available_seats'] ?? 0;
    $price_per_seat = $_POST['price_per_seat'] ?? 0.00;
    $trip_description = $_POST['trip_description'] ?? '';


    $car_check = mysqli_query($con, "SELECT carID FROM cars WHERE carID = '$carID'");
    if (mysqli_num_rows($car_check) == 0) {
        die("Error: The carID does not exist.");
    }


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
        $postIMG = ""; 
    }

  
    $sql = "INSERT INTO post (postMsg, carOwnerID, postIMG, departure, destinationID, date, time, carID, available_seats, price_per_seat, trip_description) 
        VALUES ('$postMsg', '$carownerID', '$postIMG', '$departure', '$destinationID', '$date', '$time', '$carID', '$available_seats', '$price_per_seat', '$trip_description')";

    $check_owner = mysqli_query($con, "SELECT ownerNO FROM carowner WHERE ownerNO = '$carownerID'");
    if (mysqli_num_rows($check_owner) == 0) {
        die("Error: carOwnerID ($carownerID) does not exist in carowner table.");
    }


    if (mysqli_query($con, $sql)) {
        echo "Post uploaded successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Trip Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php include 'nav.php'; ?>

    <div class="lg:ml-50 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Upload New Trip</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form action="post.php" method="POST" enctype="multipart/form-data" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                            <!-- Post Message -->
                            <div class="relative col-span-2">
                                <label for="postMsg" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Post Message
                                </label>
                                <input type="text" name="postMsg" id="postMsg" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Departure -->
                            <div class="relative">
                                <label for="departure" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Departure Location
                                </label>
                                <input type="text" name="departure" id="departure" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Select Car -->
                            <div class="relative">
                                <label for="carID" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Select Car
                                </label>
                                <select name="carID" id="carID" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                                    <option value="">Select a Car</option>
                                    <?php
                                    $cars = mysqli_query($con, "SELECT carID, carModel FROM cars");
                                    while ($row = mysqli_fetch_assoc($cars)) {
                                        echo "<option value='" . $row['carID'] . "'>" . $row['carModel'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Date -->
                            <div class="relative">
                                <label for="date" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Date
                                </label>
                                <input type="date" name="date" id="date" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Time -->
                            <div class="relative">
                                <label for="time" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Time
                                </label>
                                <input type="time" name="time" id="time" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Available Seats -->
                            <div class="relative">
                                <label for="available_seats" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Available Seats
                                </label>
                                <input type="number" name="available_seats" id="available_seats" required min="1"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Price per Seat -->
                            <div class="relative">
                                <label for="price_per_seat" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Price per Seat
                                </label>
                                <input type="number" name="price_per_seat" id="price_per_seat" required step="0.01" min="0"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Upload Image -->
                            <div class="relative">
                                <label for="postIMG" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Upload Image
                                </label>
                                <input type="file" name="postIMG" id="postIMG" required accept="image/*"
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Trip Description -->
                            <div class="relative col-span-2">
                                <label for="trip_description" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Trip Description
                                </label>
                                <textarea name="trip_description" id="trip_description" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="window.history.back()" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Upload Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
