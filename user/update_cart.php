<?php
    session_start();
    $product_id = $_GET["product_id"];
    $quantity = $_POST["quantity"];

    $cart = [];
    if(isset($_SESSION["cart"])){
        $cart = $_SESSION["cart"];
    }
    for( $i = 0; $i < count($cart); $i++ ){
        if($cart[$i]["product_id"] == $product_id) {
            $cart[$i]["quantity"] = $quantity;
            break;
        }
    }
    $_SESSION["cart"] = $cart;
    header("location: cart.php");
?>