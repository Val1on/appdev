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
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Edit Car Details</h2>
    <form method="POST">
        <input type="hidden" name="carID" value="<?php echo $carData['carID']; ?>">

        <label>Car Model:</label>
        <input type="text" name="carModel" value="<?php echo htmlspecialchars($carData['carModel']); ?>" required>

        <label>Manufacturer:</label>
        <input type="text" name="manufacturer" value="<?php echo htmlspecialchars($carData['carManufacturer']); ?>" required>

        <label>Plate Number:</label>
        <input type="text" name="plateNumber" value="<?php echo htmlspecialchars($carData['plateNum']); ?>" required>

        <label>Car Owner ID:</label>
        <input type="text" name="carOwnerId" value="<?php echo htmlspecialchars($carData['carOwnerID']); ?>" required>

        <button type="submit" name="update">Update Car</button>
        <a href="cars.php">Back to Car List</a>
    </form>
</body>
</html>
