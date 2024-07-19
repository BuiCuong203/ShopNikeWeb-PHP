<?php
    require_once "../condb.php";
    session_start();
    if(isset($_SESSION['email'])) {
        header('location: home.php');
    }
    
    $err = [];
    if(isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        if(empty($name)) {
            $err['name'] = "*Bạn chưa nhập họ và tên";
        }
        if(empty($email)) {
            $err['email'] = "*Bạn chưa nhập email";
        }
        if(empty($phone)) {
            $err['phone'] = "*Bạn chưa nhập số điện thoại";
        }
        if(empty($address)) {
            $err['address'] = "*Bạn chưa nhập địa chỉ";
        }
        if(empty($password)) {
            $err['password'] = "*Bạn chưa nhập mật khẩu";
        }
        if(empty($rpassword)) {
            $err['rpassword'] = "*Bạn chưa nhập lại mật khẩu";
        }
        if($password != $rpassword) {
            $err['!password'] = "*Mật khẩu nhập lại không đúng";
        }
        $sql = "Select * from user where email = '$email' and role = 'user'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $err['has-email'] = '*Email đã tồn tại';
        }else {
            if(empty($err)) {
                $sql = "Insert into user(fullname, email, phone_number, address, password, role) values('$name', '$email', '$phone', '$address', '$password', 'user')";
                $result = mysqli_query($conn, $sql);
                header("location: login.php");
            }
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
    <link rel="stylesheet" href="/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <?php require_once "header.php"; ?>

    <!-- signup -->
    <div class="container login">
        <div class="row">
            <div class="col-md-4" id="side1">
                <h3>Xin chào</h3>
                <p>Đăng nhập ngay</p>
                <div class="d-flex justify-content-center"><a class="btn btn-outline-light btn-sm" href="/user/login.php">Đăng nhập</a></div>
            </div>
            <div class="col-md-8" id="side2">
                <h3>Đăng ký</h3>
                <form method="post" action="signup.php" class="inp">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ và tên" name="name">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['name']))? $err['name']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" name="email">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['email']))? $err['email']: '' ?></span>
                            <span><?php echo (isset($err['has-email']))? $err['has-email']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Số điện thoại" name="phone">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['phone']))? $err['phone']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Địa chỉ" name="address">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['address']))? $err['address']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['password']))? $err['password']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Xác nhận Mật khẩu" name="rpassword">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['rpassword']))? $err['rpassword']: '' ?></span>
                            <span><?php echo (isset($err['!password'])&&empty($err['rpassword']))? $err['!password']: '' ?></span>
                        </div>
                    </div>
                    <button id="login" class="btn" name="signup">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
    <!-- signup -->

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>