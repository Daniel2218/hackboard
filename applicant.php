<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/applicant.css">
    </head>

    <body>
        <?php include_once dirname(__FILE__) . "/table.php"; ?>
        <?php include_once "footer.php"; ?>
    </body>
    </body>
</html>
