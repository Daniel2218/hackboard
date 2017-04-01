<?php
    // var_dump($_REQUEST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $postData = $_POST["postData"];
        $endpoint = $postData["endpoint"];
        unset($postData["endpoint"]);
        var_dump($postData);
        echo postRequest($endpoint, $postData);
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
?>
