<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .orders {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .order-item {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 50px;
        }
        h2 {
            margin: 0;
        }
        p {
            font-size: 24px;
            color: #5031eb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="orders">
        <h1>Tất cả đơn hàng</h1>
        <!-- Mỗi đơn hàng sẽ được hiển thị trong một div .order-item -->
        <?php 
            if(isset($_SESSION['email'])){
                extract($_SESSION['email']);
            }
            foreach ($listhoadon as $hd){
                extract($hd);
                if($trang_thai==0){
                    $trang_thai = "Chờ Xác Nhận";
                }else if($trang_thai==1){
                    $trang_thai = "Đã Xác Nhận";
                }else if($trang_thai==2){
                    $trang_thai = "Đang Vận Chuyển";
                }else if($trang_thai==3){
                    $trang_thai = "Đã Hoàn Thành";
                }else if($trang_thai==4){
                    $trang_thai = "Đã Hủy";
                }
        ?>
        <div class="order-item">
            <table>
                <tr>
                    <!-- <th></th> -->
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Sản phẩm</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                </tr>
                <tr>
                    <!-- <td><input type="checkbox" name="" id=""></td> -->
                    <td><?= $id_hd ?></td>
                    <td>
                    👤 <?php echo $sdt." - ";  echo $user; ?><br>
                    🏚  <?php  echo "Địa chỉ: ".$dia_chi?>
                    </td>
                    <td><a href="index.php?act=chitiethoadon&id_hd=<?=$id_hd?>"><input style="border: 1px solid #ccc; color: #5031eb; width: 180px; font-size: 12px;" type="button" value="Xem chi tiết hóa đơn"></input></a></td>
                    <td><?= $tong_tien ?> VNĐ</td>
                    <td><?= $phuong_thuc_tt ?></td>
                    <td><?= $trang_thai ?></td>
                </tr>
            </table>
        </div>
        <?php } ?>
    </div>
</body>
</html>
