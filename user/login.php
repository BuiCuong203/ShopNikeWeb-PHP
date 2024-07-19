<?php
    require_once "../condb.php";
    session_start();
    
    if(isset($_SESSION['email'])) {
        header("location: home.php");
    }
    $err = [];
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email)) {
            $err['email'] = "*Bạn chưa nhập email";
        }
        if(empty($password)) {
            $err['password'] = "*Bạn chưa nhập mật khẩu";
        }
        $sql = "Select * from user where email = '$email' and password = '$password' and role = 'user'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            header("location: home.php");
        }else {
            $err["login"] = "*Thông tin email hoặc mật khẩu không chính xác";
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

    <!-- login -->
    <div class="container login">
        <div class="row">
            <div class="col-md-4" id="side1">
                <h3>Xin chào!</h3>
                <p>Đăng ký tài khoản</p>
                <div class="d-flex justify-content-center"><a class="btn btn-outline-light btn-sm" href="/user/signup.php">Đăng ký</a></div>
            </div>
            <div class="col-md-8" id="side2">
                <h3>Đăng nhập</h3>
                <form method="post" action="login.php" class="inp">
                    <div class="has-error d-flex justify-content-start">
                        <span><?php echo (isset($err['login']))? $err['login']: '' ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email" name="email">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['email']))? $err['email']: '' ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                    <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
                        <div class="has-error d-flex justify-content-start">
                            <span><?php echo (isset($err['password']))? $err['password']: '' ?></span>
                        </div>
                    </div>
                    <button id="login" name="login" class="btn">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
    <!-- login -->

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>