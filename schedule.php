<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/applicant.css">
        <link rel="stylesheet" type="text/css" href="css/sponsors.css">
    </head>

    <body>
        <div id ="insideBlock">
            <div id ="pathheader">
                <p> <span id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </span> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> Applications </p>
            </div>
            <div id = "outer">
                <button id ="add-spons"> <i class="fa fa-plus" aria-hidden="true"></i> Add Event </button>
                <div id ="title">
                    <h1> Schedule </h1>
                </div>
                <hr>
                <div id = "tableHeader">
                    <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                    <h5> Schedule </h5>
                </div>
                <table style="width:100%;">
                    <!-- <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">Daniel</a></td>
                        <td><a href="#">Lucia</a></td>
                        <td><a href="#">14dvl@queensu.ca</a></td>
                    </tr> -->
                </table>
            <div>
        </div>
    </body>
</html>

<?php include_once "footer.php"; ?>
