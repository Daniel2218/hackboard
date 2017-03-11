<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mb_internal_encoding("UTF-8");

    spl_autoload_register(function($class) {
    	include_once "classes/$class.php";
    });
?>
