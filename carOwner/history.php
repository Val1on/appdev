<?php
session_start();
include 'database.php';
include 'nav.php';

// TEST RUN KO LANG BHIEEE WALA PA LOGIN WAHAHAHAHAHAHAHAHHAHAHA
$owner_id = 1; //$_SESSION['ownerNO'];


/*if (!isset($_SESSION['ownerNO'])) {
    die("Error: Owner not logged in.");
}*/


$query = "
   SELECT 
    b.bookingID, 
    b.carOwnerID, 
    d.locationName, 
    p.postMsg, 
    p.date, 
    p.time 
FROM booking b
JOIN destination d ON b.destinationID = d.destinationID
JOIN post p ON b.carOwnerID = p.carownerID
WHERE b.carOwnerID = ?;

";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $owner_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip History - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="white">
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-green-600">Trip History</h1>
        </div>

        <div class="mb-6 border-b border-green-700">
            <div class="flex justify-between items-center">
                <nav class="flex space-x-8">
                    <a href="trips.php" class="px-1 py-4 text-green-500 hover:text-green-100 font-medium border-b-2 border-transparent hover:border-green-400 transition-colors duration-200">
                        Trips
                    </a>
                    <a href="request.php" class="px-1 py-4 text-green-500 hover:text-green-100 font-medium border-b-2 border-transparent hover:border-green-400 transition-colors duration-200">
                        Requests
                    </a>
                    <a href="history.php" class="px-1 py-4 text-green-500 border-b-2 border-green-400 font-medium">
                        History
                    </a>
                </nav>
            </div>
        </div>

        <div class="space-y-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($trip = $result->fetch_assoc()): ?>
                    <div class="bg-green-800 rounded-xl p-4 sm:p-6 border border-green-700">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-lg bg-green-500 bg-opacity-10 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-green-100">
                                            <?= htmlspecialchars($trip['departure']) ?> to <?= htmlspecialchars($trip['destination']) ?>
                                        </h3>
                                        <span class="px-2 py-1 text-xs sm:text-sm font-medium rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </div>
                                    <div class="mt-2 space-y-1">
                                        <p class="text-sm sm:text-base text-green-400">
                                            <?= date("M d, Y", strtotime($trip['date'])) ?> • <?= date("h:i A", strtotime($trip['time'])) ?>
                                        </p>
                                        <div class="flex items-center space-x-2">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                <p class="text-sm sm:text-base text-green-400 ml-1">
                                                    <?= htmlspecialchars($trip['rating']) ?: 'No rating' ?>
                                                </p>
                                            </div>
                                            <p class="text-sm sm:text-base font-medium text-green-400">
                                                ₱<?= number_format($trip['price'], 2) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <a href="tripCompleted.php?id=<?= $trip['booking_id'] ?>" class="px-4 py-2 text-sm sm:text-base font-medium text-green-400 hover:text-green-100 transition-colors duration-200">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-green-400 text-center">No completed trips found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
