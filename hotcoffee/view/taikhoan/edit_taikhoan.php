<!-- CONTENT  -->
<?php
    if(isset($_SESSION['email']) && (is_array($_SESSION['email']))){
        extract($_SESSION['email']);
    }
?>
<form action="index.php?act=edit_taikhoan" method="post" class="form" onsubmit="return validatePassword();">
    <img src="images/logo.png" alt="Avatar" class="avatar">
    <h2 class="title">Cập nhật thông tin người dùng</h2>
    <label for="username"><b>Họ tên người dùng</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" value="<?= $user?>" required>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email" value="<?= $email?>" required >
    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="common-class password" value="<?= $pass?>" required >
    <label for="password"><b>Nhập lại Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập lại mật khẩu" name="pass_nl" id="pass_nl" class="common-class password" value="<?= $pass?>" required>
    <label for="number"><b>Nhập số điện thoại</b></label>
    <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" value="<?= $sdt?>" required>
    <label for="address"><b>Địa chỉ</b></label>
    <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" value="<?= $dia_chi?>" required>
    <label for="date"><b>Ngày tháng năm sinh</b></label>
    <input type="date" placeholder="Nhập ngày tháng năm sinh" name="namsinh" value="<?= $nam_sinh?>" required class="date"><br>
    <label for="gioitinh"><b>Giới tính</b></label>
    <select name="gioitinh"  >
        <option value="">Chọn giới tính</option>
        <option value="Nam" <?=$gioi_tinh == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?=$gioi_tinh == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select>
   <br> <br>
    <input type="hidden" name="id_tk" value="<?=$id_tk?>">
    <input type="submit" name="capnhat" class="btn" value="Cập nhật"></input>
    <hr class="solid">
</form>
    
    <!-- END CONTENT  -->