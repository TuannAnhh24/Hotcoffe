<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Đơn hàng</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <h1 class="font_title">DANH SÁCH ĐƠN HÀNG</h1>
        <form class="row g-3 align-items-center" action="" method="POST">
            <div class="col-md-auto">
                <select class="form-select" name="trangThai">
                    <option value="">Tất cả</option>
                    <option value="0">Chờ Xác Nhận</option>
                    <option value="1">Đã Xác Nhận</option>
                    <option value="2">Đang Vận Chuyển</option>
                    <option value="3">Đã Hoàn Thành</option>
                    <option value="4">Đã Hủy</option>
                </select>
            </div>
            <div class="col-md-auto">
                <input type="date" class="form-control" name="ngayBatDau">
            </div>
            <div class="col-md-auto">
                <input type="date" class="form-control" name="ngayKetThuc">
            </div>
            <div class="col-md-auto">
                <button type="submit" name="filter" class="btn btn-primary">Lọc</button>
            </div>
        </form>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Hóa đơn</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION)) {
                        extract($_SESSION);
                    }
                    foreach ($listhoadon as $hd) {
                        extract($hd);
                        $ngay_dat = DateTime::createFromFormat('Y-m-d', $ngay_dat)->format('d-m-Y');
                        if ($trang_thai == 0) {
                            $trang_thai = "Chờ Xác Nhận";
                        } else if ($trang_thai == 1) {
                            $trang_thai = "Đã Xác Nhận";
                        } else if ($trang_thai == 2) {
                            $trang_thai = "Đang Vận Chuyển";
                        } else if ($trang_thai == 3) {
                            $trang_thai = "Đã Hoàn Thành";
                        } else if ($trang_thai == 4) {
                            $trang_thai = "Đã Hủy";
                        }
                        $xacnhandonhang = 'index.php?act=xacnhandonhang&id_hd=' . $id_hd;
                        $giaodonhang = 'index.php?act=giaodonhang&id_hd=' . $id_hd;
                        $xoadh = 'index.php?act=xoadh&id_hd=' . $id_hd;
                    ?>
                        <tr>
                            <!-- <td><input type="checkbox" name="" id=""></td> -->
                            <td><?= $id_hd ?></td>
                            <td><?= $ngay_dat ?></td>
                            <td>
                                👤 <?php echo $sdt . " - ";
                                    echo $user; ?><br>
                                🏚 <?php echo "Địa chỉ: " . $dia_chi ?>
                            </td>
                            <td><a href="index.php?act=chitiethoadon&id_hd=<?= $id_hd ?>"><button type="button" class="btn btn-primary">Xem chi tiết hóa đơn</button></input></a></td>
                            <td><?= number_format($tong_tien, 0, '.', ',') ?> VNĐ</td>
                            <td><?= $phuong_thuc_tt ?></td>
                            <td><?= $trang_thai ?></td>
                            <td>
                                <?php
                                if ($trang_thai == "Chờ Xác Nhận") {
                                    echo '<a href="' . $xacnhandonhang . '"><input type="button" class="btn btn-success" value="Xác Nhận"></a>';
                                } else if ($trang_thai == "Đã Xác Nhận") {
                                    echo '<a href="' . $giaodonhang . '"><input type="button" class="btn btn-primary" value="Giao"></a> ';
                                } else if ($trang_thai == "Đã Hoàn Thành") {
                                    echo ' <a onclick="return confirm("Bạn có chắc muốn xóa danh mục này không?")" href="' . $xoadh . '"><input type="button"  class="btn btn-danger" value="Xóa"></a>';
                                } else if ($trang_thai == "Đã Hủy") {
                                    echo ' <a onclick="return confirm("Bạn có chắc muốn xóa danh mục này không?")" href="' . $xoadh . '"><input type="button" class="btn btn-danger" value="Xóa"></a>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>