<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Khách hàng</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Khách hàng</a></li>
                    <li class="breadcrumb-item active">Danh sách tài khoản</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h1 class="card-title">DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="card-body">
        <form action="#" method="POST">
            <div class="row mb-3">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <!-- <td></td> -->
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Mật Khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Năm sinh</th>
                            <th>Ảnh</th>
                            <th>Giới tính</th>
                            <th>Vai trò</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listtaikhoan as $taikhoan) {
                            extract($taikhoan);
                            $xoatk = 'index.php?act=xoatk&id_tk=' . $id_tk;
                            $hinhbath = "../images/" . $img;
                            // check admin 
                            if ($phan_quyen == 1) {
                                $phan_quyen = "admin";
                            } else {
                                $phan_quyen = "khách hàng";
                            }
                            // check hình ảnh
                            if (file_exists($hinhbath)) {
                                $hinh = $hinhbath;
                            } else {
                                $hinh = "<p>Hình ảnh chưa được upload</p>";
                            }
                        ?>
                            <tr>
                                <!-- <td><input type="checkbox" name="" id=""></td> -->
                                <td><?= $user ?></td>
                                <td><?= $email ?></td>
                                <td><?= $pass ?></td>
                                <td><?= $sdt ?></td>
                                <td><?= $dia_chi ?></td>
                                <td><?= $nam_sinh ?></td>
                                <td><img src="<?= $hinh ?>" width="100px" height="50px"></td>
                                <td><?= $gioi_tinh ?></td>
                                <td><?= $phan_quyen ?></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản người dùng không?')" href="<?= $xoatk ?>">
                                        <div class="xoa">
                                            <input type="button" class="btn btn-danger" value="Xóa">
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="">

            </div>
        </form>
    </div>
</div>