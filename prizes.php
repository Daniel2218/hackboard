<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
    include_once "init.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/popUpBox.css">
    </head>

    <body>
        <?php include_once dirname(__FILE__) . "/table.php"; ?>
        <?php include_once dirname(__FILE__) . "/popUpBox.php"; ?>
        <?php include_once "footer.php"; ?>
    </body>
    <script src = "js/table.js"> </script>
</html>
