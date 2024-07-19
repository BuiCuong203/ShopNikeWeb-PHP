<?php
    require_once "../condb.php";
    session_start();

    $product_per_page = 8;
    $page = !empty($_GET['page'])? $_GET['page']: 1;
    $offset = ($page - 1) * $product_per_page;
    $totalproduct = mysqli_query($conn, "Select * from product");
    $totalproduct = mysqli_num_rows($totalproduct);
    $totalpage = ceil($totalproduct / $product_per_page);

    $sql = "Select * from product order by product_id asc limit $product_per_page offset $offset";
    $result = mysqli_query($conn, $sql);
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

    <!-- productCards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">Sản phẩm</h1>
        <div class="row mt-5">
            <?php 
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 py-3 py-md-0 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="/img/product/<?php echo $row["image"]; ?>" alt="hinh anh">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row["title"]; ?></h3>
                                <div class="star">
                                    <?php for($i = 1; $i <= 5; $i++){?> <i class="fas fa-star checked"></i> <?php } ?>
                                </div>
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
    <!-- productCards -->
    
    <!-- pagination -->
    <div class="container d-flex justify-content-center mb-3">
        <div class="pagination pg">
            <?php if($page > 3){ ?>
                    <a href="?product_per_page=<?php echo $product_per_page ?>&&page=1"><?php echo 'First'; ?></a>
            <?php } ?>
            <?php if($page > 1){ 
                $Previous = $page - 1;?>
                <a href="?product_per_page=<?php echo $product_per_page ?>&&page=<?php echo $Previous ?>">
                    <span>&laquo;</span>
                    <span class="sr-only">$Previous</span>
                </a>
            <?php } ?>
            <?php for($num = 1; $num <= $totalpage; $num++){ ?>
                <?php if($num != $page){ ?>
                    <?php if($num-2 <= $page && $page <= $num+2){ ?>
                        <a href="?product_per_page=<?php echo $product_per_page ?>&&page=<?php echo $num ?>"><?php echo $num ?></a>
                    <?php } ?>
                <?php }else { ?>
                    <a class="active" href="?product_per_page=<?php echo $product_per_page ?>&&page=<?php echo $num ?>"><?php echo $num ?></a>
                <?php } ?>
            <?php } ?>
            <?php if($page < $totalpage){
                $Next = $page + 1;?>
                <a href="?product_per_page=<?php echo $product_per_page ?>&&page=<?php echo $Next ?>">
                    <span>&raquo;</span>
                    <span class="sr-only">$Next</span>
                </a>
            <?php } ?>
            <?php if($page < $totalpage - 2){ ?>
                    <a href="?product_per_page=<?php echo $product_per_page ?>&&page=<?php echo $totalpage ?>"><?php echo 'Last'; ?></a>
            <?php } ?>
        </div>
    </div>
    <!-- pagination -->

    <?php require_once "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>