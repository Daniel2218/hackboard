<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL & ~E_NOTICE);
    mb_internal_encoding("UTF-8");

    spl_autoload_register(function($class) {
    	include_once "classes/$class.php";
    });
    
    if (isset($_SESSION["email"]) == false) {
        header('location: /myHackathon/login.html');
    }
    else {

        $manager = new PageManager();
        $page = $manager->findPage(basename($_SERVER['PHP_SELF']));
        $fullName = $page->fullName;
        $name = $page->getStrippedName();
        $lowerName = $page->getStrippedNameLower();
        $shortName = $page->getShortName();
        $tableHeaders = $page->getTableHeaders();
        $iconName = $page->iconName;
        $previousPage = $page->previousPage;
    }
 ?>
