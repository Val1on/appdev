<?php
session_start();
require 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }


    $stmt = $con->prepare("SELECT email, role FROM account WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid request method.";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-900 min-h-screen">
    <div class="flex min-h-screen">

      <div class="w-full md:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md space-y-8">
          <div class="text-center">
            <h2 class="text-3xl font-bold text-white">Login to Your Account </h2>
            <p class="mt-2 text-gray-400">Please enter your credentials</p>
          </div>
          
          <form class="mt-8 space-y-6" action="logIn.php" method="POST">
            <div class="space-y-4">
              <div class="mb-4">
                <label
                  for="email"
                  class="block text-xs sm:text-sm md:text-base text-gray-300 font-bold mb-2"
                  >Email</label
                >
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="text-xs sm:text-sm md:text-base shadow-lg appearance-none bg-gray-800 border border-gray-700 rounded-lg w-full py-2.5 sm:py-3 px-3 sm:px-4 text-gray-300 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div class="mb-6">
                <label
                  for="password"
                  class="block text-xs sm:text-sm md:text-base text-gray-300 font-bold mb-2"
                  >Password</label
                >
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="text-xs sm:text-sm md:text-base shadow-lg appearance-none bg-gray-800 border border-gray-700 rounded-lg w-full py-2.5 sm:py-3 px-3 sm:px-4 text-gray-300 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-0">
              <button
                type="submit"
                class="w-full sm:w-auto text-xs sm:text-sm md:text-base bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 transform transition-all duration-200 hover:scale-105"
              >
                Login
              </button>
              <a
                href="#"
                class="text-xs sm:text-sm md:text-base font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200"
              >
                Forgot Password?
              </a>
            </div>

            <div class="mt-6 text-center">
              <p class="text-xs sm:text-sm md:text-base text-gray-400">
                Don't have an account?
                <a
                  href="signUpForm.php"
                  class="text-blue-400 hover:text-blue-300 font-bold transition-colors duration-200"
                >Sign Up</a>
              </p>
            </div>
          </form>
        </div>
      </div>

      <!-- Right Column -->
      <div class="hidden md:flex md:w-1/2 bg-gradient-to-bl from-blue-500 via-blue-600/95 to-fuchsia-800/30 p-12 items-center justify-center">
        <div class="text-white space-y-6">
          <h1 class="text-4xl font-bold">Welcome to Carpool!</h1>
          <p class="text-xl">Login to access your account and start carpooling with us.</p>
          <div class="space-y-4">
            <p class="flex items-center"><span class="mr-2">✓</span> Share your ride</p>
            <p class="flex items-center"><span class="mr-2">✓</span> Find carpool partners</p>
            <p class="flex items-center"><span class="mr-2">✓</span> Save on travel costs</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>