<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <link rel="stylesheet" type="text/css" href="css/applicant.css">
        <link rel="stylesheet" type="text/css" href="css/schedule.css">
    </head>

    <body>
        <div id = "push">
            <div id ="insideBlock">
                <div id ="pathheader">
                    <p> <span id = "spn-grey"> <i class="fa fa-home" id = "i-space-1" aria-hidden="true"></i> Home </span> <i class="fa fa-angle-right" id ="i-space-2" saria-hidden="true"></i> Applications </p>
                </div>
                <div id = "outer">
                    <div id ="title">
                        <h1> Schedule </h1>
                    </div>
                    <hr>
                    <div id = "tableHeader">
                        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
                        <h5> Schedule </h5>
                        <button id ="add-spons" onclick="addEvent()"> <i class="fa fa-plus" aria-hidden="true"></i> Add new event </button>
                    </div>
                    <div id = "left-justify"> Drag Events to the calender </div>
                    <div id = "eventContainer"> </div>

                    <div id = "scheduleContainer">
                        <div id = "viewPanel">
                            <div>
                                <p> month </p>
                            </div>
                            <div>
                                <p> week </p>
                            </div>
                            <div>
                                <p> day </p>
                            </div>
                        </div>
                        <div id = "scheduleNav">
                            <i id = "i-left" class="fa fa-caret-left" aria-hidden="true"></i>
                            <span> March 2017 <span>
                            <i id = "i-right" class="fa fa-caret-right" aria-hidden="true"></i>
                        </div>
                        <table style="width:100%;">
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thur</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                            <tr>
                                <td> 26</td>
                                <td> 27</td>
                                <td> 28</td>
                                <td> 1</td>
                                <td> 2</td>
                                <td> 3</td>
                                <td> 4</td>
                            </tr>
                            <tr>
                                <td> 26</td>
                                <td> 27</td>
                                <td> 28</td>
                                <td> 1</td>
                                <td> 2</td>
                                <td> 3</td>
                                <td> 4</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php include_once "footer.php"; ?>
            </div>
        </body>
    <script>
        function addEvent() {
            var div = document.createElement("div");
            div.innerHTML = "Event 1";
            div.style.background = "black";
            div.style.color = "white";
            div.style.display = "inline-block";
            div.style.padding = "2px 4px";
            div.style.fontSize = "12px";
            div.style.fontWeight = "bold";
            div.style.marginLeft = "5px";
            div.style.marginBottom = "5px";
            div.style.fontFamily = "Open Sans, sans-serif";
            div.draggable = "true";
            document.getElementById("eventContainer").appendChild(div);
        }
    </script>
</html>
