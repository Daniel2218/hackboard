<?php
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
        } else if ($endpoint == "sponsors/edit") {
            $fields = array (
                "sid" => $postData["values"][0],
                "fname" => $postData["values"][1],
                "lname" => $postData["values"][2],
                "email" => $postData["values"][3],
                "phone" => $postData["values"][4],
                "amount" => $postData["values"][5],
                "recieved" =>$postData["values"][6]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if ($endpoint == "users/edit") {
            $fields = array (
                "uid" => $postData["values"][0],
                "fname" => $postData["values"][1],
                "lname" => $postData["values"][2],
                "email" => $postData["values"][3],
                "phone" => $postData["values"][4],
                "position" => $postData["values"][5],
                "password" => $postData["values"][6]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if ($endpoint == "events/delete") {
            $fields = array (
                "id" => $postData["id"]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if($endpoint == "prizes/add") {
            $fields = array (
                "pname" => $postData[0],
                "desc" => $postData[1],
                "obtain" => $postData[2],
                "fname" => $postData[3],
                "lname" => $postData[4],
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if($endpoint == "prizes/delete") {
            $fields = array (
                "id" => $postData["id"]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if($endpoint == "sponsor/add") {
            $fields = array (
                "fname" => $postData[1],
                "lname" => $postData[2],
                "email" => $postData[3],
                "phone" => $postData[4],
                "amount" => $postData[5],
                "rec" => $postData[6]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if($endpoint == "sponsor/delete") {
            $fields = array (
                "id" => $postData["id"]
            );
            echo postRequest($endpoint, http_build_query($fields));
        }  else if($endpoint == "users/add") {
            $fields = array (
                "fname" => $postData[1],
                "lname" => $postData[2],
                "email" => $postData[3],
                "phone" => $postData[4],
                "pos" => $postData[5],
                "pass" => $postData[6]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else if($endpoint == "users/delete") {
            $fields = array (
                "id" => $postData["id"]
            );
            echo postRequest($endpoint, http_build_query($fields));
        } else {
            unset($postData["endpoint"]);
            var_dump($postData["values"]);
            echo postRequest($endpoint, $postData["values"]);
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
