<?php
    require_once "condb.php";
    session_start();
    if(!isset($_SESSION['email_admin'])){
        header('location: login_admin.php');
    }

    $sql = "Select * from orders order by order_at desc";
    $result = mysqli_query($conn, $sql);

    if (isset($_POST['data'])) {
        $order_id = $_POST['data'];

        $sql2 = "Select * from orders where order_id = $order_id";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        
        $sql3 = "Select * from product inner join order_detail on product.product_id = order_detail.product_id where order_detail.order_id = $order_id";
        $result3 = mysqli_query($conn, $sql3);
        $data2 = array();
        while($row3 = mysqli_fetch_assoc($result3)){
            $data2[] = $row3;
        }

        echo json_encode(array('data1' => $row2, 'data2' => $data2));
        exit;
    }
    if(isset($_POST['order_id']) && isset($_POST['status'])){
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        $sql4 = "Update orders set status = '$status' where order_id = '$order_id'";
        $result4 = mysqli_query($conn, $sql4);
        exit;
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
    <link rel="stylesheet" href="/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once "header_admin.php"; ?>

    <div class="card">
        <div class="card-header">
            <h2>Danh sách đơn hàng</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Xem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stt = 1;
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr data-order_id="<?php echo $row["order_id"]; ?>">
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo $row["fullname"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["order_at"]; ?></td>
                                <td><?php echo $row["method"] == 'cash'? "Tiền mặt": "Trực tuyến"; ?></td>
                                <td>
                                    <span class="<?php echo $row["status"]; ?>" id="data_status">
                                        <?php
                                            switch($row["status"]){
                                                case 'Processing':
                                                    echo 'Đang xử lý';
                                                    break;
                                                case 'Confirmed':
                                                    echo 'Đã xác nhận';
                                                    break;
                                                case 'Delivering':
                                                    echo 'Đang vận chuyển';
                                                    break;
                                                case 'Finished':
                                                    echo 'Đã hoàn thành';
                                                    break;
                                                case 'Canceled':
                                                    echo 'Hủy bỏ';
                                                    break;
                                            }
                                        ?>
                                    </span>
                                </td>
                                <td><button class="btn btn-warning detail" data-toggle="modal" data-target="#Detail">Xem</button></td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="Detail">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi tiết đơn hàng</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" id="updateStatus">
                                <input type="hidden" id="order_id" name="order_id">
                                <h5 class="modal-title">Thông tin khách hàng và trạng thái đơn hàng</h5>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Họ và tên: &nbsp;</strong>
                                    <div id="fullname"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Email: &nbsp;</strong>
                                    <div id="email"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Số điện thoại: &nbsp;</strong>
                                    <div id="phone"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Địa chỉ: &nbsp;</strong>
                                    <div id="address"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Ngày đặt: &nbsp;</strong>
                                    <div id="order_at"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong >Phương thức: &nbsp;</strong>
                                    <div id="method"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Ghi chú: &nbsp;</strong>
                                    <div id="note"></div>
                                </div>
                                <div class="d-flex justify-content-start py-1">
                                    <strong>Trạng thái đơn hàng: &nbsp;</strong>
                                    <select name="status" id="status">
                                        <option value="Processing">Đang xử lý</option>
                                        <option value="Confirmed">Đã xác nhận</option>
                                        <option value="Delivering">Đang vận chuyển</option>
                                        <option value="Finished">Đã hoàn thành</option>
                                        <option value="Canceled">Hủy bỏ</option>
                                    </select>
                                </div>
                                <hr style="background-color: black;">
                                <h5 class="modal-title">Thông tin đơn hàng</h5><br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sp">

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-start py-1">
                                    <strong >Tổng tiền: &nbsp;</strong>
                                    <div id="total"></div>
                                </div>
                                <br>
                                <button type="submit" name ="updateStatus" class="btn btn-success">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".detail").click(function(){
                var order_id = $(this).closest('tr').data('order_id');
                
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: { data: order_id },
                    success: function(response) {
                        var order = jQuery.parseJSON(response);
                        
                        $("#fullname").html(order.data1['fullname']);
                        $("#email").html(order.data1['email']);
                        $("#phone").html(order.data1['phone']);
                        $("#address").html(order.data1['address']);
                        $("#order_at").html(order.data1['order_at']);
                        $("#method").html(order.data1['method'] == 'cash'? 'Tiền mặt': 'Trực tuyến');
                        $("#note").html(order.data1['note']);
                        $("#status").val(order.data1['status']);
                        $("#order_id").val(order_id);
                        
                        var out = "";
                        var total = 0;
                        $.each(order.data2, function(k, v){
                            total += parseInt(v['price'])*parseInt(v['quantity']);
                            out += "<tr><td>"+v['title']+"</td><td>"+v['quantity']+"</td><td>"+parseInt(v['price']).toLocaleString('en-US')+"đ</td></tr>";
                        });
                        $("#sp").html(out);
                        $("#total").html(total.toLocaleString('en-US')+"đ");
                    }
                });
            });
            $('#updateStatus').on('submit', function(event){
                event.preventDefault();
                var order_id = $("#order_id").val();
                var status = $("#status").val();
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {order_id: order_id, status: status},
                    success: function(response){
                        $('#Detail').modal('hide');
                        var st = "";
                        switch(status){
                            case 'Processing':
                                st = 'Đang xử lý';
                                break;
                            case 'Confirmed':
                                st = 'Đã xác nhận';
                                break;
                            case 'Delivering':
                                st = 'Đang vận chuyển';
                                break;
                            case 'Finished':
                                st = 'Đã hoàn thành';
                                break;
                            case 'Canceled':
                                st = 'Hủy bỏ';
                                break;
                        }
                        $('tr[data-order_id="' + order_id + '"]').find("#data_status").html(st);
                        $('tr[data-order_id="' + order_id + '"]').find("#data_status").removeClass();
                        $('tr[data-order_id="' + order_id + '"]').find("#data_status").addClass($("#status").val());
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>