<?php
    header("Cache-Control: no-cache, must-revalidate");
    session_start();
    include_once dirname(__FILE__) . "/init.php";
?>

<html>
    <head>
        <script src="https://use.fontawesome.com/8de37c3432.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/popUpBox.css">
        <link rel="stylesheet" type="text/css" href="css/navStyle.css">
        <title>Dashboard</title>
    </head>

    <body>
        <?php
            include_once "nav.php";
            include_once dirname(__FILE__) . "/table.php";
            include_once dirname(__FILE__) . "/popUpBox.php";
            include_once "footer.php";
        ?>
    </body>
    <script src = "js/table.js"> </script>
</html>
