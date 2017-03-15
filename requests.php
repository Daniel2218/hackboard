<?php
    function getRequest($endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://localhost/myHackathon/api/$endpoint");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    function postRequest($endpoint, $postData) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://localhost/myHackathon/api/$endpoint");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
?>
