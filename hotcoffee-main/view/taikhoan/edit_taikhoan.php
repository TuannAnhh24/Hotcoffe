<!-- CONTENT  -->
<?php
if (isset($_SESSION['email']) && (is_array($_SESSION['email']))) {
    extract($_SESSION['email']);
    $hinhpath = "images/" . $img;
    if (is_file($hinhpath)) {
        $hinh = $hinhpath;
    }
}
?>
<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_5">
        <div class="content_wrap">
            <h1 class="page_title">Hồ sơ</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="index.php">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Hồ sơ</span>
            </div>
        </div>
    </div>
</div>

<form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data" onsubmit="return validatePassword();">
    <div class="hoso">
        <div class="ho_so_cua_toi">
            <p>Thông tin người dùng</p>
            Quản lý thông tin hồ sơ để bảo mật tài khoản
        </div>
        <div class="thongtinhoso">
            <div class="thong_tin_ho_so">
                <table class="thongtin_user">
                    <tr>
                        <td>
                            <label for="username"><b>Họ tên người dùng</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" value="<?= $user ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="email"><b>Email</b></label>
                        </td>
                        <td>
                            <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email" value="<?= $email ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password"><b>Mật Khẩu</b></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="common-class password" value="<?= $pass ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password"><b>Nhập lại Mật Khẩu</b></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Nhập lại mật khẩu" name="pass_nl" id="pass_nl" class="common-class password" value="<?= $pass ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="number"><b>Nhập số điện thoại</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" value="<?= $sdt ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address"><b>Địa chỉ</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" value="<?= $dia_chi ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date"><b>Ngày tháng năm sinh</b></label>
                        </td>
                        <td>
                            <input type="date" placeholder="Nhập ngày tháng năm sinh" name="namsinh" value="<?= $nam_sinh ?>" required class="date"><br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="gioitinh"><b>Giới tính</b></label>
                        </td>
                        <td>
                            <select name="gioitinh">
                                <option value="">Chọn giới tính</option>
                                <option value="Nam" <?= $gioi_tinh == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                <option value="Nữ" <?= $gioi_tinh == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
                <div style="margin-left: 250px;">
                    <input type="hidden" name="id_tk" value="<?= $id_tk ?>">
                    <input type="submit" name="capnhat" class="btn" value="Cập nhật"></input>
                </div>
            </div>
            <div class="thong_tin_anh">
                <div class="anhdaidien">
                    Ảnh đại diện
                </div>
                <div class="hinhanh">
                    <img src="<?php echo $hinh ?>" alt="Avatar">
                </div>
                <div class="thaydoi">
                    <input type="file" name="hinhanh">
                </div>
                <div class="noidung">
                    Dụng lượng file tối đa 1 MB<br>
                    Định dạng:.JPEG, .PNG
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    document.querySelector('input[name="capnhat"]').addEventListener('click', function(e) {
        var gioi_tinh = document.querySelector('select[name="gioitinh"]').value;
        if (gioi_tinh == '') {
            e.preventDefault();
            alert('Vui lòng chọn giới tính.');
        }
    });
</script>