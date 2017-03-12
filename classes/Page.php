<?php
    class Page {
        public $fullName;
        public $strippedName;
        public $shortName;
        public $iconName;
        public $tableHeaders;
        public $previousPage;

        function __construct($fullName,$iconName,$previousPage) {
            $this->fullName = $fullName;
            $this->iconName = $iconName;
            $this->previousPage = $previousPage;
            $this->strippedName = self::getStrippedName();
            $this->shortName = self::getShortName();
            $this->tableHeaders = self::getTableHeaders();
        }

        static function getTableHeaders(){
            switch(self::getStrippedName()) {
                case "Applications":
                    return array("First Name", "Last Name", "Age", "Email", "Password");
                case "Users":
                    return array("First Name", "Last Name", "Email", "Phone", "Position");
                case "Sponsors":
                    return array("First Name", "Last Name", "Email", "Phone", "Donation Amount", "Donation Recieved");
                case "Prizes":
                    return array("Prize Name", "Event", "Description");
                case "Schedule":
                    return array("Event Name", "Start Time", "End Time", "Location");
                default:
                    echo "<h1> Page does not exist </h1>";
               }
        }

        static function getFullName() { return basename($_SERVER['PHP_SELF']); }
        static function getStrippedName() { return ucfirst(basename($_SERVER['PHP_SELF'], ".php")); }
        static function getShortName(){ return substr(basename($_SERVER['PHP_SELF'], ".php"), 0, -1);}
        static function output($value) { return "<h1>" . $value . "</h1>"; }
    }
?>
