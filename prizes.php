<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/applicant.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/prizes.css"> -->
    </head>

    <body>
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <a href="applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="prizes.php"> Prizes </a></p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Prizes </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Prizes </h5>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Add new event </button>
                    </div>
                    <table style="width:100%;">
                        <tr>
                            <th>Prize Name</th>
                            <th>Event</th>
                            <th>Description</th>
                        </tr>
                        <tr class="tr-color">
                            <td><a href="#">Google Cardboard</a></td>
                            <td><a href="#">Googe Event</a></td>
                            <td><a href="#">Win the 3rd place in google event to recieve this prize.</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php include_once "footer.php"; ?>
        </div>
    </body>
</html>
