<?php
require_once ('database.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "create":
                createAccount($con);
                break;
            case "update":
                updateAccount($con);
                break;
            case "delete":
                deleteAccount($con);
                break;
        }
    }
} 


$accounts = fetchAccounts($con);

function fetchAccounts($con) {
    $sql = "SELECT * FROM account";
    $result = mysqli_query($con, $sql);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function createAccount($con) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $mi = $_POST["mi"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    $sql = "INSERT INTO account (firstName, lastName, middleInitial, contactNO, email, role) 
            VALUES ('$firstName', '$lastName', '$mi', '$contact', '$email', '$role')";

    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
    exit;
}

function updateAccount($con) {
    $accountNO = $_POST["accountNO"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $mi = $_POST["mi"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    $sql = "UPDATE account SET 
                firstName='$firstName', 
                lastName='$lastName', 
                middleInitial='$mi', 
                contactNO='$contact', 
                email='$email', 
                role='$role'
            WHERE accountNO='$accountNO'";

    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
    exit;
}

function deleteAccount($con) {
    $accountNO = $_POST["accountNO"];
    $sql = "DELETE FROM account WHERE accountNO='$accountNO'";

    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/color.css">
    
</head>

<body class="bg-white">
    <?php include '../includes/sidebar.php'; ?>


    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
   
            <div id="tableView" class="bg-green-600 shadow-xl rounded-lg overflow-hidden">
                <div class="px-4 sm:px-6 py-4 border-b border-green-700 bg-green-600">
                    <h2 class="text-lg sm:text-xl font-semibold text-white">Account Management</h2>
                </div>

                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-green-700 scrollbar-track-gray-800">
                    <table class="min-w-full divide-y divide-green-700">
                        <thead class="bg-green-600">
                            <tr00
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Account No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">First Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Last Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">MI</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Contact No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Email</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Role</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-green-600 divide-y divide-green-700">
                            <?php foreach ($accounts as $row): ?>
                                <tr class="hover:bg-green-700 transition-colors duration-200">
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['accountNO']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['firstName']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['lastName']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['middleInitial']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['contactNO']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-white"><?php echo $row['email']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-300">
                                            <?php echo $row['role']; ?>
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                        <a href="edit_account.php?accountNO=<?php echo $row['accountNO']; ?>" class="text-green-100 hover:text-green-300 mr-3 text-xs sm:text-sm">Edit</a>
                                        <button class="text-red-800 hover:text-red-900 text-xs sm:text-sm">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
             
                <div class="px-4 sm:px-6 py-4 border-t border-green-700 bg-green-600">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <a href="create_account.php" class="w-full sm:w-auto bg-green-500 text-white px-4 py-2 rounded-md text-xs sm:text-sm font-medium hover:bg-green-700 transition-colors duration-200">
                            Add New Account
                        </a>
                        
                    </div>
                </div>
            </div>




</body>
</html>