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
                    echo "<button onclick=\"postRequest('applicants/decline', )\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Decline
                          </button>";
                    echo "<button onclick=\"postRequest('applicants/skip', )\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Skip
                          </button>";
                    echo "<button onclick=\"postRequest('applicants/accept', )\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Accept
                          </button>";
                } else {
                    echo "<button onclick=\"displayPopUpBox('block')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                        "</button>";
                }
            }
        ?>
    </div>
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
            default:
                echo "Page does not exist";
        }

        function addEntries($rows, $edit) {
            foreach($rows["result"] as $row) {
                echo '<tr class="tr-color">';
                foreach($row as $value) {
                    if ($edit) { echo "<td contenteditable><a href='#'>$value</a></td>"; }
                    else { echo "<td><a href='applicant.php'>$value</a></td>"; }
                }
                echo '</tr>';
            }
        }
        ?>
    </table>
</div>
