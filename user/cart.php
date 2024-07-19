<?php
    require_once "../condb.php";
    session_start();

    $product = [];
    if (isset($_SESSION["cart"])) {
        $product = $_SESSION["cart"];
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
    <link rel="stylesheet" href="/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<div>
    <?php require_once "header.php"; ?>

    <!-- cart -->
    <div class="container" id="top-cart">
        <h1 class="text-center">Giỏ hàng</h1>
        <div class="mt-5">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $STT = 1;
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
                            <form action="/user/update_cart.php?product_id=<?php echo $item["product_id"]; ?>" method="post">
                                <tr>
                                    <td><?php echo $STT++; ?></td>
                                    <td><img style="width: 100px" src="/img/product/<?php echo $item["image"] ?>" alt="hinhanh"></td>
                                    <td><?php echo $item["title"] ?></td>
                                    <td><?php echo $item["discount"] != 0? number_format($item["discount"], 0, ".", ","): number_format($item["price"], 0, ".", ","); ?>đ</td>
                                    <td><input style="width: 40px; text-align: center;" type="number" name="quantity" value="<?php echo $item["quantity"] ?>" min="1"></td>
                                    <td><?php echo number_format($total, 0, ".", ","); ?>đ</td>
                                    <td><button class="btn" style="margin-top:-5px;">Cập nhật</button></td>
                                    <td><a href="/user/delete_cart.php?product_id=<?php  echo $item["product_id"]; ?>" class="btn" style="margin-top:-5px;">Xóa</a></td>
                                </tr>
                            </form>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <h4>Tổng tiền: &nbsp;</h4>
            <h5 style="margin-top: 4px;"><?php echo number_format($sum, 0, ".", ",") ?>đ</h5>
        </div>
        <div class="d-flex justify-content-end" style="margin-right: 30px;">
            <a href="checkout.php" class="btn">Mua hàng</a>
        </div>
    </div>
    <!-- cart -->

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

</html>