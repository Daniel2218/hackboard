<?php
    // include_once dirname(__FILE__) . "/requests.php";
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
        <tr class="tr-color">
            <td contenteditable><a href="#">Daniel</a></td>
            <td contenteditable><a href="#">Lucia</a></td>
            <td contenteditable><a href="#">14dvl@queensu.ca</a></td>
            <td contenteditable><a href="#">41666166498</a></td>
            <td contenteditable><a href="#">100</a></td>
            <td contenteditable><a href="#">false</a></td>
        </tr>

        <?php
        // switch($name) {
        //     case "Applications":
        //         $results = json_decode(getRequest("applicants/"), true);
        //         addEntries($results,false);
        //     case "Users":
        //         addEntries(getRequest("users/"),true);
        //     case "Sponsors":
        //         addEntries(getRequest("sponsors/"),true);
        //     case "Prizes":
        //         addEntries(getRequest("prizes/"),true);
        //     case "applicants":
        //         addEntries(getRequest("applicants/id, false"))
        //     default:
        //
        //    }
        //
        //     function addEntries($rows, $edit) {
        //         foreach($rows as $row) {
        //             echo '<tr class="tr-color">';
        //             foreach($row as $value) {
        //                 echo "<td contenteditable='$edit'>";
        //                 if(!$edit) {
        //                     echo "<a href='applicant.php'>$value</a></td>";
        //                 } else {
        //                      echo "$value</td>";
        //                  }
        //             }
        //             echo '</tr>';
        //         }
        //     }
        ?>
    </table>
</div>
