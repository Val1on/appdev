<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Trip - Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
       <?php include 'nav.php'; ?>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
 
        <div class="mb-8">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Post a Trip</h1>
            <p class="mt-2 text-sm sm:text-base lg:text-lg text-gray-400">Fill in the trip details to start accepting passengers</p>
        </div>

 
        <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-4 sm:p-6 lg:p-8">
            <form action="#" method="POST" class="space-y-6 sm:space-y-8">
                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        Route Details
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">From</label>
                            <div class=" relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                                <input type="text" name="departure" required 
                                    class="text-sm sm:text-base block w-full pl-10 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                    placeholder="Enter departure location">
                            </div>
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-200 mb-1">To</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                                <input type="text" name="destination" required 
                                    class="text-sm sm:text-base  block w-full pl-10 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                    placeholder="Enter destination">
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Ride Schedule
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-200">Date</label>
                            <input type="date" name="date" required class="text-sm sm:text-base  block w-full pl-10 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-200">Time</label>
                            <input type="time" name="time" required class="text-sm sm:text-base  block w-full pl-10 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200">
                        </div>
                    </div>
                </div>

            
                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Vehicle Details
                    </h2>
                    <div class="relative">
                        <select name="vehicle" required 
                            class="  block w-full pl-3 pr-10 py-2.5 text-base rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200">
                            <option class="text-sm sm:text-base" value="" disabled selected>Select your vehicle</option>
                            <option class="text-sm sm:text-base" value="1">Toyota Vios (ABC-123)</option>
                            <option class="text-sm sm:text-base" value="2">Honda City (XYZ-789)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Seats and Pricing
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Available Seats</label>
                            <div class="relative">
                                <input type="number" name="seats" min="1" max="8" required 
                                    class="text-sm sm:text-base  block w-full pl-3 pr-12 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                    placeholder="1-8">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 text-sm font-medium">seats</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-400">Maximum 8 seats allowed</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-200 mb-1">Price per Seat</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400 font-medium">₱</span>
                                </div>
                                <input type="number" name="price" min="0" step="0.01" required 
                                    class="text-sm sm:text-base  block w-full pl-8 pr-3 py-2.5 rounded-lg bg-gray-700 border-2 border-gray-600 text-gray-100 placeholder-gray-400 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                        Trip Description
                    </h2>
                    <textarea name="description" rows="4" class="text-sm sm:text-base  block w-full rounded-lg bg-gray-700 border-gray-600 text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Add details about pickup points, luggage policy, or any special instructions..."></textarea>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-700">
                    <button type="button" onclick="window.history.back()" class="px-4 sm:px-6 py-2.5 text-sm font-medium text-gray-400 hover:text-gray-100 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 sm:px-6 py-2.5 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-offset-gray-800 transition-all duration-200 flex items-center">
                        <svg class="text-sm sm:text-base  w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Post Trip
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>