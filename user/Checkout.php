<?php
    require_once "../condb.php";
    session_start();

    $product = [];
    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
        $product = $_SESSION["cart"];
    }else{
        header('location: cart.php');
    }

    $error = "";
    if(!isset($_SESSION['email'])){
        $error = "*Bạn cần đăng nhập!";
    }
    if(isset($_POST["checkout"])){
        if($error == ""){
            $email_user = $_SESSION['email'];
            $row = mysqli_query($conn, "Select * from user where email = '$email_user'");
            $row = mysqli_fetch_assoc($row);
            $user_id = $row["user_id"];

            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $note = $_POST["note"];
            $method = $_POST["method"];
            $sql = "INSERT INTO orders(`user_id`, `fullname`, `email`, `phone`, `address`, `note`, `status`, `method`, `order_at`) VALUES ($user_id,'$name','$email','$phone','$address','$note','Processing', '$method', NOW());";
            if(mysqli_query($conn, $sql)) {
                $order_id = mysqli_insert_id($conn);
                foreach ($product as $item) {
                    $product_id = $item["product_id"];
                    if($item["discount"] != 0) {
                        $price = $item["discount"];
                    }else {
                        $price = $item["price"];
                    }
                    $quantity = $item["quantity"];
                    $total = $price * $quantity;
                    $sql2 = "Insert into order_detail(order_id, product_id, price, quantity, total) values($order_id, $product_id, $price, $quantity, $total)";
                    mysqli_query($conn, $sql2);
                }
            }
            unset($_SESSION["cart"]);
            header("location: thankyou.php");
        }
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
</head>
<div>
    <?php require_once "header.php"; ?>

    <div class="container" id="top-cart">
        <h1 class="text-center">Thanh toán</h1>
        <div class="error d-flex justify-content-center">
            <span><?php echo $error; ?></span>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="container">
                    <h4 class="text-center">Đơn hàng</h4>
                    <table class="table">
                        <?php
                            $sum = 0;
                            foreach($product as $item) {
                                $total = 0;
                                if($item["discount"] != 0){
                                    $total = $item["quantity"] * $item["discount"];
                                    $sum += $total;
                                }else {
                                    $total = $item["quantity"] * $item["price"];
                                    $sum += $total;
                                }?>
                                <tr>
                                    <td><?php echo $item["title"] ?></td>
                                    <td><?php echo $item["quantity"] ?></td>
                                </tr>
                        <?php } ?>
                    </table><hr>
                    <div class="d-flex justify-content-center">
                        <h4>Tổng tiền: &nbsp;</h4>
                        <h5 style="margin-top: 4px;"><?php echo number_format($sum, 0, ".", ",") ?>đ</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form method="post" action="" class="inp" style="margin-top:30px">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ và tên" name="name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Số điện thoại" name="phone" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Địa chỉ" name="address" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="note" id="" cols="" rows="5" placeholder="Ghi chú"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="subscribe" name="method" value="cash" required> &nbsp;Trả tiền mặt
                    </div>
                    <div class="form-group">
                        <input type="radio" id="subscribe" name="method" value="online" required>&nbsp;Thanh toán trực tuyến
                    </div>
                    <button id="login" class="btn" name="checkout">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>

</html>