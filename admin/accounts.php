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
</head>

<body class="bg-gray-700">
    <?php include '../includes/sidebar.php'; ?>


    <div class="lg:ml-64 p-4">
        <div class="container mx-auto px-2 sm:px-4 lg:px-6 py-4 sm:py-6 lg:py-8">
   
            <div id="tableView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden">
                <div class="px-4 sm:px-6 py-4 border-b border-gray-700">
                    <h2 class="text-lg sm:text-xl font-semibold text-white">Account Management</h2>
                </div>

                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-800">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-800">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Account No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">First Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Last Name</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">MI</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Contact No</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Email</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Role</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs sm:text-sm font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            <?php foreach ($accounts as $row): ?>
                                <tr class="hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['accountNO']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['firstName']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['lastName']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['middleInitial']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['contactNO']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-300"><?php echo $row['email']; ?></td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-300">
                                            <?php echo $row['role']; ?>
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm font-medium">
                                        <a href="edit_account.php?accountNO=<?php echo $row['accountNO']; ?>" class="text-blue-400 hover:text-blue-300 mr-3 text-xs sm:text-sm">Edit</a>
                                        <button class="text-red-400 hover:text-red-300 text-xs sm:text-sm">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
             
                <div class="px-4 sm:px-6 py-4 border-t border-gray-700">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-2 sm:space-y-0">
                        <button class="w-full sm:w-auto bg-blue-600 text-white px-4 py-2 rounded-md text-xs sm:text-sm font-medium hover:bg-blue-700 transition-colors duration-200">
                            Add New Account
                        </button>
                        <div class="text-xs sm:text-sm text-gray-400">
                            Showing 1 to 1 of 1 entries
                        </div>
                    </div>
                </div>
            </div>

            <div id="formView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
       
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Add New Account</h2>
                </div>
                
  
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                <form id="accountForm" method="POST" class="space-y-3 sm:space-y-4 lg:space-y-5" action="create_account.php" >
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                       
                            <div class="relative">
                                <label for="firstName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    First Name
                                </label>
                                <input type="text" name="firstName" id="firstName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                          
                            <div class="relative">
                                <label for="lastName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Last Name
                                </label>
                                <input type="text" name="lastName" id="lastName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                        
                            <div class="relative">
                                <label for="mi" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    MI
                                </label>
                                <input type="text" name="mi" id="mi" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                            <div class="relative">
                                <label for="contact" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Contact
                                </label>
                                <input type="text" name="contact" id="contact" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                      
                            <div class="relative">
                                <label for="email" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" required 
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
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="toggleView()" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                                focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-white bg-blue-600 rounded-md hover:bg-blue-700 
                                focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors duration-200">
                                Save Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div id="editFormView" class="bg-gray-800 shadow-xl rounded-lg overflow-hidden hidden max-w-5xl mx-auto p-2 sm:p-4 lg:p-6">
            
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5 border-b border-gray-700">
                    <h2 class="text-base sm:text-lg lg:text-xl font-semibold text-white">Edit Account</h2>
                </div>
                
      
                <div class="px-3 sm:px-4 lg:px-6 py-3 sm:py-4 lg:py-5">
                    <form id="editAccountForm" class="space-y-3 sm:space-y-4 lg:space-y-5">
                        <input type="hidden" id="editAccountId">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                     
                            <div class="relative">
                                <label for="editFirstName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    First Name
                                </label>
                                <input type="text" name="editFirstName" id="editFirstName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                          
                            <div class="relative">
                                <label for="editLastName" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Last Name
                                </label>
                                <input type="text" name="editLastName" id="editLastName" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

                      
                            <div class="relative">
                                <label for="editMI" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    MI
                                </label>
                                <input type="text" name="editMI" id="editMI" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

             
                            <div class="relative">
                                <label for="editContact" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Contact
                                </label>
                                <input type="text" name="editContact" id="editContact" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>

               
                            <div class="relative">
                                <label for="editEmail" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Email
                                </label>
                                <input type="email" name="editEmail" id="editEmail" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                            </div>


                            <div class="relative">
                                <label for="editRole" class="block text-xs sm:text-sm lg:text-base font-medium text-gray-300 mb-1 sm:mb-2">
                                    Role
                                </label>
                                <select name="editRole" id="editRole" required 
                                    class="block w-full px-2 sm:px-3 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base rounded-md 
                                    bg-gray-700 border border-gray-600 text-gray-100 placeholder-gray-400 
                                    focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 
                                    focus:ring-opacity-50 transition-colors duration-200">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>


                        <div class="flex justify-end space-x-2 sm:space-x-3 lg:space-x-4 pt-3 sm:pt-4 lg:pt-5 border-t border-gray-700 mt-3 sm:mt-4 lg:mt-5">
                            <button type="button" onclick="toggleEditView()" 
                                class="px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm lg:text-base font-medium 
                                text-gray-300 bg-gray-700 rounded-md hover:bg-gray-600 
                                focus:outline-none focus:ring-1 focus:ring-gray-500 transition-colors duration-200">
                                Cancel
                            </button>
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
        </div>
    </div>

    <script>
        
    document.querySelector('.bg-blue-600').onclick = toggleView;
   
    document.querySelectorAll('.text-blue-400').forEach(button => {
        button.onclick = toggleEditView;
    });


    function toggleView() {
        const tableView = document.getElementById('tableView');
        const formView = document.getElementById('formView');
        
        tableView.classList.toggle('hidden');
        formView.classList.toggle('hidden');
    }


    function toggleEditView() {
        const tableView = document.getElementById('tableView');
        const editFormView = document.getElementById('editFormView');
        
        tableView.classList.toggle('hidden');
        editFormView.classList.toggle('hidden');
    }

    </script>
</body>
</html>