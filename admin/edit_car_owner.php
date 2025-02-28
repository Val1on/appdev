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
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Edit Owner Profile</h2>
    <form method="POST">
        <input type="hidden" name="ownerNO" value="<?php echo $ownerData['ownerNO']; ?>">

        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo $ownerData['firstName']; ?>" required>

        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $ownerData['lastName']; ?>" required>

        <label>Contact No:</label>
        <input type="text" name="contactNO" value="<?php echo $ownerData['contactNO']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $ownerData['email']; ?>" required>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Back to Owners List</a>
    </form>
</body>
</html>
