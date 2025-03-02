<?php
session_start();
include 'database.php';


$carOwnerID = 1; // PALITAN NG $_SESSION['carOwnerID'] PAG NAGAWA KO NA LOG-IN SYSTEM HUHU -ripX jowa ni MIKHAELA JANNA JIMENEA LIM


$ownerQuery = "SELECT firstName, lastName FROM carowner WHERE ownerNO = ?";
$stmt = $con->prepare($ownerQuery);
$stmt->bind_param("i", $carOwnerID);
$stmt->execute();
$result = $stmt->get_result();
$owner = $result->fetch_assoc();


$carQuery = "SELECT * FROM cars WHERE carOwnerID = ?";
$stmt = $con->prepare($carQuery);
$stmt->bind_param("i", $carOwnerID);
$stmt->execute();
$cars = $stmt->get_result();


$bookingQuery = "SELECT b.bookingID, a.firstName, a.lastName, d.locationName, c.carModel, c.plateNum
                 FROM booking b
                 JOIN account a ON b.userID = a.accountNO
                 JOIN cars c ON b.carID = c.carID
                 JOIN destination d ON b.destinationID = d.destinationID
                 WHERE b.carOwnerID = ?";
$stmt = $con->prepare($bookingQuery);
$stmt->bind_param("i", $carOwnerID);
$stmt->execute();
$bookings = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Owner Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 rounded-xl shadow-2xl p-6 border border-gray-700">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/60" alt="" class="w-16 h-16 rounded-full border-2 border-blue-500 ring-2 ring-blue-400">
                <div>
                    <h2 class="text-2xl font-bold text-gray-100">Hi <?php echo $owner['firstName']; ?>,</h2>
                    <p class="text-sm text-blue-400">Car Owner</p>
                </div>
            </div>

            <div class="mt-6 border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">My Vehicles</h3>
                <div class="grid grid-cols-1 gap-4">
                    <?php while ($car = $cars->fetch_assoc()): ?>
                        <div class="bg-gray-700 rounded-lg p-4 hover:bg-gray-600 transition">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg font-medium text-gray-100"><?php echo $car['carModel']; ?></h4>
                                <p class="text-sm text-gray-400">Plate: <?php echo $car['plateNum']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>


            <div class="mt-6 border-t border-gray-700 pt-6">
                <h3 class="text-lg font-semibold text-gray-100 mb-4">Pending Bookings</h3>
                <div class="space-y-4">
                    <?php while ($booking = $bookings->fetch_assoc()): ?>
                        <div class="bg-gray-800 rounded-xl p-4 border border-gray-700">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-100"><?php echo $booking['firstName'] . " " . $booking['lastName']; ?></h3>
                                    <p class="text-sm text-gray-400">Destination: <?php echo $booking['locationName']; ?></p>
                                    <p class="text-sm text-gray-400">Car: <?php echo $booking['carModel']; ?> (<?php echo $booking['plateNum']; ?>)</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 mt-4">
                                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Accept</button>
                                <button class="px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white">Decline</button>
                                <a href="tripdetails.php?bookingID=<?php echo $booking['bookingID']; ?>" class="px-4 py-2 border border-gray-500 text-gray-400 rounded-md hover:bg-gray-600 hover:text-white">Details</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
