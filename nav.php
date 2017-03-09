<?php header("Cache-Control: no-cache, must-revalidate"); ?>

<html>
    <head>
        <script src="https://use.fontawesome.com/8de37c3432.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/navStyle.css">
        <title>Dashboard</title
    </head>

    <body>
        <div id = "nav">
            <div id="top-half">
                <div id="inner-top-half">
                    <a target="_blank" href="http://qhacks.io/"><img src="img/logo.png" alt="myHackathon logo" class="hvr-grow" ></a>
                    Qhacks<span style = "font-weight:bold"> Admin </span>
                </div>
            </div>
            <ul>
                <li id ="applications"><a href="applications.php"> <i class="fa fa-files-o" aria-hidden="true"></i> <span>Applications</span></a> </li>
                <li id ="users"><a href="users.php"> <i class="fa fa-users" aria-hidden="true"></i> <span>Users</span></a> </li>
                <li id ="sponsors"><a href="sponsors.php"> <i class="fa fa-university" aria-hidden="true"></i> <span>Sponsors</span></a> </li>
                <li id ="prizes"><a href="prizes.php"> <i class="fa fa-gift" aria-hidden="true"></i> <span>Prizes</span></a> </li>
                <li id ="schedule"><a href="schedule.php"> <i class="fa fa-calendar" aria-hidden="true"></i> <span>Schedule</span></a> </li>
            </ul>
        </div>

        <ul id = "header">
            <div class ="dropdown">
                <li class = "dropbtn"> <i class="fa fa-address-book" aria-hidden="true"></i> <span> Welcome User </span> <i class="fa fa-angle-down" aria-hidden="true"></i></li>
                <div class="dropdown-content">
                    <div> <a href="#"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></div>
                    <div> <a href="#"><i class="fa fa-level-up" aria-hidden="true"></i> Logout</a></div>
                </div>
            </div>
            <div class ="dropdown div-size-2">
                <li class = "dropbtn"> <i class="fa fa-envelope-o" aria-hidden="true"></i> <span> Messages </span> <i class="fa fa-angle-down" aria-hidden="true"></i> </li>
                <div class="dropdown-content">
                    <div> <a href="#">Link 1</a> </div>
                    <div> <a href="#">Link 2</a> </div>
                    <div> <a href="#">Link 3</a> </div>
                </div>
            </div>
            <div class ="dropdown div-size-1">
                <li class = "dropbtn">
                    <a href="default.asp"> <i class="fa fa-cog" aria-hidden="true"></i><span> Settings </span> </a>
                </li>
            </div>
            <div class ="dropdown div-size-1">
                <li class = "dropbtn"><a href="default.asp"><i class="fa fa-level-up" aria-hidden="true"></i> <span> Logout </span> </a></li>
            </div>
        </ul>
    </body>

    <script>
        function addLoadEvent(func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function() {
                    if (oldonload) {
                        oldonload();
                    }
                    func();
                }
            }
        }
        addLoadEvent(function () {
            var fileName = location.pathname.replace("/myhackathon/", "");
            fileName = fileName.replace(".php", "");
            var li = document.getElementById(fileName);
            li.id = "makeVisted";
        });
    </script>
    <script src="js/table.js"></script>
</html>
