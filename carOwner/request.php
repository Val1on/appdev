<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
      <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
  
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100">Trip Requests</h1>
        </div>


        <div class="mb-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <nav class="flex space-x-8">
                    <a href="trips.php" class="px-1 py-4 text-gray-400 hover:text-gray-100 font-medium border-b-2 border-transparent hover:border-gray-400 transition-colors duration-200">
                        Trips
                    </a>
                    <a href="request.php" class="px-1 py-4 text-blue-400 border-b-2 border-blue-400 font-medium">
                        Requests
                    </a>
                    <a href="history.php" class="px-1 py-4 text-gray-400 hover:text-gray-100 font-medium border-b-2 border-transparent hover:border-gray-400 transition-colors duration-200">
                        History
                    </a>
                </nav>
            </div>
        </div>

  
        <div class="space-y-4">
         
            <div class="bg-gray-800 rounded-xl p-4 sm:p-6 border border-gray-700">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-12 h-12 rounded-full" src="https://via.placeholder.com/48" alt="Passenger photo">
                        </div>
                        <div>
                            <div class="flex items-center space-x-2">
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100">John Doe</h3>
                                <span class="px-2 py-1 text-xs sm:text-sm  font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </div>
                            <div class="mt-2 space-y-1">
                                <p class="text-sm sm:text-base text-gray-400">Manila to Quezon City</p>
                                <p class="text-sm sm:text-base text-gray-400">Feb 26, 2024 • 2:30 PM</p>
                                <p class="text-sm sm:text-base  font-medium text-blue-400">₱550.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="flex items-center justify-center px-3 py-1.5 sm:px-4 sm:py-2 bg-blue-500 text-white rounded-md text-xs sm:text-sm font-medium hover:bg-blue-600 transition-colors duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                        <button class="flex items-center justify-center px-3 py-1.5 sm:px-4 sm:py-2 border border-red-500 text-red-500 rounded-md text-xs sm:text-sm font-medium hover:bg-red-500 hover:text-white transition-colors duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Decline
                        </button>
                        <a href="tripDetails.php" class="flex items-center justify-center px-3 py-1.5 border border-gray-500 text-gray-400 rounded-md text-xs sm:text-sm font-medium hover:bg-gray-600 hover:text-white transition-colors duration-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Details
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>