<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Owner Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700">

        <?php include '../includes/nav.php'; ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-xl overflow-hidden">
   
            <div class="border-b border-gray-700 px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <div class="relative">
                        <img id="profilePreview" src="https://via.placeholder.com/128" alt="Profile Picture" 
                            class="h-24 w-24 sm:h-28 sm:w-28 lg:h-32 lg:w-32 rounded-full border-4 border-gray-700 shadow-lg object-cover">
                        <form id="profileImageForm">
                            <label for="profileImage" class="absolute bottom-0 right-0 cursor-pointer">
                                <div class="bg-blue-600 p-1.5 sm:p-2 rounded-full shadow-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </label>
                            <input type="file" id="profileImage" name="profileImage" accept="image/*" class="hidden">
                        </form>
                    </div>
                    <div class="text-center sm:text-left">
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white">Car Owner Profile</h1>
                        <p class="text-sm sm:text-base text-gray-400">Manage your personal information</p>
                    </div>
                </div>
            </div>

            <form action="profile_update.php" method="POST" class="p-4 sm:p-6 lg:p-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
   
                    <div class="relative">
                        <label for="firstName" class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                        <input type="text" name="firstName" id="firstName" required 
                            class="block w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                            placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 
                            focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200"
                            placeholder="Enter your first name">
                    </div>

         
                    <div class="relative">
                        <label for="lastName" class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                        <input type="text" name="lastName" id="lastName" required 
                            class="block w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                            placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 
                            focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200"
                            placeholder="Enter your last name">
                    </div>

                    
                    <div class="relative">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                        <input type="email" name="email" id="email" required 
                            class="block w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                            placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 
                            focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200"
                            placeholder="Enter your email">
                    </div>

               
                    <div class="relative">
                        <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
                        <input type="tel" name="phone" id="phone" required 
                            class="block w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                            placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 
                            focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200"
                            placeholder="Enter your phone number">
                    </div>

                   
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-300 mb-2">Address</label>
                        <input type="text" name="address" id="address" required 
                            class="block w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-gray-100 
                            placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-2 
                            focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200"
                            placeholder="Enter your complete address">
                    </div>

                
                    
                </div>

      
                <div class="mt-8 flex justify-end space-x-4 border-t border-gray-700 pt-6">
                    <button type="submit" 
                        class="px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg
                        hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 
                        transition-colors duration-200">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>