<?php
    /**
        * @desc this class will hold functions for getting page meta data
        * getTableHeaders():
            * @desc this function return all headers for the html table on each page
        * getName():
            * @desc returns name of page witout .php based on url
        * getShort():
            * @desc returns name of page without .php or 's' character
        * getShort():
            * @desc returns html to be displayed on the page for debugging purposes
        * @author Daniel Lucia 14dvl@queensu.ca
    */
    class Page {
        static function getTableHeaders(){
            switch(self::getName()) {
                case "Applications":
                    return array("First Name", "Last Name", "Age", "Email", "Password");
                case "Users":
                    return array("First Name", "Last Name", "Email", "Phone", "Position");
                case "Sponsors":
                    return array("First Name", "Last Name", "Email", "Phone", "Donation Amount", "Donation Recieved");
                case "Prizes":
                    return array("Prize Name", "Event", "Description");
                default:
                    echo "<h1> Page does not exist </h1>";
               }
        }

        static function getName() { return ucfirst(basename($_SERVER['PHP_SELF'], ".php")); }
        static function getShortName(){ return substr(basename($_SERVER['PHP_SELF'], ".php"), 0, -1);}
        static function output($value) { return "<h1>" . $value . "</h1>"; }
    }
?>
