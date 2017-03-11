<!--
    @var
        All defined at the beginning of the file they are called from
        $name: the name of the file with .php stripped
        $shortName: the name of the file with .php stripped and 's' character stripped
        $tableHeaders: the headings for the html table of each page
-->
<div id ="title">
     <h1> <?php echo $name;?> </h1>
</div>
<hr>
<div id = "tableHeader">
    <span> <i class="fa fa-th" aria-hidden="true"></i> </span>
    <h5> <?php echo $name; ?> </h5>
    <?php
        if($name != "Applications") {
            echo "<button onclick=\"displayPopUpBox('block')\">
                    <i class='fa fa-plus' aria-hidden='true'></i> Add new ". $shortName .
                "</button>";
        }
    ?>
</div>
<table style="width:100%;">
    <tr>
        <?php
            foreach ($tableHeaders as $header) {
                echo "<th>" .$header . "</th>";
            }
        ?>
    </tr>
    <tr class="tr-color">
        <td contenteditable><a href="#">Google Cardboard</a></td>
        <td contenteditable><a href="#">Googe Event</a></td>
        <td contenteditable><a href="#">Win the 3rd place in google event to recieve this prize.</a></td>
    </tr>
</table>
