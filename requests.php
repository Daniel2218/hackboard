<?php
    // var_dump($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $postData = $_POST["postData"];
        $endpoint = $postData["endpoint"];

        if ($endpoint == "prizes/edit") {
            $fields = array (
                "pid" => $postData["values"][0],
                "pname" => $postData["values"][1],
                "description" => $postData["values"][2],
                "obtain" => $postData["values"][3],
                "fname" => $postData["values"][4],
                "lname" =>$postData["values"][5]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else {
            unset($postData["endpoint"]);
            echo postRequest($endpoint, $postData);
        }
    } else if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(!empty($_GET["endpoint"])) {
            if($_GET["endpoint"] == "store") {
                echo store();
            } else {
                echo getRequest($_GET["endpoint"]);
            }
        }
    }

    function getRequest($endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/myHackathon/api/$endpoint");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function postRequest($endpoint, $postData) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/myHackathon/api/$endpoint");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function store() {
        session_start();
        $_SESSION["applicant"] = json_decode($_GET["data"], true);
        var_dump($_SESSION);
    }

    function getKeys($name) {
        switch($name) {
            case "Applications":
                return array("Applicant ID", "First Name", "Last Name", "Reviewer First Name",  "Reviewer LastName", "Status");
            case "Users":
                return array("First Name", "Last Name", "Email", "Phone", "Position");
            case "Sponsors":
                return array("First Name", "Last Name", "Email", "Phone", "Donation Amount", "Donation Recieved");
            case "Prizes":
                return array("pid", "sid", "pname", "description",  "obtain", "sfname","slname");
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
?>
