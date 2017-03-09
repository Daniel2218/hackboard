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
                    <p> <a href = "applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="applications.php"> Applications </a> </p>
                </div>
                <div id = "outer">
                    <div style="margin-bottom:30px">
                        <div id = "stat-box-1" class="hvr-grow statBox">
                            <i class="fa fa-files-o fa-2x" aria-hidden="true"></i>
                            Total: 10000
                        </div>
                        <div id = "stat-box-2" class="hvr-grow statBox">
                            <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>
                            Accepted: 5000
                        </div>
                        <div id = "stat-box-3" class="hvr-grow statBox">
                            <i class="fa fa-window-close fa-2x" aria-hidden="true"></i>
                            Declined: 5000
                        </div>
                        <div id = "stat-box-4" class="hvr-grow statBox">
                            <i class="fa fa-share fa-2x" aria-hidden="true"></i>
                            Skipped: 0
                        </div>
                    </div>
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
                            <td><a href="applicant.php">Jill</a></td>
                            <td><a href="applicant.php">Jill</a></td>
                            <td><a href="applicant.php">Jill</a></td>
                            <td><a href="applicant.php">Jill</a></td>
                            <td><a href="applicant.php">Jill</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once "footer.php"; ?>
    </body>
</html>

<?php include_once "footer.php"; ?>
