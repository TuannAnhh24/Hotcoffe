<!-- CONTENT  -->
<form action="/login" method="post" class="form">
        <img src="images/logo.png" alt="Avatar" class="avatar">
        <h2 class="title">Đăng Nhập</h2>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Nhập Email" name="email" class="common-class email" required>
        <label for="password"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="password" class="common-class password" required>
        <button type="submit" class="btn">Đăng Nhập</button>
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