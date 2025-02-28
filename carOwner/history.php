<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip History - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
     <?php include '../includes/nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100">Trip History</h1>
        </div>
\
        <div class="mb-6 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <nav class="flex space-x-8">
                    <a href="trips.php" class="px-1 py-4 text-gray-400 hover:text-gray-100 font-medium border-b-2 border-transparent hover:border-gray-400 transition-colors duration-200">
                        Trips
                    </a>
                    <a href="request.php" class="px-1 py-4 text-gray-400 hover:text-gray-100 font-medium border-b-2 border-transparent hover:border-gray-400 transition-colors duration-200">
                        Requests
                    </a>
                    <a href="history.php" class="px-1 py-4 text-blue-400 border-b-2 border-blue-400 font-medium">
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
                            <div class="w-12 h-12 rounded-lg bg-green-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2">
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100">Manila to Quezon City</h3>
                                <span class="px-2 py-1 text-xs sm:text-sm  font-medium rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </div>
                            <div class="mt-2 space-y-1">
                                <p class="text-sm sm:text-base  text-gray-400">Feb 20, 2024 • 2:30 PM</p>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <p class="text-sm sm:text-base  text-gray-400 ml-1">4.8</p>
                                    </div>
                                    <p class="text-sm sm:text-base  font-medium text-green-400">₱550.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="px-4 py-2 text-sm sm:text-base font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                            View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>