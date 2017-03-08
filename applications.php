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
            <?php include_once "footer.php"; ?>
        </div>
    </body>
</html>

<?php include_once "footer.php"; ?>
