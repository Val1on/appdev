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

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="bg-gray-800 rounded-xl shadow-2xl mb-4 sm:mb-6 lg:mb-8 p-4 sm:p-6 border border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="relative">
                        <img src="https://via.placeholder.com/60" alt="" 
                             class="w-16 h-16 sm:w-20 sm:h-20 rounded-full border-2 border-blue-500 ring-2 ring-blue-400 ring-opacity-50">
                    </div>
                    <div>
                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Hi John,</h2>
                        <h3 class="text-lg sm:text-xl lg:text-1xl font-bold text-gray-100">Welcome back to !</h3>
                        <p class="text-sm sm:text-base text-blue-400">Car Owner</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 border-t border-gray-700 pt-6">
                <h3 class="text-base sm:text-lg lg:text-xl font-semibold text-gray-100 mb-4 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4"></path>
                    </svg>
                    My Vehicles
                </h3>

                <div class="grid grid-cols-1  gap-4">
                   
                    <div class="bg-gray-700 bg-opacity-50 rounded-lg p-4 hover:bg-gray-600/50 transition-colors duration-200">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-lg bg-gray-600 flex items-center justify-center">
                                    <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm sm:text-base lg:text-lg font-medium text-gray-100 truncate">Honda City </h4>
                                    
                                   
                                </div>
                                <p class="text-xs sm:text-sm text-gray-400 mt-1">2021</p>
                                <p class="text-xs sm:text-sm text-gray-400 mt-1">Plate: XYZ 789</p>
                                
                            </div>
                            <div class="flex flex-col space-y-2">
                                <button class="text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                              
                            </div>
                        </div>
                    </div>
                </div>
                
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
                        <a href="tripdetails.php" class="flex items-center justify-center px-3 py-1.5 border border-gray-500 text-gray-400 rounded-md text-xs sm:text-sm font-medium hover:bg-gray-600 hover:text-white transition-colors duration-200">
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

   
</body>
</html>