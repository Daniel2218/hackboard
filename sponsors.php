<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
    </head>

    <body>
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <a href="applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="sponsors.php"> Sponsors </a></p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Sponsors </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Sponsors </h5>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Add sponsor </button>
                    </div>
                    <table style="width:100%;">
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Donation Amount</th>
                            <th>Donation Recieved</th>
                        </tr>
                        <tr class="tr-color">
                            <td><a href="#">Daniel</a></td>
                            <td><a href="#">Lucia</a></td>
                            <td><a href="#">14dvl@queensu.ca</a></td>
                            <td><a href="#">41666166498</a></td>
                            <td><a href="#">100</a></td>
                            <td><a href="#">false</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php include_once "footer.php"; ?>
        </div>
    </body>
</html>
