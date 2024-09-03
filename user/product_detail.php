<?php
    require_once "../condb.php";
    session_start();

    $product_id = $_GET["product_id"];
    $sql = "Select * from product where product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row["image"];
    $title = $row["title"];
    $price = $row["price"];
    $discount = $row["discount"];
    $description = $row["description"];

    if(isset($_POST['quantity'])){
        $quantity = $_POST['quantity'];
        $cart = [];
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
        }
        $isFound = false;
        for( $i = 0; $i < count($cart); $i++ ){
            if($cart[$i]["product_id"] == $product_id){
                $cart[$i]["quantity"] += $quantity;
                $isFound = true;
                break;
            }
        }
        if(!$isFound) {
            $product = $row;
            $product["quantity"] = $quantity;
            $cart[] = $product;
        }
        $_SESSION["cart"] = $cart;
        
        $count = 0;
        foreach($cart as $item) {
            $count += 1;
        }
        echo $count;
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="/img/logo.png">
    <title>ShopNike</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<div>
    <?php include "header.php"; ?>

    <div class="container" id="about">
        <h1>Chi tiết sản phẩm</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 py-3 py-md-0">
                <img src="/img/product/<?php echo $image ?>" alt="" style="width: 100%; height: 450;">
            </div>
            <div class="col-md-6 py-3 py-md-0 content">
                <h2 class="title"><?php echo $title ?></h2>
                <div class="star">
                    <?php for($i = 1; $i <= 5; $i++){?> <i class="fas fa-star checked"></i> <?php } ?>
                </div>
                <br>
                <div class="d-flex justify-content-start">
                    <h4>Giá: &nbsp;</h4>
                    <?php
                        if($discount == 0){?>
                            <h5 style="margin-top: 4px;"><?php echo number_format($price, 0, ".", ","); ?>đ</h5>
                        <?php }else{ ?>
                            <h5 style="margin-top: 4px;"><?php echo number_format($discount, 0, ".", ","); ?>đ &ensp;<strike><?php echo number_format($price, 0, ".", ","); ?>đ</strike></h5>
                        <?php } ?>
                </div>
                <br>
                <form action="" method="post" id="updatequantity">
                    <div class="d-flex justify-content-start">
                        <h4>Số lượng: &nbsp;</h4>
                        <input style="width: 40px; text-align: center;" id="quantity" type="number" name="quantity" value="1" min="1">
                    </div>
                    <br>
                    <button href="#" class="btn" name="addcart">Thêm vào giỏ hàng</button>
                </form>
                <hr>
                <div>
                    <h4>Mô tả</h4>
                    <p><?php echo $description ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "footer.php"; ?>

    <script>
        $(document).ready(function(){
            $('#updatequantity').on('submit', function(event){
                event.preventDefault();
                var quantity = $('#quantity').val();
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {quantity: quantity},
                    success: function(response){
                        var cartquantity = response;
                        $('#cartquantity').html(cartquantity);
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>