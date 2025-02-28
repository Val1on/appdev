<?php
session_start();
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = trim($_POST['password']);
    $role = mysqli_real_escape_string($con, trim($_POST['role']));
    $vehicle = isset($_POST['vehicle']) ? mysqli_real_escape_string($con, trim($_POST['vehicle'])) : NULL;
    $license = isset($_POST['license']) ? mysqli_real_escape_string($con, trim($_POST['license'])) : NULL;

    // Validate required fields
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // Validate password security
    if (!preg_match('/[A-Z]/', $password)) {
        echo "<script>alert('Password must contain at least one uppercase letter.'); window.history.back();</script>";
        exit;
    }

    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        echo "<script>alert('Password must contain at least one special character.'); window.history.back();</script>";
        exit;
    }

    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.'); window.history.back();</script>";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into `account` table
    $stmt = $con->prepare("INSERT INTO account (username, email, password, role, feedbackNO, rating, reportNO) VALUES (?, ?, ?, ?, 0, 0, 0)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        $accountID = $stmt->insert_id; // Get inserted account ID

        // If user is a Driver, insert vehicle & license info
        if ($role === 'Driver' && !empty($vehicle) && !empty($license)) {
            $stmt2 = $con->prepare("INSERT INTO driver_details (accountID, vehicle, license) VALUES (?, ?, ?)");
            $stmt2->bind_param("iss", $accountID, $vehicle, $license);
            $stmt2->execute();
            $stmt2->close();
        }

        echo "<script>
                alert('Sign-up successful!');
                window.location.href = 'logIn.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen p-2 sm:p-3 md:p-4">
    <a href="logIn.php" class="absolute top-4 sm:top-5 left-2 sm:left-3 text-gray-300 hover:text-white transition-colors duration-200">
        <svg class="w-5 h-5 sm:w-5 sm:h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>

    <div class="bg-gray-800 p-4 sm:p-5 md:p-6 rounded-lg shadow-lg w-full max-w-xs sm:max-w-sm md:max-w-md mx-auto">
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold mb-4 sm:mb-5 text-center text-white">Sign Up</h2>
        <form action="SignUpForm.php" method="POST" class="space-y-3 sm:space-y-4">
            <div>
                <label for="username" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">Username</label>
                <input type="text" id="username" name="username" 
                    class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                    text-white text-xs sm:text-sm md:text-base" required>
            </div>

            <div>
                <label for="email" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">Email</label>
                <input type="email" id="email" name="email" 
                    class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                    text-white text-xs sm:text-sm md:text-base" required>
            </div>

            <div>
                <label for="password" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">Password</label>
                <input type="password" id="password" name="password" 
                    class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                    text-white text-xs sm:text-sm md:text-base" required>
            </div>

            <div>
                <label for="role" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">Role</label>
                <select id="role" name="role" onchange="toggleDriverFields()" 
                    class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                    focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                    text-white text-xs sm:text-sm md:text-base" required>
                    <option value="">Select Role</option>
                    <option value="Rider">Rider</option>
                    <option value="Driver">Driver</option>
                </select>
            </div>

            <div id="driverFields" style="display: none;" class="space-y-3 sm:space-y-4">
                <div>
                    <label for="vehicle" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">Vehicle Details</label>
                    <input type="text" id="vehicle" name="vehicle" 
                        class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                        focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                        text-white text-xs sm:text-sm md:text-base">
                </div>
                <div>
                    <label for="license" class="block text-gray-300 text-xs sm:text-sm md:text-base mb-1">License Number</label>
                    <input type="text" id="license" name="license" 
                        class="mt-1 block w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm 
                        focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                        text-white text-xs sm:text-sm md:text-base">
                </div>
            </div>

            <button type="submit" 
                class="w-full mt-4 sm:mt-5 text-xs sm:text-sm md:text-base 
                bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 
                text-white font-bold py-2 sm:py-2.5 px-3 sm:px-4 
                rounded-lg focus:ring-0 focus:outline-none 
                transform transition-all duration-200 hover:scale-105">
                Sign Up
            </button>
        </form>
    </div>
</body>
</html>