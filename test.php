<?php
    spl_autoload_register(function($class) {
        include_once "classes/$class.php";
    });

    $manager = new PageManager();
    // $manager::console_log("ehllo");
    $page = $manager->findPage(Page::getFullName());
    // echo Page::output($page->fullName);
 ?>
