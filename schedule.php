<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/applicant.css">
        <link rel="stylesheet" type="text/css" href="css/schedule.css">
        <link rel="stylesheet" type="text/css" href="css/popUpBox.css">
    </head>

    <body>
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <a href = "applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="schedule.php"> Schedule </a></p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Schedule </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Schedule </h5>
                        <button id ="add-spons" onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Add new event </button>
                    </div>
                    <div id = "left-justify"> Drag Events to the calender </div>
                    <div id = "eventContainer"> </div>

                    <div id = "scheduleContainer">
                        <div id = "viewPanel">
                            <div id = "line"> </div>
                            <div class = "month" id = "noBottomBorder" onclick="changeView('month')"> <p> month </p> </div>
                            <div class = "week" onclick="changeView('week')"> <p> week </p> </div>
                            <div class = "day" onclick="changeView('day')"> <p> day </p> </div>
                        </div>
                        <div id = "scheduleNav">
                            <div class = "clickSpace" id = "i-left" onclick="arrow(true)">
                                <i class="fa fa-caret-left fa-lg" aria-hidden="true"></i>
                            </div>
                            <span id = "scedTitle"> March 2017 </span>
                            <div class = "clickSpace" id = "i-right" onclick="arrow(false)">
                                <i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "footer.php"; ?>
            </div>
            <?php include_once "popUpBox.php"; ?>
        </body>
    <script src = "schedule.js"> </script>
</html>
