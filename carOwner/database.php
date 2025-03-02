<?php
    $host = '127.0.0.1';    
    $user = 'root';
    $password = '';
    $db = 'carpoolv2';
    $con = mysqli_connect($host, $user, $password, $db);

    if(!$con){
        die(mysqli_error());
    }
?>
