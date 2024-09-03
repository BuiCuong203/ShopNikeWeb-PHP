<?php
    require_once "condb.php";
    session_start();
    if(!isset($_SESSION['email_admin'])){
        header('location: login_admin.php');
    }

    // LoadSP
    $product_per_page = 5;
    $page = !empty($_GET['page'])? $_GET['page']: 1;
    $offset = ($page - 1) * $product_per_page;
    $totalproduct = mysqli_query($conn, "Select * from product");
    $totalproduct = mysqli_num_rows($totalproduct);
    $totalpage = ceil($totalproduct / $product_per_page);

    $sql = "Select * from product inner join category on product.category_id = category.category_id order by product_id asc limit $product_per_page offset $offset";
    $result = mysqli_query($conn, $sql);
    // LoadSP
 
    // ThemSP
    $sql1 = 'Select * from category';
    $result1 = mysqli_query($conn, $sql1);
    if(isset($_POST['themsp'])) {
        $title = $_POST["title"];
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $price = $_POST["price"];
        $discount = $_POST["discount"];
        $description = $_POST["description"];
        $category_id = $_POST["category_id"];
        
        $sql2 = "Insert into product(category_id, title, price, discount, image, description) values('$category_id', '$title', '$price', '$discount', '$image', '$description')";
        $result2 = mysqli_query($conn, $sql2);
        move_uploaded_file($image_tmp,'img/product/'.$image);

        if($totalproduct % $product_per_page == 0){
            $totalpage++;
            header("location: list_product.php?product_per_page=$product_per_page&&page=$totalpage");
        }else{
            header("location: list_product.php?product_per_page=$product_per_page&&page=$totalpage");
        }
        
    }
    // ThemSP
        
    // SuaSP
    $sql3 = 'Select * from category';
    $result3 = mysqli_query($conn, $sql3);
    if(isset($_POST['suasp'])) {
        $product_id = $_POST['product_id'];
        $sql5 = "Select * from product where product_id = '$product_id'";
        $result5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_assoc($result5);
        $title = $_POST['title'];
        if($_FILES['image']['name'] == '') {
            $image = $row5['image'];
        }else {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,"img/product/".$image);
        }
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];

        $sql4 = "Update product set title = '$title', image = '$image', price = $price, discount = $discount, description = '$description', category_id = '$category_id' where product_id = '$product_id'";
        $result4 = mysqli_query($conn, $sql4);

        $page = $_GET['page'];
        header("location: list_product.php?product_per_page=$product_per_page&&page=$page");
    }
    // SuaSP
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
<body>
    <?php require_once "header_admin.php"; ?>
    
    <div class="card">
        <div class="card-header">
            <h2>Danh sách sản phẩm</h2>
        </div>
        <div class="mt-3 ml-3">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#ThemSP">Thêm sản phẩm</a>
            <!-- The Modal -->
            <div class="modal fade" id="ThemSP">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm sản phẩm</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh sản phẩm</label><br>
                                    <input type="file" name="image" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Giá gốc</label>
                                    <input type="number" name="price" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Giảm giá</label>
                                    <input type="number" name="discount" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea cols="" rows="5" name="description" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <select name="category_id" class="form-control">
                                    <?php
                                    while($row1 = mysqli_fetch_assoc($result1)){ ?>
                                        <option value="<?php echo $row1['category_id']; ?>"><?php echo $row1['name']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <button name ="themsp" class="btn btn-success" type="submit">Thêm sản phẩm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Giảm giá</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $STT = $offset + 1;
                        while ($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $STT++; ?></td>
                                <td><img style="width: 100px" src="/img/product/<?php echo $row["image"]; ?>" alt="hinh anh"></td>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo number_format($row["price"], 0, ".", ","); ?>đ</td>
                                <td><?php echo number_format($row["discount"], 0, ".", ","); ?>đ</td>
                                <td><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><a class="btn btn-warning update" href="#" data-toggle="modal" data-target="#SuaSP" data-product_id="<?php echo $row["product_id"]; ?>" data-title="<?php echo $row["title"]; ?>" data-price="<?php echo $row["price"]; ?>" data-discount="<?php echo $row["discount"]; ?>" data-description="<?php echo $row["description"]; ?>" data-category_id="<?php echo $row["category_id"]; ?>">Sửa</a></td>
                                <td><a onclick="return Del('<?php echo $row['title']; ?>')" class="btn btn-danger" href="delete.php?product_id=<?php echo $row["product_id"]; ?>">Xóa</a></td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>

            <!-- The Modal -->
            <div class="modal fade" id="SuaSP">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa sản phẩm</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group d-none">
                                    <label for="">Id</label>
                                    <input type="text" name="product_id" class="form-control" id="product_id">
                                </div>

                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh sản phẩm</label><br>
                                    <input type="file" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="">Giá gốc</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                </div>

                                <div class="form-group">
                                    <label for="">Giảm giá</label>
                                    <input type="number" name="discount" class="form-control" id="discount">
                                </div>

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea cols="" rows="5" name="description" class="form-control" id="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                    <?php
                                    while($row3 = mysqli_fetch_assoc($result3)){ ?>
                                        <option value="<?php echo $row3['category_id']; ?>"><?php echo $row3['name']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <button name ="suasp" class="btn btn-success" type="submit">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

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
    </div>

    <script>
        function Del(name) {
            return confirm("Bạn có muốn xóa sản phẩm \"" + name + "\" không?");
        }

        $(document).ready(function(){
            $('.update').on("click", function(){
                var product_id = $(this).data('product_id');
                var title = $(this).data('title');
                var price = $(this).data('price');
                var discount = $(this).data('discount');
                var description = $(this).data("description");
                var category_id = $(this).data('category_id');

                $('#product_id').val(product_id);
                $('#title').val(title);
                $('#price').val(price);
                $('#discount').val(discount);
                $("#description").val(description);
                $('#category_id').val(category_id);
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>