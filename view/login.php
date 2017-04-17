<?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/myHackathon/api/users/loginCheck?email=" . $_POST['email'] . "&password=" . $_POST['password']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    echo $output;

    $response = json_decode($output);

    if ($response->status) {
        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: applications.php");
    } else {
        echo $response->message;
        header("Location: login.html");
    }
?>
