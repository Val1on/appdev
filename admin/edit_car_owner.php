<?php
require_once('database.php');

if (!isset($_GET['ownerNO']) && !isset($_POST['update'])) {
    echo "<script>alert('No Owner Selected!'); window.location.href='index.php';</script>";
    exit;
}

if (isset($_GET['ownerNO'])) {
    $ownerNO = $_GET['ownerNO'];

    $query = "SELECT * FROM carowner WHERE ownerNO = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $ownerNO);
    $stmt->execute();
    $result = $stmt->get_result();
    $ownerData = $result->fetch_assoc();

    if (!$ownerData) {
        echo "<script>alert('Owner not found!'); window.location.href='carowner.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $ownerNO = $_POST['ownerNO'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contactNO = $_POST['contactNO'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE carowner SET firstName = ?, lastName = ?, contactNO = ?, email = ? WHERE ownerNO = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("ssssi", $firstName, $lastName, $contactNO, $email, $ownerNO);

    if ($stmt->execute()) {
        echo "<script>alert('Owner profile updated!'); window.location.href='carowner.php';</script>";
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
    <title>Edit Owner Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>

    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
            <div id="" class="bg-green-600 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-green-600 bg-green-600">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Owner Profile</h2>
                </div>

                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <input type="hidden" name="ownerNO" value="<?php echo $ownerData['ownerNO']; ?>">
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                            <!-- First Name -->
                            <div class="relative">
                                <label for="firstName" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    First Name
                                </label>
                                <input type="text" name="firstName" id="firstName" value="<?php echo $ownerData['firstName']; ?>" required 
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
                                <input type="text" name="lastName" id="lastName" value="<?php echo $ownerData['lastName']; ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <!-- Contact -->
                            <div class="relative">
                                <label for="contactNO" class="block text-xs sm:text-sm lg:text-base font-medium text-white mb-1 sm:mb-2">
                                    Contact No
                                </label>
                                <input type="text" name="contactNO" id="contactNO" value="<?php echo $ownerData['contactNO']; ?>" required 
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
                                <input type="email" name="email" id="email" value="<?php echo $ownerData['email']; ?>" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-green-700 border border-green-600 text-green-100 placeholder-green-400 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-green-700 mt-3 sm:mt-4 lg:mt-5">
                            <a href="carowner.php" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-700 rounded-md hover:bg-green-600 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit" name="update" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-green-500 rounded-md hover:bg-green-700 
                                focus:outline-none focus:ring-1 focus:ring-green-500 transition-colors duration-200">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
