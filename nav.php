<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "init.php";
?>

<html>
    <head>
        <script src="https://use.fontawesome.com/8de37c3432.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/navStyle.css">
        <title>Dashboard</title>
    </head>

    <body>
        <ul id = "header">
            <div id="top-half">
                <div id="inner-top-half">
                    <a target="_blank" href="http://qhacks.io/"><img src="img/logo.png" alt="myHackathon logo" class="hvr-grow" ></a>
                    Qhacks<span style = "font-weight:bold"> Admin </span>
                </div>
            </div>
            <div class ="dropdown" style ="border-left: 1px solid black;">
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
            <div id ="pathheader">
                <a href="applications.php" id = "spn-grey">
                     <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home
                 </a>
                 <?php
                    if($previousPage != "") {
                        echo '<i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i>';
                        echo "<a href='sponsors.php'> $previousPage </a>";
                    }
                 ?>
                 <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i>
                 <a href="sponsors.php"> <?php echo $name; ?> </a>
            </div>
        </ul>
    </body>
        <div id = "nav">
            <ul>
                <?php
                    foreach ($manager->pages as $doc) {
                        if($doc->fullName != "applicant.php") {
                            echo "<li id='$doc->lowerName'><a href='$doc->fullName'><i class='fa fa-$doc->iconName' aria-hidden='true'></i><span>$doc->strippedName</span></a></li>";
                        }
                    }
                 ?>
            </ul>
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/table.js"></script>
</html>
