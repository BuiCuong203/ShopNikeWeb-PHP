<?php
    $sql = "Select * from category";
    $result = mysqli_query($conn, $sql);
?>

<!-- footer -->
<footer id="footer" style="margin-top:50px;">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-content">
                    <a href="home.php"><img src="/img/logo.png" alt="" style="width: 120px; height: 90px;"></a> <br>
                    <strong><i class="fa-solid fa-location-dot"></i> Address: Số 451 Nguyễn Khang - Yên Hoà - Cầu Giấy - Hà Nội</strong> <br><br>
                    <strong><i class="fa fa-phone"></i> Phone: +0123456789</strong> <br><br>
                    <strong><i class="fa-solid fa-envelope"></i> Email: email@gmail.com</strong>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="home.php">Trang chủ</a></li>
                        <li><a href="product.php">Sản phẩm</a></li>
                        <li><a href="about.php">Giới thiệu</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h3>Danh mục</h3>
                    <p></p>
                    <ul>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <li><a href="/user/filter_product.php?category_id=<?php echo $row["category_id"]; ?>"><?php echo $row["name"]; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h3>Theo dõi chúng tôi</h3>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="twitter"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="twitter"><i class="fa-brands fa-google-plus"></i></a>
                        <a href="#" class="twitter"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container py-4">
        <div class="credits">Designed By BuiCuong</div>
    </div>
</footer>
<!-- footer -->

<a href="#" class="arrow"><img src="/img/up-arrow.png" alt="" width="50px"></a>