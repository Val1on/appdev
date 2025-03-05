<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
   
    <header class="fixed top-0 left-0 w-full bg-green-600 shadow-md z-40">
        <div class="flex items-center justify-between px-2 sm:px-4 py-2 sm:py-3 lg:pl-64">
         
            <div class="flex items-center space-x-2 sm:space-x-4">
                <button id="sidebarToggle" class="p-1 sm:p-2 rounded-md lg:hidden hover:bg-green-600">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
              
                <div class="flex items-center ">
                    <img src="https://via.placeholder.com/40" alt="Company Logo" class="h-6 sm:h-8 text-white">
                </div>
            </div>
            
          
            <div class="flex items-center space-x-2 sm:space-x-4">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-6 h-6 sm:w-8 sm:h-8 rounded-full border-2 border-gray-600 text-white">
                </div>
            </div>
        </div>
    </header>


    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    
    <div id="sidebar" class="fixed left-0 top-0 w-48 sm:w-56 lg:w-64 h-screen bg-green-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50 flex flex-col">

        <div class="bg-green-800 p-3 sm:p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div>
                        <h1 class="text-base sm:text-lg lg:text-xl font-bold">Admin Panel</h1>
                    </div>
                </div>
             
                <button id="closeButton" class="text-gray-300 hover:text-white lg:hidden">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

      
        <ul class="flex-1 mt-2 sm:mt-4">
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="dashboard.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-sm sm:text-base">Dashboard</span>
                </a>
            </li>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="feedback.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                    <span class="text-sm sm:text-base">Feedback</span>
                </a>
            </li>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="post.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span class="text-sm sm:text-base">Post</span>
                </a>
            </li>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="reports.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="text-sm sm:text-base">Reports</span>
                </a>
            </li>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="accounts.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="text-sm sm:text-base">Accounts</span>
                </a>
            </li>
        
           <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                 <a href="cars.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                    <span class="text-sm sm:text-base">Cars</span>
                </a>
            </li>
            
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700 ">
                <a href="carowner.php" class="flex items-center space-x-2 sm:space-x-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="text-sm sm:text-base">Car Owner</span>
                </a>
            </li>
        </ul>
        <div class="mt-auto border-t border-green-700">
            <ul>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="profileSetting.php" class="flex items-center space-x-2 sm:space-x-3">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-sm sm:text-base">Profile</span>
                </a>
            </li>
            <li class="p-2 sm:p-3 lg:p-4 hover:bg-green-700">
                <a href="logout.php" class="flex items-center space-x-2 sm:space-x-3">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span class="text-sm sm:text-base">Logout</span>
                </a>
            </li>
            </ul>
        </div>
    </div>

    <div class="p-4 sm:p-6 lg:p-10 lg:ml-64 mt-12 sm:mt-14 lg:mt-16"> 
       
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const closeButton = document.getElementById('closeButton');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        closeButton.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

  
        function toggleDropdown() {
            const dropdown = document.getElementById('carsDropdown');
            const arrow = document.getElementById('dropdownArrow');
            dropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>
