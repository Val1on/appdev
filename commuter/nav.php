<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar Example</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav class="bg-gray-900 p-4">
      <div class="container mx-auto flex items-center justify-between">
       
        <div class="flex items-center space-x-4">
          <img
            src="logo.png"
            alt="Logo"
            class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 text-white"
          />
         
          <div class="hidden lg:flex items-center space-x-4">
            <a href="dashboard.php" class="text-gray-400 hover:text-gray-100 px-2 sm:px-3 py-1 sm:py-2 rounded-md text-xs sm:text-sm md:text-base font-medium hover:bg-gray-800">Dashboard</a>
            <a href="book.php" class="text-gray-400 hover:text-gray-100 px-2 sm:px-3 py-1 sm:py-2 rounded-md text-xs sm:text-sm md:text-base font-medium hover:bg-gray-800">Trips</a>
             <a href="cars.php" class="text-gray-400 hover:text-gray-100 px-2 sm:px-3 py-1 sm:py-2 rounded-md text-xs sm:text-sm md:text-base font-medium hover:bg-gray-800">Cars</a>
          </div>
        </div>

        
        <div class="flex items-center space-x-4">
           
            <a href="find.php" class="hidden md:flex text-gray-400 hover:text-gray-100 px-3 py-1 rounded-md text-sm font-medium hover:bg-gray-800 border border-gray-600 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="hidden sm:inline">Find</span>
            </a>
            



          
          <button class="text-gray-400 hover:text-gray-100 relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Notification Badge -->
            <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 rounded-full flex items-center justify-center text-xs text-white">3</span>
          </button>

          
          <img
            class="h-8 w-8 rounded-full border-2 border-gray-400"
            src="https://via.placeholder.com/40"
            alt=""
          />
          <!-- Burger Menu -->
          <button
            id="burger"
            class="text-gray-100 focus:outline-none"
          >
            <svg
              class="h-4 w-4 sm:h-5 sm:w-5 md:h-6 md:w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7"
              />
            </svg>
          </button>
        </div>
      </div>
    </nav>

      <!-- Off-canvas menu -->
      <div id="menu" class="hidden fixed inset-y-0 right-0 bg-gray-900 bg-opacity-95 z-50 flex flex-col items-center justify-center 
    w-full transform transition-all duration-700 ease-in-out opacity-0">
        <!-- Close Button -->
        <button id="close-menu" class="absolute top-6 right-6 text-gray-300 hover:text-white">
          <svg
        class="h-4 w-4 sm:h-5 sm:w-5 md:h-6 md:w-6"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
          >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M6 18L18 6M6 6l12 12"
        />
          </svg>
        </button>

        <!-- Navigation Items Container -->
        <div class="flex flex-col w-full max-w-xl sm:max-w-2xl lg:max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2 sm:space-y-3 lg:space-y-4">

     

            <a href="dashboard.php" class="flex items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200 <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-gray-800 text-gray-100' : ''; ?>">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              <span class="transform-gpu">Dashboard</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>

                <a href="find.php" class="flex md:hidden items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200 <?php echo basename($_SERVER['PHP_SELF']) == 'accounts.php' ? 'bg-gray-800 text-gray-100' : ''; ?>">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              <span class="transform-gpu">Find Trips</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>
            
  

            <a href=".php" class="flex items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200 <?php echo basename($_SERVER['PHP_SELF']) == 'accounts.php' ? 'bg-gray-800 text-gray-100' : ''; ?>">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              <span class="transform-gpu">Trips</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>

            <a href="cars.php" class="flex items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200 <?php echo basename($_SERVER['PHP_SELF']) == 'reports.php' ? 'bg-gray-800 text-gray-100' : ''; ?>">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <span class="transform-gpu">Cars</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>

            <a href="profile.php" class="flex items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200 <?php echo basename($_SERVER['PHP_SELF']) == 'profileSetting.php' ? 'bg-gray-800 text-gray-100' : ''; ?>">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <span class="transform-gpu">Profile Settings</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>

            <a href="#" class="flex items-center justify-between text-gray-400 hover:text-gray-100 p-3 sm:p-4 lg:p-5 rounded-md text-xs sm:text-sm lg:text-base font-medium hover:bg-gray-800 transition-colors duration-200">
            <div class="flex items-center space-x-3 sm:space-x-4">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              <span class="transform-gpu">Log out</span>
            </div>
            <svg class="w-3 h-3 sm:w-4 sm:h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            </a>

        </div>
      </div>
    </nav>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const burger = document.querySelector("#burger");
        const menu = document.querySelector("#menu");
        const closeMenu = document.querySelector("#close-menu");

        burger.addEventListener("click", function () {
          menu.classList.toggle("hidden");
          document.body.classList.toggle("overflow-hidden");
          setTimeout(() => {
            menu.classList.toggle("opacity-0");
          }, 50);
        });

        closeMenu.addEventListener("click", function () {
          menu.classList.add("opacity-0");
          setTimeout(() => {
            menu.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
          }, 500);
        });
      });
    </script>
  </body>
</html>