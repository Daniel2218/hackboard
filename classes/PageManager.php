<?php
    include_once "Page.php";
    class PageManager {
        public $pages;

        function __construct() {
            $applicationsPage = new Page("applications.php", "gift", "");
            $applicantPage = new Page("applicant.php", "gift", "Applications");
            $prizePage = new Page("prizes.php", "gift", "");
            $schedulePage = new Page("schedule.php", "gift", "");
            $sponsorsPage = new Page("sponsors.php", "gift", "");
            $usersPage = new Page("users.php", "gift", "");
            $this->pages = array();

            array_push($this->pages, $applicationsPage);
            array_push($this->pages, $applicantPage);
            array_push($this->pages, $prizePage);
            array_push($this->pages, $schedulePage);
            array_push($this->pages, $sponsorsPage);
            array_push($this->pages, $usersPage);
        }

        function findPage($name) {
            foreach ($this->pages as $page) {
                if($page->fullName == $name) {
                    return $page;
                }
            }
            return false;
        }

        static function console_log( $data ){
          echo '<script>';
          echo 'console.log('. json_encode( $data ) .')';
          echo '</script>';
        }
    }
    $manager = new PageManager();
    $manager->findPage("applications.php");
?>
