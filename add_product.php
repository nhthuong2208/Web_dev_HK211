<?php
    require_once("./controller.php");
    $serverName = 'localhost';
    $userName   = 'root';
    $password   = '';
    $dbName     = 'Web_BD';
    // user pwf != "" => 
    $db = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$db) {
        die('Không thể kết nối: ' . mysqli_connect_error());
        exit();
    }
?>