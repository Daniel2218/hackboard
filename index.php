<?php
    header("Cache-Control: no-cache, must-revalidate");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);
    mb_internal_encoding("UTF-8");

    include_once("controller/Controller.php");
    $controller = new Controller();
    $controller->invoke();
?>
