<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
    include_once "init.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <meta charset="UTF-8" />
        <meta name=viewport content='width=600'>
        <meta name="description" content="A dashboard for hackathons to help executive with logictics and planning. Currently, it only has an application review system."/>
        <meta name="keywords" content="Application Review System, Hackathon, Dashboard"/>
        <meta name="author" content="Daniel Lucia" />
        <meta name="copyright" content="Daniel Lucia" />
        <meta http-equiv="cache-control" content="no-cache"/>
    </head>

    <body>
        <div id = "outer">
            <div id = "outer-inner">
                <div id = "stat-box-1" class="hvr-grow statBox">
                    <i class="fa fa-files-o fa-2x" aria-hidden="true"></i>
                    Total: 10000
                </div>
                <div id = "stat-box-2" class="hvr-grow statBox">
                    <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>
                    Accepted: 5000
                </div>
                <div id = "stat-box-3" class="hvr-grow statBox">
                    <i class="fa fa-window-close fa-2x" aria-hidden="true"></i>
                    Declined: 5000
                </div>
                <div id = "stat-box-4" class="hvr-grow statBox">
                    <i class="fa fa-share fa-2x" aria-hidden="true"></i>
                    Skipped: 0
                </div>
            </div>
        </div>
        <?php include_once dirname(__FILE__) . "/table.php"; ?>
    </body>
</html>
