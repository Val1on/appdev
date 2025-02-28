<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">
    <?php include '../includes/sidebar.php'; ?>
    

    <div class="lg:ml-64 p-2 sm:p-4 lg:p-6">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">

            <div class="bg-gray-800 rounded-xl shadow-2xl mb-4 sm:mb-6 lg:mb-8 p-4 sm:p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        <div class="relative">
                            <img src="https://via.placeholder.com/60" alt="" 
                                 class="w-12 h-12 sm:w-16 sm:h-16 rounded-full border-2 border-blue-500 ring-2 ring-blue-400 ring-opacity-50">
                        </div>
                        <div>
                            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-100">Welcome back, Lorem</h2>
                            <p class="text-sm sm:text-base text-blue-400">Administrator</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 sm:mt-6 lg:mt-8 border-t border-gray-700 pt-4 sm:pt-6">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-100 mb-3 flex items-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Recent Activity
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center text-xs sm:text-sm bg-gray-700 bg-opacity-50 p-2 sm:p-3 rounded-lg">
                            <p class="text-gray-300">Deleted user: Lorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6 mb-4 sm:mb-6 lg:mb-8">

                <div class="bg-gray-800 rounded-xl p-4 sm:p-6 lg:p-8 border border-gray-700 hover:border-blue-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3 sm:mb-4">
                        <div class="p-3 sm:p-4 bg-blue-500 bg-opacity-20 rounded-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm sm:text-base lg:text-lg text-gray-400">Total Users</p>
                            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100 mt-1 sm:mt-2">1,234</h3>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-4">
                        <div class="flex items-center justify-between text-xs sm:text-sm">
                            <span class="text-green-400 flex items-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                                12% increase
                            </span>
                            <span class="text-gray-400">vs last month</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl p-4 sm:p-6 lg:p-8 border border-gray-700 hover:border-green-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3 sm:mb-4">
                        <div class="p-3 sm:p-4 bg-green-500 bg-opacity-20 rounded-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm sm:text-base lg:text-lg text-gray-400">Total Carpools</p>
                            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100 mt-1 sm:mt-2">2,451</h3>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-4">
                        <div class="flex items-center justify-between text-xs sm:text-sm">
                            <span class="text-green-400 flex items-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                                8% increase
                            </span>
                            <span class="text-gray-400">vs last month</span>
                        </div>
                    </div>
                </div>

         
                <div class="bg-gray-800 rounded-xl p-4 sm:p-6 lg:p-8 border border-gray-700 hover:border-yellow-500 transition-all duration-300">
                    <div class="flex items-center justify-between mb-3 sm:mb-4">
                        <div class="p-3 sm:p-4 bg-yellow-500 bg-opacity-20 rounded-lg">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-sm sm:text-base lg:text-lg text-gray-400">Active Routes</p>
                            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-100 mt-1 sm:mt-2">324</h3>
                        </div>
                    </div>
                    <div class="mt-3 sm:mt-4">
                        <div class="flex items-center justify-between text-xs sm:text-sm">
                            <span class="text-green-400 flex items-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                                15% increase
                            </span>
                            <span class="text-gray-400">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        
                <div class="bg-gray-800 rounded-xl p-3 sm:p-4 lg:p-6 border border-gray-700 hover:border-green-500 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400">Total Carpools</p>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-100 mt-1">2,451</h3>
                        </div>
                        <div class="p-2 sm:p-3 bg-green-500 bg-opacity-20 rounded-lg">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                        </div>
                    </div>
                </div>

   
                <div class="bg-gray-800 rounded-xl p-3 sm:p-4 lg:p-6 border border-gray-700 hover:border-blue-500 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400">Active Users</p>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-100 mt-1">1,234</h3>
                        </div>
                        <div class="p-2 sm:p-3 bg-blue-500 bg-opacity-20 rounded-lg">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

            
                <div class="bg-gray-800 rounded-xl p-3 sm:p-4 lg:p-6 border border-gray-700 hover:border-red-500 transition-all duration-300">
                    <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs sm:text-sm text-gray-400">Monthly Report</p>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-100 mt-1">September 2023</h3>
                    </div>
                    <div class="p-2 sm:p-3 bg-red-500 bg-opacity-20 rounded-lg">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    </div>
                </div>

                <div class="bg-gray-800 rounded-xl p-3 sm:p-4 lg:p-6 border border-gray-700 hover:border-yellow-500 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs sm:text-sm text-gray-400">Active Routes</p>
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-100 mt-1">324</h3>
                        </div>
                        <div class="p-2 sm:p-3 bg-yellow-500 bg-opacity-20 rounded-lg">
                            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
