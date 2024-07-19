<?php
    session_start();
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
    }
    $referer = $_SERVER['HTTP_REFERER'];
    $filename = basename(parse_url($referer, PHP_URL_PATH));
    header("location: $referer");
?>