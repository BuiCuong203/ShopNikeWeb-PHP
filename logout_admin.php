<?php
    session_start();
    if(isset($_SESSION['email_admin'])){
        unset($_SESSION['email_admin']);
    }
    header('location: login_admin.php');
?>