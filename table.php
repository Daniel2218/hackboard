<?php
    include_once dirname(__FILE__) . "/requests.php";
?>
<div class = "tableSection">
    <div id ="title">
        <h1> <?php echo $name;?> </h1>
    </div>
    <hr>
    <div id = "tableHeader">
        <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
        <h5> <?php echo $name;?> </h5>
        <?php
            if($name != "Applications") {
                if($name == "Applicant") {
                    echo "<button onclick=\"set_status('decline')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Decline
                          </button>";
                    echo "<button onclick=\"set_status('skip')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Skip
                          </button>";
                    echo "<button onclick=\"set_status('accept')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Accept
                          </button>";
                } if ($name == "Sponsors") {
                    echo "<button style='width:125px;' onclick=\"displayPopUpBox('block')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                        "</button>";
                }else {
                    echo "<button onclick=\"displayPopUpBox('block')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                        "</button>";
                }
            } else {
                echo "<input type='text' name='name' placeholder='Name'
                        onkeydown='if(event.keyCode == 13) {
                            searchByName(document.getElementsByName(\"name\")[0].value);
                        }'>";
                echo "<input type='text' name='email' placeholder='Email'
                        onkeydown='if(event.keyCode == 13) {
                            searchByEmail(document.getElementsByName(\"email\")[0].value);
                        }'>";
            }
        ?>
    </div>
    <script>
    function set_status(action) {
        $.ajax({
            url:  "api/applications/" + action,
            data: { id: <?php echo $_SESSION['applicant']['aid']; ?> },
            type: 'post',
            success: function(data) {
                window.location.replace("applications.php");
            }
        });
    }
    </script>
    <table>
        <tr>
            <?php
                foreach ($tableHeaders as $header) {
                    echo "<th>" .$header . "</th>";
                }
            ?>
        </tr>
        <!-- <tr class="tr-color">
            <td contenteditable><a href="#">Daniel</a></td>
            <td contenteditable><a href="#">Lucia</a></td>
            <td contenteditable><a href="#">14dvl@queensu.ca</a></td>
            <td contenteditable><a href="#">41666166498</a></td>
            <td contenteditable><a href="#">100</a></td>
            <td contenteditable><a href="#">false</a></td>
        </tr> -->

        <?php
        switch($name) {
            case "Applications":
                $results = json_decode(getRequest("applications"), true);
                addEntries($results,false);
                break;
            case "Users":
                $results = json_decode(getRequest("users"),true);
                addEntries($results,true);
                break;
            case "Sponsors":
                $results = json_decode(getRequest("sponsors"),true);
                addEntries($results,true);
                break;
            case "Prizes":
                $results = json_decode(getRequest("prizes"),true);
                addEntries($results,true);
                break;
            case "applicants":
                $results = json_decode(getRequest(""),true);
                addEntries($results,true);
                break;
            case "Applicant":
                foreach ($_SESSION['applicant'] as $key => $value) {
                    echo "<td><a href='#'>$value</a></td>";
                }
                break;
            default:
                echo "Page does not exist";
        }

        function addEntries($rows, $edit) {
            global $name;
            foreach($rows["result"] as $row) {
                $length = sizeof($row);
                $i = 1;
                echo '<tr class="tr-color">';

                if($name == "Users") {
                    array_push($row, "**********");
                }
                
                foreach($row as $value) {
                    if ($edit) {
                        echo "<td><a href='#'>$value</a>";
                        if($i++ == $length) { echo "<div class = 'deleteBox'> <i onclick=\"updateRow(this);\" class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> <i onclick='deleteRow(this);' class=\"fa fa-trash\" aria-hidden=\"true\"></i></div>"; }
                        echo "</td>";
                    }
                    else { echo "<td><a href='#' onclick='getApplicant(this)'>$value</a></td>"; }
                }
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>
