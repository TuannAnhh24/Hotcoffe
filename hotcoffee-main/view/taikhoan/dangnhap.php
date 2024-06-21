<!-- CONTENT  -->
<form action="index.php?act=dangnhap" method="post" class="form">
    <img src="images/logo.png" alt="Avatar" class="avatar">
    <h2 class="title">Đăng Nhập</h2>
    <?php if (!empty($login_error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $login_error ?>
    </div>
    
<?php endif; ?>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Nhập Email" name="email" class="common-class email" required>
    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="pass" class="common-class password" required>
    <input type="submit" name="dangnhap" class="btn" value="Đăng Nhập"></input>
    <div class="container">
        <label>
            <input type="checkbox" checked="checked" name="remember" class="checkbox"> Nhớ đăng nhập
        </label>
        <span class="psw"><a href="index.php?act=quenmk" class="link">Quên mật khẩu?</a></span>
    </div>
    <hr>
    <p>Bạn chưa có tài khoản? <a href="index.php?act=dangky" class="link">Đăng ký ngay</a>.</p>
   
</form>


<!-- END CONTENT  -->
