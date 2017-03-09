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
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <a href ="applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="applications.php"> Applications </a>
                    <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="applicant.php"> Applicants </a></p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Applicant: 1 </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Applicant </h5>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Accept </button>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Decline </button>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Skip </button>
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
                </div>
            </div>
            <?php include_once "footer.php"; ?>
        </div>
    </body>
</html>
