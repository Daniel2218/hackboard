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
                echo "<button onclick=\"displayPopUpBox('block')\">
                        <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                    "</button>";
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
    </table>
</div>
