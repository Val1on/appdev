<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Completed</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <div class="flex-1 bg-gray-800 rounded-xl  shadow-2xl p-4 sm:p-6 border-b border-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Trip Completed</h2>
                    <a href="dashboard.php" class="text-blue-400 hover:text-blue-300 transition-colors duration-200">Back to Dashboard</a>
                </div>

                <div class="space-y-4">
                    

                    <div class="bg-gray-800  p-4 sm:p-6 border-b border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Trip Information</h4>
                        <div class="space-y-2">
                            <p class="text-sm sm:text-base text-gray-400">Pickup Location: Manila</p>
                            <p class="text-sm sm:text-base text-gray-400">Drop-off Location: Quezon City</p>
                            <p class="text-sm sm:text-base text-gray-400">Date: Feb 26, 2024</p>
                            <p class="text-sm sm:text-base text-gray-400">Time: 2:30 PM</p>
                            <p class="text-sm sm:text-base text-gray-400">Fare: ₱550.00</p>
                        </div>
                    </div>

                    <div class="bg-gray-800  p-4 sm:p-6 border-b border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Your Profile</h4>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/48" alt="Car Owner photo">
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100">Name</h3>
                                <p class="text-sm sm:text-base text-gray-400">Rating: 4.8/5</p>
                                <p class="text-sm sm:text-base text-gray-400">Vehicle: Honda City 2021</p>
                                <p class="text-sm sm:text-base text-gray-400">Plate: XYZ 789</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800  p-4 sm:p-6 border-b border-gray-700">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Payment Method</h4>
                        <div class="space-y-2">
                            <p class="text-sm sm:text-base text-gray-400">Payment Method: Credit Card</p>
                            <p class="text-sm sm:text-base text-gray-400">Card Number: **** **** **** 1234</p>
                        </div>
                    </div>

                    <div class="bg-gray-800  p-4 sm:p-6 ">
                        <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Transaction Details</h4>
                        <div class="space-y-2">
                            <p class="text-sm sm:text-base text-gray-400">Transaction ID: 1234567890</p>
                            <p class="text-sm sm:text-base text-gray-400">Transaction Date: Feb 26, 2024</p>
                            <p class="text-sm sm:text-base text-gray-400">Amount: ₱550.00</p>
                            <p class="text-sm sm:text-base text-gray-400">Status: Completed</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="w-full lg:w-1/3  rounded-xl p-4 sm:p-6  mt-8 lg:mt-0 self-start space-y-8">
                <div class="space-y-4 pb-4">
                     <h4 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 mb-4">Commuters Rating</h4>
                    <div class="bg-gray-800 rounded-xl  shadow-2xl p-4 sm:p-6 ">
                       
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="Your photo">
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100"> Name</h3>
                                <div class="space-y-1 mt-1">
                                    <p class="text-sm sm:text-base text-gray-400">Rating: 5 - Excellent</p>
                                    <p class="text-sm sm:text-base text-gray-400">Review: Great trip, very comfortable and safe!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 pb-4 mt-8">
                    <div class="bg-gray-800 rounded-xl  shadow-2xl p-4 sm:p-6 ">
                       
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="Your photo">
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100"> Name</h3>
                                <div class="space-y-1 mt-1">
                                    <p class="text-sm sm:text-base text-gray-400">Rating: 5 - Excellent</p>
                                    <p class="text-sm sm:text-base text-gray-400">Review: Great trip, very comfortable and safe!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>