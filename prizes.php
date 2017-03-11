<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
    include_once "init.php";

    $name = Page::getName();
    $shortName = Page::getShortName();
    $tableHeaders = Page::getTableHeaders();
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/popUpBox.css">
    </head>

    <body>
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <a href="applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="prizes.php"> Prizes </a></p>
                </div>
                <div id = "outer">
                    <?php include_once dirname(__FILE__) . "/table.php"; ?>
                </div>
            </div>
            <?php include_once "footer.php"; ?>
        </div>
        <?php include_once dirname(__FILE__) . "/popUpBox.php"; ?>
    </body>
    <script src = "js/table.js"> </script>
</html>
