<!--
    @var
        All defined at the beginning of the file they are called from
        $name: the name of the file with .php stripped
        $shortName: the name of the file with .php stripped and 's' character stripped
        $tableHeaders: the headings for the html table of each page
-->
<div id ="pop-up-box" tabindex="1" onkeydown="if(event.keyCode == 27) displayPopUpBox('none');">
    <div id = "top">
        <p id = "makeInline"> Add a new <?php echo $shortName; ?> </p>
        <i onclick="displayPopUpBox('none')" id = "floatRight" class="fa fa-times fa-lg" aria-hidden="true"></i>
    </div>
    <div id  = "middle">
        <?php
            if ($name == 'Schedule') {
                $onclickFunc = "addEvent();";
            } else {
                $onclickFunc = "addTableEntry();";
            }

            $first = true;
            foreach ($tableHeaders as $header) {
                echo "<div>";
                echo "<p> Enter " . $header . ": </p>";
                echo "<input autofocus='$first' id = 'pop-up-input' type='text'
                             onkeydown='if(event.keyCode == 13) $onclickFunc'>";
                echo "</div>";
                $first = false;
            }
        ?>
    </div>
    <div id = "bottom">
        <div id = "positionLeft">
            <a class="pop-up-a" id = "add-event-btn" onclick= <?php echo $onclickFunc; ?> href="#">
                Add <?php echo $shortName?>
            </a>
            <a class="pop-up-a" id = "cancel-btn" onclick="displayPopUpBox('none')" href="#"> Cancel </a>
        </div>
    </div>
</div>
<div onclick="displayPopUpBox('none')"id ="screen"> </div>
