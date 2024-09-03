<?php
    require_once "condb.php";
    session_start();
    if(isset($_SESSION['email_admin'])) {
        header('location: admin.php');
    }

    $err = '';
    if(isset($_POST["login"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "Select * from user where email = '$email' and password = '$password' and role = 'admin'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $_SESSION['email_admin'] = $email;
            header('location: list_customer.php');
        }else {
            $err = "*Thông tin email hoặc mật khẩu không chính xác";
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
    <link rel="stylesheet" href="/css/style_admin.css">
    <link rel="stylesheet" href="/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body id="login_body">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Đăng nhập</h5>
                        <div class="has-error d-flex justify-content-center mb-2">
                            <span><?php echo ($err != '')? $err: ''; ?></span>
                        </div>
                        <form method="post" action="login_admin.php">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Mật khẩu" required>
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                            <br>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold py-3" name="login" type="submit">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>