<?php
    include_once "init.php";
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
                } else if ($name == "Sponsors") {
                    echo "<button style='width:125px;' onclick=\"displayPopUpBox('block')\">
                            <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                        "</button>";
                } else {
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
                echo "<button onclick=\"getSortedApplicants()\"> Sort by Hacks </button>";
            }
        ?>
    </div>

    <table>
        <tr>
            <?php
                foreach ($tableHeaders as $header) {
                    echo "<th>" .$header . "</th>";
                }

                foreach ($rows as $row) {
                    $i = 1;
                    echo '<tr class="tr-color">';
                    $length = sizeof($row);

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
            ?>
        </tr>

        <?php
            function addEntries($rows, $edit) {
                global $name;
                foreach($rows["result"] as $row) {
                    $i = 1;
                    echo '<tr class="tr-color">';

                    if($name == "Users") {
                        array_push($row, "**********");
                    }
                    $length = sizeof($row);
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
