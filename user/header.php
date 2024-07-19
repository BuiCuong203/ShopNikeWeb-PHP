<?php
    $file_hien_tai = basename($_SERVER['PHP_SELF']);
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql1 = "Select * from user where email = '$email'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
    }

    $sql1 = "Select * from category";
    $result1 = mysqli_query($conn, $sql1);

    $cart = [];
    if(isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
    }
    $count = 0;
    foreach($cart as $item) {
        $count += 1;
    }
?>

<!-- top navbar -->
<div class="top-navbar d-flex justify-content-between align-items-center">
    <div class="top-icons">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
    </div>
    <div class="other-links">
        <?php
            if(isset($_SESSION['email'])){?>
                <span><?php echo $row1['fullname'] ?></span>
                <a class="btn btn-light btn-sm" id="btn-logout" href="/user/logout.php">Đăng xuất</a>
            <?php }else { ?>
                <a class="btn btn-light btn-sm" id="btn-login" href="/user/login.php">Đăng nhập</a>
                <a class="btn btn-light btn-sm" id="btn-signup" href="/user/signup.php">Đăng ký</a>
        <?php } ?>
        <i class="fa-solid fa-user user"></i>
        <a href="/user/cart.php" style="text-decoration: none;" class="cart">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="cartquantity" class="position-absolute badge badge-pill px-1" style="top:1px; right:25px; color: #fff; background-color: #1c1c50"><?php echo $count; ?></span>
        </a>
    </div>
 </div>
<!-- top navbar -->

<!-- navbar -->
<div class="home-section">
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/user/home.php"><img src="/img/logo.png" alt="" width="180px" style="width: 120px; height: 90px;"></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span><i class="fa-solid fa-bars" style="color: #fff;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if($file_hien_tai == "home.php"){echo 'active';} ?>" href="/user/home.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($file_hien_tai == "product.php" || $file_hien_tai == "filter_product.php" || $file_hien_tai == "product_detail.php"){echo 'active';} ?>" href="/user/product.php">Sản phẩm</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Danh mục</a>
                        <ul class="dropdown-menu" style="background-color: #1c1c50; margin-top: 10px;">
                            <?php
                                while($row = mysqli_fetch_assoc($result1)) { ?>
                                    <li><a class="dropdown-item" href="/user/filter_product.php?category_id=<?php echo $row["category_id"]; ?>"><?php echo $row["name"]; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($file_hien_tai =='about.php'){echo 'active';} ?>" href="/user/about.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($file_hien_tai =='contact.php'){echo 'active';} ?>" href="/user/contact.php">Liên hệ</a>
                    </li>
                </ul>
                <form method="get" action="filter_product.php" class="d-flex">
                    <input name="product_search" class="form-control me-2" type="search" placeholder="Tìm kiếm">
                    <button name="search" class="btn btn-outline-light" id="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>
</div>
<!-- navbar --> 