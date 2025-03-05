<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addCarOwner($con);
}

function addCarOwner($con) {
    if (!isset($_POST["firstName"], $_POST["lastName"], $_POST["mi"], $_POST["contact"], $_POST["email"], $_POST["carId"])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        return;
    }

    $firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
    $mi = mysqli_real_escape_string($con, $_POST["mi"]);
    $contact = mysqli_real_escape_string($con, $_POST["contact"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $carID = mysqli_real_escape_string($con, $_POST["carId"]);

    $sql = "INSERT INTO carowner (firstName, lastName, middleInitial, contactNO, email, carID) 
            VALUES ('$firstName', '$lastName', '$mi', '$contact', '$email', '$carID')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Car owner added successfully!');
                window.location.href = 'carowner.php';
              </script>";
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/color.css">
</head>

<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="" class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Add New Car Owner</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                            <!-- First Name -->
                            <div class="relative">
                                <label for="firstName" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    First Name
                                </label>
                                <input type="text" name="firstName" id="firstName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Last Name -->
                            <div class="relative">
                                <label for="lastName" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Last Name
                                </label>
                                <input type="text" name="lastName" id="lastName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Middle Initial -->
                            <div class="relative">
                                <label for="mi" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    MI
                                </label>
                                <input type="text" name="mi" id="mi" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Contact -->
                            <div class="relative">
                                <label for="contact" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Contact
                                </label>
                                <input type="text" name="contact" id="contact" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Email -->
                            <div class="relative">
                                <label for="email" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Car ID -->
                            <div class="relative">
                                <label for="carId" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Car ID
                                </label>
                                <input type="text" name="carId" id="carId" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="window.location.href='carowner.php'" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Add Car Owner
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>