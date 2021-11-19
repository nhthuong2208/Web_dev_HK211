<?php
session_start();
// Process URL from browser
require_once "./Function/App.php";

// How controllers call Views & Models
require_once "./Function/controller.php";

// Connect Database
require_once "./Function/DB.php";
$myApp = new App();
?>