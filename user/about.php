<?php
    require_once "../condb.php";
    session_start();
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

    <!-- about -->
    <div class="container" id="about">
        <h1>Giới thiệu</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 py-3 py-md-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0974315164444!2d105.79705187508097!3d21.028787180620544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab440831f6a1%3A0xed92bda83843fe97!2zNDUxIMSQLiBOZ3V54buFbiBLaGFuZywgWcOqbiBIb8OgLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1713865030846!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6 py-3 py-md-0">
                <p>Chào mừng bạn đến với trang web bán giày Nike của chúng tôi! Tại đây, bạn sẽ khám phá được những sản phẩm giày thể thao chất lượng hàng đầu từ thương hiệu Nike - biểu tượng của sự tiện dụng, phong cách và đẳng cấp. 
                    Với mục đích đem đến trải nghiệm mua sắm trực tuyến thuận tiện và thú vị nhất cho bạn, chúng tôi luôn cập nhật các xu hướng mới nhất và các sản phẩm được yêu thích nhất trong thế giới giày dép. 
                    Bất kể bạn đang tìm kiếm những đôi sneakers thời thượng, những đôi sandals thoải mái cho mùa hè, hay những đôi giày cao gót quyến rũ, chúng tôi đều có những lựa chọn phong phú để bạn có thể dễ dàng tìm thấy đôi giày ưng ý nhất. 
                    Chất lượng là tiêu chí hàng đầu của chúng tôi. Tất cả các sản phẩm trên trang web đều được lựa chọn kỹ lưỡng từ các thương hiệu uy tín và có nguồn gốc rõ ràng, đảm bảo đem đến sự hài lòng tối đa cho khách hàng. Bên cạnh đó, chúng tôi cam kết mang đến dịch vụ chăm sóc khách hàng tận tình và chu đáo, luôn sẵn sàng hỗ trợ bạn trong mọi thắc mắc và yêu cầu. 
                    Hãy khám phá ngay trang web của chúng tôi để đắm chìm trong thế giới giày dép đa dạng và thú vị. Chúng tôi hy vọng bạn sẽ tìm thấy những sản phẩm ưng ý và có được trải nghiệm mua sắm trọn vẹn nhất tại đây. Xin cảm ơn và chúc bạn một ngày tuyệt vời!
                </p>
            </div>
        </div>
    </div>
    <!-- about -->

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

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>