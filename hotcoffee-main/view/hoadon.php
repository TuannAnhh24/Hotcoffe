<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_5">
        <div class="content_wrap">
            <h1 class="page_title">Thanh Toán</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="index.html">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Thanh Toán</span>
            </div>
        </div>
    </div>
</div>
<div class="hoso">
    <div class="ho_so_cua_toi">
        <p>Xác nhận đặt hàng</p>
        Kiểm tra thông tin đơn hàng
    </div>
    <form  action="" method="post" id="checkoutForm" onsubmit="return validatePayment()">
        <div class="thongtinhoso">
            <div class="thong_tin_ho_so">
            <table class="thongtin_user">
                <?php
                    if(isset($_SESSION['email'])){
                        echo '<tr >
                                <td>
                                    <label for="username"><b>Họ tên người dùng</b></label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" value="'.$user.'" required>
                                </td>
                            </tr> 

                            <tr>
                                <td>
                                    <label for="email"><b>Email</b></label>
                                </td>
                                <td>
                                    <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email" value="'.$email.'" required >
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="number"><b>Số điện thoại</b></label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" value="'.$sdt.'" required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="address"><b>Địa chỉ</b></label>
                                </td>
                                <td>
                                    <textarea name="address" id="address" cols="30" rows="5" required>'.$dia_chi.'</textarea>
                                    <!-- <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text"  required> -->
                                </td>
                            </tr>';
                    }else{
                        echo 'BẠN CẦN PHẢI ĐĂNG NHẬP ĐỂ THANH TOÁN';
                    }
                ?>
                
                </table>
                
                <div class="luu">
                    <input type="hidden" name="id_tk" value="<?=$id_tk?>">
                    <?php 
                        if(isset($_SESSION['email'])){
                            echo '<input style="margin-right: 180px;"  type="submit" name="thanhtoan" class="btn" value="Thanh toán"  ></input>';
                        }else{
                            echo '<a href="index.php?act=dangnhap"><input style="margin-right: 110px;" type="button" name="dangnhap" class="btn" value="Đăng Nhập"></input></a>';
                        }
                    ?> 
                    
                    
                </div>
            </div>

            <div class="sloid"></div>
            
            <div class="thong_tin_ho_so">
                <table class="check_san_pham">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Size(Cái)</th>
                        <th>Số lượng</th>
                        <th>Lượng đá</th>
                        <th>Lượng đường</th>
                        <th>Tổng tiền</th>
                        
                    </tr>

                    <?php 
                        $tong=0;
                        $ttien=0;
                        $i=0;
                        foreach ($_SESSION['mycart'] as $cart){
                            if($cart[5]=="M"){
                                $ttien=$cart[3]*$cart[1];
                            }elseif($cart[5]=="L"){
                                $ttien=($cart[3]+$cart[3]*15/100)*$cart[1];
                            }elseif($cart[5]=="XL"){
                                $ttien=($cart[3]+$cart[3]*25/100)*$cart[1];
                            } 
                        $tong+=$ttien;
                    ?>
        
                    <tr>
                        <td><?= $cart[0] ?></td>
                        <td><?= $cart[5] ?></td>
                        <td><?= $cart[1] ?></td>
                        <td><?= $cart[6] ?></td>
                        <td><?= $cart[7] ?></td>
                        <td><input style="width: 150px;" name="thanhtien" type="text" value="<?=$ttien?>"  readonly>VNĐ</td> 
                    </tr>
                    
                    <?php }   ?>
                </table> <br>
                <div class="muahang">
                    <div class="khoang_trong"></div>
                    <div class="tong_tien_cac_san_pham"> 
                    <strong>Tổng tiền các sản phẩm :</strong>
                    <!-- Sử dụng PHP để hiển thị giá trị tổng tiền -->
                    <?php if (isset($tongMoi)) { ?>
                        <!-- Nếu đã áp mã giảm giá -->
                        <input style="font-weight: 900;" id="tongtienInput" name="tongtien" type="text" value="<?= $tongMoi ?>" readonly>   
                    <?php } else { ?>
                        <!-- Nếu chưa áp mã giảm giá -->
                        <input style="font-weight: 900;" id="tongtienInput" name="tongtien" type="text" value="<?= $tongT ?> " readonly> 
                    <?php } ?>    
                </div>
                 
                </div>
                    <div>
                    <?php if (!isset($maGiamgia) || !$maGiamgiaHople) { ?>
                        
                        <!-- Nếu chưa nhập mã giảm giá -->
                        <form action="" method="post">
                        <?php 
                            if(isset($thongBao) && $thongBao != ""){
                            echo '<h5 style="color: red;">Mã Không hợp lệ! Vui lòng nhập lại!!</h5>';
                            }
                        ?>
                            <h5><span>Nhập mã giảm giá</span></h5>
                            <input type="text" name="maVoucher" id="maVoucherInput">
                            <input type="submit" name="maGg" value="Nhập mã giảm giá">
                        </form>
                    <?php } else { ?>
                        <!-- Nếu đã nhập mã giảm giá -->
                        <h5><span>Mã giảm giá đã nhập: <?=$maGiamgia?></span></h5>
                        <h5><span>Số tiền được giảm: <?=$voucher['gia_tri']?> VNĐ</span></h5>
                        <input type="hidden" name="id_vc" value="<?=$voucher['id_vc']?>">
                    <?php } ?>
                     </div>  
                    Phương thức thanh toán*: <br>
                    <input type="radio" name="pttt" value="Thanh toán bằng tiền mặt" checked> Thanh toán bằng tiền mặt<br>
                    <input type="radio" name="pttt" value="Thanh toán bằng VN Pay"> Thanh toán bằng VN Pay
                    <img src="images/vnpay.png" style="width: 70px; height: 50px;">
                    <!-- <input type="radio" name="pttt" id=""> Thanh toán bằng ngân hàng -->
                    
            </div>
            
        </div>
    </form>
    
    <script>
    function validatePayment() {
        var selectedPaymentMethod = false;
        var selectedVoucher = false;

        // Kiểm tra xem người dùng đã chọn phương thức thanh toán chưa
        var paymentOptions = document.getElementsByName('pttt');
        for (var i = 0; i < paymentOptions.length; i++) {
            if (paymentOptions[i].checked) {
                selectedPaymentMethod = true;
                break;
            }
        }

        // Kiểm tra xem người dùng đã nhập mã voucher hay chưa
        var voucherInput = document.getElementById('maVoucherInput').value;
        if (voucherInput.trim() !== '') {
            selectedVoucher = true;
        }

        // Kiểm tra điều kiện: cần chọn ít nhất một trong hai tùy chọn
        if (!selectedPaymentMethod && !selectedVoucher) {
            alert('Vui lòng chọn phương thức thanh toán hoặc nhập mã giảm giá.');
            return false; // Ngăn chặn form submit khi không có lựa chọn nào được chọn
        }
        return true; // Cho phép form submit nếu đã chọn ít nhất một trong hai tùy chọn
    }
</script>
</div>