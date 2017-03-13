<?php
    include_once "Page.php";
    class PageManager {
        public $pages;

        function __construct() {
            $applicationsPage = new Page("applications.php", "files-o", "");
            $applicantPage = new Page("applicant.php", "", "Applications");
            $prizePage = new Page("prizes.php", "gift", "");
            $schedulePage = new Page("schedule.php", "calendar", "");
            $sponsorsPage = new Page("sponsors.php", "university", "");
            $usersPage = new Page("users.php", "users", "");
            $this->pages = array();

            array_push($this->pages, $applicationsPage);
            array_push($this->pages, $applicantPage);
            array_push($this->pages, $prizePage);
            array_push($this->pages, $schedulePage);
            array_push($this->pages, $sponsorsPage);
            array_push($this->pages, $usersPage);
            // echo "page manager contructor called";
            // var_dump($this->pages);
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
    // $manager = new PageManager();
    // $page = $manager->findPage("sponsors.php");
    // var_dump($page);
    // $name = $page::getStrippedName();
    // $shortName = $page::getShortName();
    // $tableHeaders = $page::getTableHeaders();
?>
