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
        <div id ="insideBlock">
            <div id ="pathheader">
                <p> <span id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </span> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> Applications </p>
            </div>
            <div id = "outer">
                <div id ="title">
                    <h1> Applicants </h1>
                </div>
                <hr>
                <div id = "tableHeader">
                    <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                    <h5> Applications </h5>
                </div>
                <table style="width:100%;">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Pasword</th>
                    </tr>
                    <tr class="tr-color">
                        <td>Jill</td>
                        <td>Smith</td>
                        <td>50</td>
                        <td>Smith</td>
                        <td>50</td>
                    </tr>
                    <tr class="tr-color">
                        <td>Eve</td>
                        <td>Jackson</td>
                        <td>94</td>
                        <td>Smith</td>
                        <td>50</td>
                    </tr>
                    <tr class="tr-color">
                        <td>Eve</td>
                        <td>Jackson</td>
                        <td>94</td>
                        <td>Smith</td>
                        <td>50</td>
                    </tr>
                </table>
            <div>
        </div>
    </body>
</html>

<?php include_once "footer.php"; ?>
