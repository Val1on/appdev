<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="white">
     <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
   
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-green-600">My Trips</h1>
        </div>
   
 

        <div class="mb-6 border-b border-green-700">
            <div class="flex justify-between items-center">
            <nav class="flex space-x-8">
                <a href="trips.php" class="px-1 py-4 text-green-500 border-b-2 border-green-400 font-medium">
                Trips
                </a>
                <a href="request.php" class="px-1 py-4 text-green-500 hover:text-green-100 font-medium border-b-2 border-transparent hover:border-green-400 transition-colors duration-200">
                Requests
                </a>
                <a href="history.php" class="px-1 py-4 text-green-500 hover:text-green-100 font-medium border-b-2 border-transparent hover:border-green-400 transition-colors duration-200">
                History
                </a>
            </nav>
            <a href="post.php" class="px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition-colors duration-200 text-center sm:text-left">
                Post a Trip
            </a>
            </div>
        </div>
    
        <div class="space-y-4">
    
            <div class="bg-green-800 rounded-xl p-4 sm:p-6 border border-green-700">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-lg bg-green-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2">
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-green-100">Manila to Quezon City</h3>
                              
                            </div>
                            <div class="mt-2 space-y-1">
                                <p class="text-sm sm:text-base text-green-400">Toyota Vios (ABC-123)</p>
                                <p class="text-sm sm:text-base text-green-400">Feb 25, 2024 • 2:30 PM</p>
                                <p class="text-sm sm:text-base font-medium text-green-400">₱550.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        
                        <a href="edit_trip.php" class="px-4 py-2 text-sm sm:text-base font-medium text-green-400 hover:text-green-500 transition-colors duration-200">
                            Edit
                        </a>
                        <button class="px-4 py-2 text-sm sm:text-base font-medium text-red-400 hover:text-red-500 transition-colors duration-200">
                            Delete
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>