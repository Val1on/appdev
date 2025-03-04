<?php
require_once('database.php');

if (!isset($_GET['carID']) && !isset($_POST['update'])) {
    echo "<script>alert('No Car Selected!'); window.location.href='cars.php';</script>";
    exit;
}

if (isset($_GET['carID'])) {
    $carID = $_GET['carID'];

    $query = "SELECT * FROM cars WHERE carID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $carID);
    $stmt->execute();
    $result = $stmt->get_result();
    $carData = $result->fetch_assoc();

    if (!$carData) {
        echo "<script>alert('Car not found!'); window.location.href='cars.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $carID = $_POST['carID'];
    $carModel = $_POST['carModel'];
    $manufacturer = $_POST['manufacturer'];
    $plateNumber = $_POST['plateNumber'];
    $carOwnerId = $_POST['carOwnerId'];

    $updateQuery = "UPDATE cars SET carModel = ?, carManufacturer = ?, plateNum = ?, carOwnerID = ? WHERE carID = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("ssssi", $carModel, $manufacturer, $plateNumber, $carOwnerId, $carID);

    if ($stmt->execute()) {
        echo "<script>alert('Car details updated!'); window.location.href='cars.php';</script>";
    } else {
        echo "<script>alert('Update failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700 min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 shadow-xl rounded-lg overflow-hidden max-w-5xl w-full mx-2 p-2 sm:p-4 lg:p-6">
        <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
            <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Car Details</h2>
        </div>
        <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
            <form method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                <input type="hidden" name="carID" value="<?php echo $carData['carID']; ?>">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                    <div class="relative">
                        <label for="carModel" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Car Model
                        </label>
                        <input type="text" name="carModel" id="carModel" value="<?php echo htmlspecialchars($carData['carModel']); ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="manufacturer" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Manufacturer
                        </label>
                        <input type="text" name="manufacturer" id="manufacturer" value="<?php echo htmlspecialchars($carData['carManufacturer']); ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="plateNumber" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Plate Number
                        </label>
                        <input type="text" name="plateNumber" id="plateNumber" value="<?php echo htmlspecialchars($carData['plateNum']); ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="carOwnerId" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Car Owner ID
                        </label>
                        <input type="text" name="carOwnerId" id="carOwnerId" value="<?php echo htmlspecialchars($carData['carOwnerID']); ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                    <a href="cars.php" 
                        class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                        text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                        focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit" name="update" 
                        class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                        text-white bg-blue-600 rounded-md hover:bg-blue-700 
                        focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors duration-200">
                        Update Car
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>