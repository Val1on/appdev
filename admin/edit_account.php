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
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Edit Account</h2>
    <form action="edit_account.php" method="POST">
        <input type="hidden" name="accountNO" value="<?php echo $account['accountNO']; ?>">
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $account['firstName']; ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $account['lastName']; ?>" required><br>
        <label>Middle Initial:</label>
        <input type="text" name="middleInitial" value="<?php echo $account['middleInitial']; ?>"><br>
        <label>Contact No:</label>
        <input type="text" name="contactNO" value="<?php echo $account['contactNO']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $account['email']; ?>" required><br>
        <label>Role:</label>
        <input type="text" name="role" value="<?php echo $account['role']; ?>" required><br>
        <label>Rating:</label>
        <input type="number" name="rating" value="<?php echo $account['rating']; ?>" required><br>
        <button type="submit">Update Account</button>
    </form>
    <a href="accounts_list.php">Back to Accounts</a>
</body>
</html>
