<?php
    require_once "condb.php";
    session_start();
    if(!isset($_SESSION['email_admin'])){
        header('location: login_admin.php');
    }

    // LoadDM
    $sql = "Select * from category";
    $result = mysqli_query($conn, $sql);
    // LoadDM

    // ThemDM
    if(isset($_POST['themdm'])) {
        $name = $_POST['name'];
        $sql1 = "Insert into category(name) values('$name')";
        $result1 = mysqli_query($conn, $sql1);
        header('location: list_category.php');
    }
    // ThemDM

    // SuaDM
    if(isset($_POST['suadm'])){
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $sql2 = "Update category set name = '$name' where category_id = '$category_id'";
        $result2 = mysqli_query($conn, $sql2);
        header('location: list_category.php');
    }
    // SuaDM
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="/img/logo.png">
    <title>ShopNike</title>
    <link rel="stylesheet" href="/css/style_admin.css">
    <link rel="stylesheet" href="/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once "header_admin.php"; ?>

    <div class="card">
        <div class="card-header">
            <h2>Danh sách danh mục</h2>
        </div>
        <div class="mt-3 ml-3">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#ThemDM">Thêm danh mục</a>
            <!-- The Modal -->
            <div class="modal fade" id="ThemDM">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm danh mục</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <button name ="themdm" class="btn btn-success" type="submit">Thêm danh mục</button>
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
                        <th>Tên danh mục</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $STT = 1;
                        while ($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $STT++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><a href="#" class="btn btn-warning update" data-toggle="modal" data-target="#SuaDM" data-category_id="<?php echo $row['category_id']; ?>" data-name="<?php echo $row['name']; ?>">Sửa</a></td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>

            <!-- The Modal -->
            <div class="modal fade" id="SuaDM">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa danh mục</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group d-none">
                                    <label for="">Id</label>
                                    <input type="number" name="category_id" class="form-control" id="category_id">
                                </div>

                                <div class="form-group">
                                    <label for="">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>

                                <button name ="suadm" class="btn btn-success" type="submit">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.update').on("click", function(){
                var category_id = $(this).data('category_id')
                var name = $(this).data('name');
                
                $('#category_id').val(category_id);
                $('#name').val(name);
            });
        });
    </script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>