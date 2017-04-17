<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include_once("model/Model.php");
include_once ("controller/Page.php");


class Controller {
     public $model;

     public function __construct()
     {
          $this->model = Model::getInstance();
     }

     public function invoke()
     {
         $page = new Page();

         if($page->name == "hackboard") {
             $response = $this->model->get("applications");
         } else {
             $response = $this->model->get($page->name);
         }

         if(!$response['status']) {
             echo $response['message'];
         }

         $rows = $response["result"];
         include_once 'view/init.php';

         switch($page->name) {
             case "hackboard":
             case "applications":
                 $name = "Applications"; // in case hackboard case (change .htaccess to reroute)
                 $total = 10;
                 $accepted = 10;
                 $declined = 10;
                 $skipped = 10;
                 include_once "view/applications.php";
                 break;
             case "users":
                 include_once dirname(__FILE__) . "/view/users.php";
                 break;
             case "sponsors":
                 include_once "view/template.php";
                 break;
             case "prizes":
                 include_once dirname(__FILE__) . "/view/prizes.php";
                 break;
             case "schedule":
                 include_once dirname(__FILE__) . "/view/schedule.php";
                 break;
             case "applicant":
                 include_once dirname(__FILE__) . "/view/applicant.php";
                 break;
             default:
                 echo "<h1> Page does not exist </h1>";
                 break;
        }
     }
}

?>
