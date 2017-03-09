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
                    <p> <a href="applications.php" id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </a> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> <a href="users.php"> Users </a></p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Users </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Users </h5>
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Add user </button>
                    </div>
                    <table style="width:100%;">
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Position</th>
                        </tr>
                        <tr class="tr-color">
                            <td><a href="#">Daniel</a></td>
                            <td><a href="#">Lucia</a></td>
                            <td><a href="#">Email</a></td>
                            <td><a href="#">4166166498</a></td>
                            <td><a href="#">Backend IT Coordinator</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php include_once "footer.php"; ?>
        </div>
        <script>
            function displayInput() {
                var input = document.getElementById("input");
                input.style.display= "block";
            }
        </script>
    </body>
</html>
