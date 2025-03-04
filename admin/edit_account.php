<?php
include 'database.php'; 

if (isset($_GET['accountNO'])) {
    $accountNO = $_GET['accountNO'];
    $query = "SELECT * FROM account WHERE accountNO = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $accountNO);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $account = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNO = $_POST['accountNO'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleInitial = $_POST['middleInitial'];
    $contactNO = $_POST['contactNO'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $rating = $_POST['rating'];

    $updateQuery = "UPDATE account SET firstName=?, lastName=?, middleInitial=?, contactNO=?, email=?, role=?, rating=? WHERE accountNO=?";
    $stmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt, "sssssssi", $firstName, $lastName, $middleInitial, $contactNO, $email, $role, $rating, $accountNO);
    mysqli_stmt_execute($stmt);

    header("Location: accounts.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-700 min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 shadow-xl rounded-lg overflow-hidden max-w-5xl w-full mx-2 p-2 sm:p-4 lg:p-6">
        <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
            <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Account</h2>
        </div>
        <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
            <form action="edit_account.php" method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5">
                <input type="hidden" name="accountNO" value="<?php echo $account['accountNO']; ?>">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                    <div class="relative">
                        <label for="firstName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            First Name
                        </label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $account['firstName']; ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="lastName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Last Name
                        </label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $account['lastName']; ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="middleInitial" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Middle Initial
                        </label>
                        <input type="text" name="middleInitial" id="middleInitial" value="<?php echo $account['middleInitial']; ?>" 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="contactNO" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Contact No
                        </label>
                        <input type="text" name="contactNO" id="contactNO" value="<?php echo $account['contactNO']; ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="email" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="<?php echo $account['email']; ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                    <div class="relative">
                        <label for="role" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Role
                        </label>
                        <select name="role" id="role" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                            <option value="Admin" <?php echo $account['role'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="User" <?php echo $account['role'] == 'User' ? 'selected' : ''; ?>>User</option>
                        </select>
                    </div>
                    <div class="relative">
                        <label for="rating" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                            Rating
                        </label>
                        <input type="number" name="rating" id="rating" value="<?php echo $account['rating']; ?>" required 
                            class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                            bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                            focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                            focus:ring-opacity-50 transition-colors duration-200">
                    </div>
                </div>
                <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                    <a href="accounts.php" 
                        class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                        text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                        focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                        text-white bg-blue-600 rounded-md hover:bg-blue-700 
                        focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors duration-200">
                        Update Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>