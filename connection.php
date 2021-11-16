<?php
    require_once("./controller.php");
    $user_post = $_POST['user'];
    $pwd_post = $_POST['password'];

    $serverName = 'localhost';
    $userName   = 'root';
    $password   = '';
    $dbName     = 'Web_BD';
    $db = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$db) {
        die('Không thể kết nối: ' . mysqli_connect_error());
        exit();
    }
    $get_db = null;
    function get_user($user_post, $pwd_post){
        global $db;
        $query = "SELECT `ACCOUNT`.`USERNAME` AS `user`, `ACCOUNT`.`PWD` AS `pwd` FORM `ACCOUNT` WHERE `user`  = \"" . $user_post . "\" AND `pwd` = \"" . $pwd_post . "\"";
        return mysqli_query( $db, $query);
    } // member
    $get_db = get_user($user_post, $pwd_post);
    mysqli_close($db);
    if($get_db != null){
        $user = $get_db['user'];
        $pwd = $get_db['pwd'];//home -> cart -> login -> 
    }
    else{
        if($user_post == "admin" && $pwd_post == "admin"){
            $user = "admin";
            $pwd = "admin";
            header("location: http://localhost:port/login");
        }
    }
    header("location: http://localhost:port/login");
?>