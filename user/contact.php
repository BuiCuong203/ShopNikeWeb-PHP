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

    <!-- contact -->
    <div class="container" id="contact">
        <h1 class="text-center">Liên hệ</h1>
        <form action="infor.php" method="post" class="contact-inp">
            <input class="form-control" type="text" name="name" placeholder="Họ và tên" required>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
            <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" required>
            <input class="form-control" type="text" name="address" placeholder="Địa chỉ" required>
            <textarea class="form-control" name="comment" id="" cols="" rows="5" placeholder="Ghi chú"></textarea>
            <button id="send" class="btn">Gửi</button>
        </form>
    </div>
    <!-- contact -->

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>

</html>