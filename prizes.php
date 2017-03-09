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
                        <button onclick="displayPopUpBox('block')"> <i class="fa fa-plus" aria-hidden="true"></i> Add new prize </button>
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
        <div id ="pop-up-box" tabindex="1" onkeydown="if(event.keyCode == 27) displayPopUpBox('none');">
            <div id = "top">
                <p id = "makeInline"> Add a new prize </p>
                <i onclick="displayPopUpBox('none')" id = "floatRight" class="fa fa-times fa-lg" aria-hidden="true"></i>
            </div>
            <div id  = "middle">
                <p> Enter prize name: </p>
                <input id = "pop-up-input" type="text" name="pname" onkeydown="if(event.keyCode == 13) addTableEntry();" autocorrect autocapitalize autofocus>
                <p> Enter event prize is for: </p>
                <input id = "pop-up-input" type="text" name="event" onkeydown="if(event.keyCode == 13) addTableEntry();" autocorrect autocapitalize>
                <p> How do you get it? </p>
                <input id = "pop-up-input" type="text" name="event" onkeydown="if(event.keyCode == 13) addTableEntry();" autocorrect autocapitalize>
                <p> Enter description of prize: </p>
                <textarea id = "pop-up-input" name="description" onkeydown="if(event.keyCode == 13) addTableEntry();" autocorrect autocapitalize></textarea>
            </div>
            <div id = "bottom">
                <div id = "positionLeft">
                    <a class="pop-up-a" id = "add-event-btn" onclick="addTableEntry()" href="#"> Add Prize </a>
                    <a class="pop-up-a" id = "cancel-btn" onclick="displayPopUpBox('none')" href="#"> Cancel </a>
                </div>
            </div>
        </div>
        <div id ="screen"> </div>
    </body>
    <script src = "js/table.js"> </script>
</html>
