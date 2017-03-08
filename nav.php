<?php header("Cache-Control: no-cache, must-revalidate"); ?>

<html>
    <head>
        <script src="https://use.fontawesome.com/8de37c3432.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/navStyle.css">
        <title>Dashboard</title>
    </head>

    <body>
        <div id = "nav">
            <div id="top-half">
                <div id="inner-top-half">
                    <a target="_blank" href="http://qhacks.io/"><img src="img/logo.png" alt="myHackathon logo" class="hvr-grow" ></a>
                    <h1> QHacks <span style = "font-weight:bold"> Exec </span></h1>
                </div>
            </div>
            <ul>
                <li><a href="applications.php"> <i class="fa fa-file" aria-hidden="true"></i> <span>Applications</span></a> </li>
                <li><a href="users.php"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Users</span></a> </li>
                <li><a href="sponsors.php"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Sponsors</span></a> </li>
                <li><a href="#"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Prizes</span></a> </li>
                <li><a href="schedule.php"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Schedule</span></a> </li>
            </ul>
        </div>

        <ul id = "header">
            <div class ="dropdown">
                <li class = "dropbtn"><a href="default.asp"> <i class="fa fa-address-book" aria-hidden="true"></i> Welcome User <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                <div class="dropdown-content">
                    <div> <a href="#"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></div>
                    <div> <a href="#"><i class="fa fa-level-up" aria-hidden="true"></i> Logout</a></div>
                </div>
            </div>
            <div class ="dropdown div-size-2">
                <li class = "dropbtn"><a href="default.asp"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Messages <i class="fa fa-angle-down" aria-hidden="true"></i> </a></li>
                <div class="dropdown-content">
                    <div> <a href="#">Link 1</a> </div>
                    <div> <a href="#">Link 2</a> </div>
                    <div> <a href="#">Link 3</a> </div>
                </div>
            </div>
            <div class ="dropdown div-size-1">
                <li class = "dropbtn">
                    <a href="default.asp"> <i class="fa fa-cog" aria-hidden="true"></i> Settings </a>
                </li>
            </div>
            <div class ="dropdown div-size-1">
                <li class = "dropbtn"><a href="default.asp"><i class="fa fa-level-up" aria-hidden="true"></i> Logout</a></li>
            </div>
        </ul>
    </body>
</html>
