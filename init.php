<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mb_internal_encoding("UTF-8");

    // do login check here


    spl_autoload_register(function($class) {
    	include_once "classes/$class.php";
    });

    $manager = new PageManager();
    $page = $manager->findPage(basename($_SERVER['PHP_SELF']));
    $fullName = $page->fullName;
    $name = $page->getStrippedName();
    $lowerName = $page->getStrippedNameLower();
    $shortName = $page->getShortName();
    $tableHeaders = $page->getTableHeaders();
    $iconName = $page->iconName;
    $previousPage = $page->previousPage;
 ?>
