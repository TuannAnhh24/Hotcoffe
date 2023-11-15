 <!-- CONTENT  -->
 <form action="index.php?act=quenmk" method="post" class="form">
    <img src="images/logo.png" alt="Avatar" class="avatar">
    <h2 class="title">Quên Mật Khẩu</h2>
    <label for="email"><b> Nhập Email Của Bạn </b></label>
    <input type="text" placeholder="Nhập email của bạn" name="email" class="common-class input-text" required> <br> <br>
    <input type="submit" class="btn" name="guiemail" value="Lấy Mật Khẩu"></input>
    <hr class="solid">
    <p class="chuthich">Bạn chưa có tài khoản? <a href="index.php?act=dangky" class="link">Đăng ký ngay</a>.</p>
    <p class="chuthich">Quay lại <a href="index.php?act=dangnhap" class="link">Đăng Nhập</a>.</p>
    <?php 
        if(isset($thongbao) && $thongbao != ""){
            echo $thongbao;
        }
        ?>
</form>
    <!-- END CONTENT  -->