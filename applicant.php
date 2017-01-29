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
        <div id ="insideBlock">
            <div id ="pathheader">
                <p> <span id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </span> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> Applications </p>
            </div>
            <div id = "outer">
                <button id = "btn-skip"> Skip </button>
                <button id = "btn-decline"> Decline </button>
                <button id = "btn-accept"> Accept </button>
                <div id ="title">
                    <h1> Applicant: 1 </h1>
                </div>
                <hr>
                <div id = "tableHeader">
                    <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                    <h5> Applicant </h5>
                </div>
                <table style="width:100%;">
                    <tr class="tr-color">
                        <td><a href="#">First Name</a></td>
                        <td><a href="#">Daniel</a></td>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">Last Name</a></td>
                        <td><a href="#">Lucia</a></td>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">Email</a></td>
                        <td><a href="#">14dvl@queensu.ca</a></td>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">Phone</a></td>
                        <td><a href="#">416-616-6498</a></td>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">School</a></td>
                        <td><a href="#">Queen's University</a></td>
                    </tr>
                    <tr class="tr-color">
                        <td><a href="#">Shirt Size</a></td>
                        <td><a href="#">Large</a></td>
                    </tr>
                </table>
            <div>
        </div>
    </body>
</html>

<?php include_once "footer.php"; ?>
