<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <div class="flex-1 bg-gray-800 rounded-xl shadow-2xl p-4 sm:p-6 border border-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Trip Details</h2>
                    <a href="dashboard.php" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">Back to Dashboard</a>
                </div>

                <div class="space-y-4">
                    

                    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Trip Information</h4>
                        <div class="space-y-2">
                            <p class="text-sm sm:text-base text-gray-400">Pickup Location: Manila</p>
                            <p class="text-sm sm:text-base text-gray-400">Drop-off Location: Quezon City</p>
                            <p class="text-sm sm:text-base text-gray-400">Date: Feb 26, 2024</p>
                            <p class="text-sm sm:text-base text-gray-400">Time: 2:30 PM</p>
                            <p class="text-sm sm:text-base text-gray-400">Fare: ₱550.00</p>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Commuter Profile</h4>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/48" alt="Commuter photo">
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100">John Doe</h3>
                                <p class="text-sm sm:text-base text-gray-400">Member Since: 2020</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Payment Method</h4>
                        <div class="space-y-2">
                            <p class="text-sm sm:text-base text-gray-400">Payment Method: Credit Card</p>
                            <p class="text-sm sm:text-base text-gray-400">Card Number: **** **** **** 1234</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 bg-gray-800 rounded-xl shadow-2xl p-4 sm:p-6 border border-gray-700 mt-8 lg:mt-0 self-start">
                <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Transaction</h4>
                <div class="space-y-2">
                    <p class="text-sm sm:text-base text-gray-400">Trip Fare: ₱550.00</p>
                    <p class="text-sm sm:text-base text-gray-400">Service Fee: ₱50.00</p>
                    <p class="text-sm sm:text-base text-gray-400">Total: ₱600.00</p>
                </div>
                <button class="mt-4 w-full flex items-center justify-center px-3 py-1.5 sm:px-4 sm:py-2 bg-green-500 text-white rounded-md text-xs sm:text-sm font-medium hover:bg-green-600 transition-colors duration-200">
                    Request a Book
                </button>
            </div>
        </div>
    </div>
</body>
</html>