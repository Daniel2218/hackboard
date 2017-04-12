<?php
    header("Cache-Control: no-cache, must-revalidate");
    include_once "nav.php";
    include_once "init.php";
    include_once dirname(__FILE__) . "/requests.php";

    $total = json_decode(getRequest("applications/total"), true)["result"][0]["overallApplicants"];
    $accepted = json_decode(getRequest("applications/accepted"), true)["result"]["total"];
    $declined = json_decode(getRequest("applications/declined"), true)["result"]["total"];
    $skipped = json_decode(getRequest("applications/skipped"), true)["result"]["total"];
    // $schools = json_decode(getRequest("applications/total"), true)["result"][0]["overallApplicants"];
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/application.css">
        <meta charset="UTF-8" />
        <meta name=viewport content='width=600'>
        <meta name="description" content="A dashboard for hackathons to help executive with logictics and planning. Currently, it only has an application review system."/>
        <meta name="keywords" content="Application Review System, Hackathon, Dashboard"/>
        <meta name="author" content="Daniel Lucia" />
        <meta name="copyright" content="Daniel Lucia" />
        <meta http-equiv="cache-control" content="no-cache"/>
    </head>

    <body>
        <div id = "outer">
            <div id = "outer-inner">
                <div id = "stat-box-1" class="hvr-grow statBox">
                    <i class="fa fa-files-o fa-2x" aria-hidden="true"></i>
                    Total: <?php echo $total; ?>
                </div>
                <div id = "stat-box-2" class="hvr-grow statBox">
                    <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>
                    Accepted: <?php echo $accepted; ?>
                </div>
                <div id = "stat-box-3" class="hvr-grow statBox">
                    <i class="fa fa-window-close fa-2x" aria-hidden="true"></i>
                    Declined: <?php echo $declined; ?>
                </div>
                <div id = "stat-box-4" class="hvr-grow statBox">
                    <i class="fa fa-share fa-2x" aria-hidden="true"></i>
                    Skipped: <?php echo $skipped; ?>
                </div>
            </div>
        </div>
        <?php include_once dirname(__FILE__) . "/table.php"; ?>
        <?php include_once "footer.php"; ?>
    </body>

    <script>
        function getApplicant(a){
            var value = a.parentElement.parentElement.childNodes[0].childNodes[0].innerHTML;

            $.ajax({
                url:"requests.php?endpoint=IDapplications?aid=" + value,
                type: 'get',
                success: function(applicant) {
                    // alert(applicant);
                    applicant = JSON.parse(applicant);
                    applicant = JSON.stringify(applicant.result[0]);
                    $.ajax({
                        url:"requests.php?endpoint=store&data=" + applicant,
                        type: 'get',
                        success: function(data) {
                            //  alert(data);
                             window.location.assign("http://localhost/myHackathon/applicant.php")
                        }
                    });
                }
            });
        }

        function searchByName(name) {
            $.ajax({
                url:"requests.php?endpoint=applications/searchName?name=\"" + name + "\"",
                type: 'get',
                success: function(data) {
                    addRow(data);
                }
            });
        }

        function searchByEmail(email) {
            $.ajax({
                url:"requests.php?endpoint=applications/searchEmail?email=\"" + email + "\"",
                type: 'get',
                success: function(data) {
                    addRow(data);
                }
            });
        }

        function addRow(data) {
            var result = JSON.parse(data).result;
            var table = document.getElementsByTagName("table")[0];
            var tbody = document.getElementsByTagName("tbody")[0];

            $('tr.tr-color').remove();

            result.forEach(function(searchResult){
                var tr = document.createElement("tr");
                tr.setAttribute("class", "tr-color");
                for (var property in searchResult) {
                    var td = document.createElement("td");
                    var a = document.createElement("a");
                    a.href = "applicant.php";
                    var textNode = document.createTextNode(searchResult[property]);
                    a.appendChild(textNode);
                    td.appendChild(a);
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            });
        }
    </script>
</html>
