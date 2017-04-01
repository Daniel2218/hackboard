<?php
    include_once dirname(__FILE__) . "/requests.php";

    $postData .= "email" . "=" . $_POST["email"] . "&" . "password" . "=" . $_POST["password"];
    $responce = json_decode(postRequest("loginCheck", $postData), true);
    if ($responce->status == true) {
        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION{"password"] = $_POST["password"];
        header("Location: " . dirname(__FILE__) . "/applications.php");
    } else {
        echo $responce->message;
    }
?>
