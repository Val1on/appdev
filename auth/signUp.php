<?php
session_start();
require 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    $vehicle = isset($_POST['vehicle']) ? trim($_POST['vehicle']) : NULL;
    $license = isset($_POST['license']) ? trim($_POST['license']) : NULL;
    
    // Input validation
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        die("All fields are required.");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and insert user data
    $stmt = $conn->prepare("INSERT INTO account (email, role, feedbackNO, rating, reportNO) VALUES (?, ?, 0, 0, 0)");
    $stmt->bind_param("ss", $email, $role);
    
    if ($stmt->execute()) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
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
    <script>
        function toggleDriverFields() {
            var role = document.getElementById('role').value;
            var driverFields = document.getElementById('driverFields');
            if (role === 'Driver') {
                driverFields.style.display = 'block';
            } else {
                driverFields.style.display = 'none';
            }
        }

        let currentStep = 1;
        const totalSteps = 4;

        function showStep(step) {

            for(let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step${i}`).style.display = 'none';
            }

            document.getElementById(`step${step}`).style.display = 'block';
            

            if (step === 1) {
                document.getElementById('prevBtn').style.display = 'none';
            } else {
                document.getElementById('prevBtn').style.display = 'block';
            }

            if (step === totalSteps) {
                document.getElementById('nextBtn').style.display = 'none';
                document.getElementById('submitBtn').style.display = 'block';
            } else {
                document.getElementById('nextBtn').style.display = 'block';
                document.getElementById('submitBtn').style.display = 'none';
            }
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }


        window.onload = function() {
            showStep(1);
        };
    </script>


</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen p-4">

    <a href="logIn.php" class="absolute top-6 left-4 text-gray-300 hover:text-white transition-colors duration-200">
     
        <svg class="w-6 h-6 md:w-7 md:h-7 lg:w-8 lg:h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </a>

    <div class="bg-gray-800 p-6 md:p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl md:text-2xl font-bold mb-6 text-center text-white">Sign Up</h2>
        <form action="submitSignUp.php" method="POST">
            <!-- Step 1: Username -->
            <div id="step1">
                <div class="mb-4">
                    <label for="username" class="block text-gray-300 text-sm md:text-base">Username</label>
                    <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base" required>
                </div>
            </div>

            <!-- Step 2: Email -->
            <div id="step2" style="display: none;">
                <div class="mb-4">
                    <label for="email" class="block text-gray-300 text-sm md:text-base">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base" required>
                </div>
            </div>

            <!-- Step 3: Password -->
            <div id="step3" style="display: none;">
                <div class="mb-4">
                    <label for="password" class="block text-gray-300 text-sm md:text-base">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base" required>
                </div>
            </div>

            <!-- Step 4: Role and Driver Fields -->
            <div id="step4" style="display: none;">
                <div class="mb-4">
                    <label for="role" class="block text-gray-300 text-sm md:text-base">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base" onchange="toggleDriverFields()" required>
                        <option value="">Select Role</option>
                        <option value="Rider">Rider</option>
                        <option value="Driver">Driver</option>
                    </select>
                </div>
                <div id="driverFields" style="display: none;">
                    <div class="mb-4">
                        <label for="vehicle" class="block text-gray-300 text-sm md:text-base">Vehicle Details</label>
                        <input type="text" id="vehicle" name="vehicle" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base">
                    </div>
                    <div class="mb-4">
                        <label for="license" class="block text-gray-300 text-sm md:text-base">License Number</label>
                        <input type="text" id="license" name="license" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-white text-sm md:text-base">
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-6 gap-4">
                <button 
                    type="button" 
                    id="prevBtn" 
                    onclick="prevStep()" 
                    class="flex-1 text-xs sm:text-sm md:text-base bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg focus:ring-0 focus:outline-none transform transition-all duration-200 hover:scale-105"
                >
                    Back
                </button>
                <button 
                    type="button" 
                    id="nextBtn" 
                    onclick="nextStep()" 
                    class="flex-1 text-xs sm:text-sm md:text-base bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg focus:ring-0 focus:outline-none transform transition-all duration-200 hover:scale-105"
                >
                    Next
                </button>
                <button 
                    type="submit" 
                    id="submitBtn" 
                    style="display: none;" 
                    class="flex-1 text-xs sm:text-sm md:text-base bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg focus:ring-0 focus:outline-none transform transition-all duration-200 hover:scale-105"
                >
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</body>
</html>