<?php
    session_start();
    $product_id = $_GET["product_id"];

    $cart = [];
    if(isset($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
    }
    for( $i = 0; $i < count($cart); $i++ ){
        if($cart[$i]["product_id"] == $product_id) {
            array_splice($cart, $i,1);
            break;
        }
    }
    $_SESSION["cart"] = $cart;
    header("location: cart.php");
?>