<?php
    $host = '127.0.0.1';    
    $user = 'root';
    $password = '';
    $db = 'carpoolV2';
    $con = mysqli_connect($host, $user, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>
