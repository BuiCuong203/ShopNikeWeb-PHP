<?php
    require_once "condb.php";
    session_start();
    if(!isset($_SESSION['email_admin'])){
        header('location: login_admin.php');
    }

    $product_id = $_GET['product_id'];
    $sql= "Delete from product where product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    header('location: list_product.php');
?>