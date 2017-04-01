<?php
    class Page {
        public $fullName;
        public $strippedName;
        public $shortName;
        public $iconName;
        public $tableHeaders;
        public $previousPage;
        public $lowerName;

        function __construct($fullName,$iconName,$previousPage) {
            $this->fullName = $fullName;
            $this->iconName = $iconName;
            $this->previousPage = $previousPage;
            $this->strippedName = $this->getStrippedName();
            $this->shortName = $this->getShortName();
            $this->tableHeaders = $this->getTableHeaders();
            $this->lowerName = $this->getStrippedNameLower();
        }

        function getTableHeaders(){
            switch($this->strippedName) {
                case "Applications":
                    return array("First Name", "Last Name", "Email", "Phone",  "School", "Age", "Gender",  "Size", "Major", "Resume", "Website", "Hacks", "Status");
                case "Users":
                    return array("First Name", "Last Name", "Email", "Phone", "Position");
                case "Sponsors":
                    return array("First Name", "Last Name", "Email", "Phone", "Donation Amount", "Donation Recieved");
                case "Prizes":
                    return array("Prize Name", "Event", "Description");
                case "Schedule":
                    return array("Event Name", "Start Time", "End Time", "Location");
                case "Applicant":
                    return array("First Name", "Last Name", "Email", "Phone",  "School", "Age", "Gender",  "Size", "Major", "Resume", "Website", "Hacks", "Status");
                case "Judges":
                    return array("First Name", "Last Name", "Age", "Email", "Password");
                default:
                    echo "<h1> Page does not exist </h1>";
               }
        }
        function getShortName(){
            $shortName = basename($this->fullName, ".php");
            if (substr($shortName, -1) == "s") {
                return substr($shortName, 0, -1);
            }
            return $shortName;
        }

        function getFullName() { return basename($this->fullName); }
        function getStrippedName() { return ucfirst(basename($this->fullName, ".php")); }
        function getStrippedNameLower() { return basename($this->fullName, ".php"); }
        function output($value) { return "<h1>" . $value . "</h1>"; }
    }
?>
