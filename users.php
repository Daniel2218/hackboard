<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/popUpBox.css">
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
        <div id ="pop-up-box" tabindex="1" onkeydown="if(event.keyCode == 27) displayPopUpBox('none');">
            <div id = "top">
                <p id = "makeInline"> Add a new user </p>
                <i onclick="displayPopUpBox('none')" id = "floatRight" class="fa fa-times fa-lg" aria-hidden="true"></i>
            </div>
            <div id  = "middle">
                <div>
                    <p> Enter user first name: </p>
                    <input autofocus id = "pop-up-input" type="text" name="fname" onkeydown="if(event.keyCode == 13) addTableEntry();">
                </div>
                <div>
                    <p> Enter user last name: </p>
                    <input id = "pop-up-input" type="text" name="lname" onkeydown="if(event.keyCode == 13) addTableEntry();">
                </div>
                <div>
                    <p> Enter user email name: </p>
                    <input id = "pop-up-input" type="text" name="email" onkeydown="if(event.keyCode == 13) addTableEntry();">
                </div>
                <div>
                    <p> Enter user phone number: </p>
                    <input id = "pop-up-input" type="text" name="phone" onkeydown="if(event.keyCode == 13) addTableEntry();">
                </div>
                <div>
                    <p> Enter user's position: </p>
                    <input id = "pop-up-input" type="text" name="position" onkeydown="if(event.keyCode == 13) addTableEntry();">
                </div>
            </div>
            <div id = "bottom">
                <div id = "positionLeft">
                    <a class="pop-up-a" id = "add-event-btn" onclick="addTableEntry()" href="#"> Add User </a>
                    <a class="pop-up-a" id = "cancel-btn" onclick="displayPopUpBox('none')" href="#"> Cancel </a>
                </div>
            </div>
        </div>
        <div id ="screen"> </div>
    </body>
    <script src = "js/table.js"> </script>
</html>
