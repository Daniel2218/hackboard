<?php
    class Page {
        public $name;
        public $shortName;
        public $iconName;
        public $tableHeaders;
        public $previousPage;

        public function __construct() {
            $this->name = basename($_SERVER['REQUEST_URI'], ".php");
            $this->shortName = substr($this->name, 0, -1);
            $previousPage = $this->getPreviousPage();
            $this->setIconAndHeaders();
        }

        private function getPreviousPage() {
            if($this->name == "applicant") return "Applications";
            return "";
        }

        private function setIconAndHeaders() {
            switch($this->name) {
                case "hackboard":
                case "applications":
                    $this->tableHeaders = array("Applicant ID", "First Name", "Last Name","Hacks", "Status");
                    $this->iconName = "files-o";
                    break;
                case "users":
                    $this->tableHeader = array("ID", "First Name", "Last Name", "Email", "Phone", "Position", "Password");
                    $this->iconName = "users";
                    break;
                case "sponsors":
                    $this->tableHeader = array("ID","First Name", "Last Name", "Email", "Phone", "Donation Amount", "Donation Recieved");
                    $this->iconName = "university";
                    break;
                case "prizes":
                    $this->tableHeader = array("ID", "Prize Name", "Description", "Obtained By",  "Sponsor First Name", "Sponsor Last Name");
                    $this->iconName = "gift";
                    break;
                case "schedule":
                    $this->tableHeader = array("pid", "sid", "Event Name", "Description", "Start Time", "End Time", "Location");
                    $this->iconName = "calendar";
                    break;
                case "applicant":
                    $this->tableHeader = array("ID", "First Name", "Last Name", "Email", "Phone",  "School", "Age", "Gender",  "Size", "Major", "Resume", "Website", "Hacks", "Status");
                    $this->iconName = "";
                    break;
                default:
                    break;
               }
        }
    }
?>
