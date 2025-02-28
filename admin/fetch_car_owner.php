<?php
require 'database.php';

if (isset($_GET['ownerNO'])) {
    $ownerNO = intval($_GET['ownerNO']);

    $query = "SELECT * FROM carowner WHERE ownerNO = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $ownerNO);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No record found"]);
    }
}
?>
