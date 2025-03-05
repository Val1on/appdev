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
<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="" class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Car Details</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <input type="hidden" name="carID" value="<?php echo $carData['carID']; ?>">
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                            <!-- Car Model -->
                            <div class="relative">
                                <label for="carModel" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Car Model
                                </label>
                                <input type="text" name="carModel" id="carModel" value="<?php echo htmlspecialchars($carData['carModel']); ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Manufacturer -->
                            <div class="relative">
                                <label for="manufacturer" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Manufacturer
                                </label>
                                <input type="text" name="manufacturer" id="manufacturer" value="<?php echo htmlspecialchars($carData['carManufacturer']); ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Plate Number -->
                            <div class="relative">
                                <label for="plateNumber" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Plate Number
                                </label>
                                <input type="text" name="plateNumber" id="plateNumber" value="<?php echo htmlspecialchars($carData['plateNum']); ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Car Owner ID -->
                            <div class="relative">
                                <label for="carOwnerId" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Car Owner ID
                                </label>
                                <input type="text" name="carOwnerId" id="carOwnerId" value="<?php echo htmlspecialchars($carData['carOwnerID']); ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <a href="cars.php" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit" name="update" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Update Car
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>