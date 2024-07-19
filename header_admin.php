<?php
    $file_hien_tai = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
    <div class="container-fluid">
        <img src="/img/logo.png" alt="" width="180px" style="width: 120px; height: 90px; cursor: pointer;">
        <ul class="nav nav-pills me-auto">
            <li class="nav-item">
                <a class="nav-link <?php if($file_hien_tai == "list_customer.php"){echo 'active';} ?>" href="list_customer.php">Danh sách khách hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($file_hien_tai == "list_category.php"){echo 'active';} ?>" href="list_category.php">Danh sách danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($file_hien_tai == "list_product.php"){echo 'active';} ?>" href="list_product.php">Danh sách sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($file_hien_tai == "list_order.php"){echo 'active';} ?>" href="list_order.php">Danh sách đơn hàng</a>
            </li>
        </ul>
        <a class="btn btn-danger" href="logout_admin.php">Đăng xuất</a>
    </div>
</nav>
