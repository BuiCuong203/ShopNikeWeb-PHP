<?php
    require_once "../condb.php";
    session_start();

    $sql = "Select * from product order by product_id desc limit 3 offset 0";
    $result = mysqli_query($conn, $sql);

    $sql2 = "Select * from product where discount != 0 order by discount asc limit 8";
    $result2 = mysqli_query($conn, $sql2);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php require_once "header.php"; ?>

    <!-- homeContent -->
    <div id="myCarousel" class="carousel slide" >
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/img/1.png" alt="hinh anh">
                <div class="carousel-caption"></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/2.png" alt="hinh anh">
                <div class="carousel-caption"></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/3.png" alt="hinh anh">
                <div class="carousel-caption"></div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/4.png" alt="hinh anh">
                <div class="carousel-caption"></div>
            </div>
        </div>
        
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" style="border-radius: 100%; width: 10px; height: 10px;" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" style="border-radius: 100%; width: 10px; height: 10px;" data-slide-to="1"></li>
            <li data-target="#myCarousel" style="border-radius: 100%; width: 10px; height: 10px;" data-slide-to="2"></li>
            <li data-target="#myCarousel" style="border-radius: 100%; width: 10px; height: 10px;" data-slide-to="3"></li>
        </ol>
    </div>
    <!-- homeContent -->


    <!-- topCards -->
    <div class="container" id="top-cards">
        <h1 class="text-center">Mới nhất</h1>
        <div class="row" style="margin-top: 30px;">
            <?php
                while($row = mysqli_fetch_assoc($result) ) { ?>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card" style="background-color: #a9a9a926;">
                            <img src="/img/product/<?php echo $row["image"]; ?>" alt="">
                            <div class="card-img-overlay">
                                <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                <p>Giày đẹp chất lượng cao</p>
                                <?php
                                    if($row["discount"] == 0) {?>
                                        <h5><?php echo number_format($row["price"], 0, ".", ","); ?>đ</h5>
                                    <?php }
                                    else { ?>
                                        <h5><?php echo number_format($row["discount"], 0, ".", ","); ?>đ <strike><?php echo number_format($row["price"], 0, ".", ","); ?>đ</strike></h5>
                                    <?php } ?>
                                <a href="product_detail.php?product_id=<?php echo $row["product_id"]; ?>" class="btn">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <!-- topCards -->

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Giảm giá lên tới 50%</h1>
            <div id="bannerbtn"><a class="btn" href="/user/product.php">Mua ngay</a></div>
        </div>
    </div>
    <!-- banner -->

    <!-- productCards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">Giảm giá</h1>
        <div class="row mt-5" >
            <?php
                while( $row = mysqli_fetch_assoc($result2) ) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 py-3 py-md-0 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="/img/product/<?php echo $row["image"]; ?>" alt="hinh anh">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row["title"]; ?></h3>
                                <p></p>
                                <div class="star">
                                    <?php for($i = 1; $i <= 5; $i++){?> <i class="fas fa-star checked"></i> <?php } ?>
                                </div>
                                <h5><?php echo number_format($row["discount"], 0, ".", ","); ?>đ <strike><?php echo number_format($row["price"], 0, ".", ","); ?>đ</strike></h5>
                                <a href="product_detail.php?product_id=<?php echo $row["product_id"]; ?>" class="btn">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <!-- productCards -->

    <!-- product -->
    <div class="container" style="margin-top: 50px;"><hr></div>
    <div class="container">
        <h3 style="font-weight: bold;color: #1c1c50">Giới thiệu</h3>
        <p>Chào mừng bạn đến với trang web bán giày Nike của chúng tôi! Tại đây, bạn sẽ khám phá được những sản phẩm giày thể thao chất lượng hàng đầu từ thương hiệu Nike - biểu tượng của sự tiện dụng, phong cách và đẳng cấp. 
            Với các mẫu giày Nike được cập nhật thường xuyên, từ những đôi sneakers phong cách đến giày chạy bộ chuyên nghiệp, chúng tôi tự tin rằng bạn sẽ tìm thấy đôi giày hoàn hảo cho mọi hoàn cảnh và sở thích của mình. 
            Hãy tham quan trang web của chúng tôi ngay bây giờ để khám phá bộ sưu tập giày Nike đa dạng và tuyệt vời nhất!</p>
            <hr>
    </div>
    <!-- product -->

    <!-- offer -->
    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h5>Miễn phí vận chuyển</h5>
                <p>Đơn hàng trên 5.000.000đ</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h5>Giao hàng nhanh chóng</h5>
                <p>Đến tay bạn trong nháy mắt</p>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h5>Lựa chọn hàng đầu</h5>
                <p>Nhiều sản phẩm chất lượng cao</p>
            </div>
        </div>
    </div>
    <!-- offer -->

    <?php require_once "footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>