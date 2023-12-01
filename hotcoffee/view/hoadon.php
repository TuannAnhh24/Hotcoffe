<div class="hoso">
    <div class="ho_so_cua_toi">
        <p>Xác nhận đặt hàng</p>
        Kiểm tra thông tin đơn hàng
    </div>
    <form  action="" method="post">
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
                                    <textarea name="address" id="address" cols="30" rows="5">'.$dia_chi.'</textarea>
                                    <!-- <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text"  required> -->
                                </td>
                            </tr>';
                    }else{
                        echo '
                                <tr >
                                    <td>
                                        <label for="username"><b>Họ tên người dùng</b></label>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text"  required>
                                    </td>
                                </tr> 
        
                                <tr>
                                    <td>
                                        <label for="email"><b>Email</b></label>
                                    </td>
                                    <td>
                                        <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email"  required >
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>
                                        <label for="number"><b>Số điện thoại</b></label>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text"  required>
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>
                                        <label for="address"><b>Địa chỉ</b></label>
                                    </td>
                                    <td>
                                        <textarea name="address" id="address" cols="30" rows="5" placeholder="Nhập địa chỉ" required></textarea>
                                        <!-- <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" value="  $dia_chi " required> -->
                                    </td>
                                </tr>
                            ';
                    }
                ?>
                
                </table>
                
                <div class="luu">
                    <input type="hidden" name="id_tk" value="<?=$id_tk?>">
                    <?php 
                        if(isset($_SESSION['email'])){
                        }else{
                            echo '<a href="index.php?act=dangnhap"><input style="margin-right: 110px;" type="submit" name="dangnhap" class="btn" value="Đăng Nhập"></input></a>';
                        }
                    ?> 
                    <input style="margin-right: 180px;"  type="submit" name="thanhtoan" class="btn" value="Thanh toán"></input>
                    
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
                        <td><?=$ttien?> VNĐ</td> 
                        <!-- <input style="width: 100px;" name="thanhtien" type="text" value=""  readonly> -->
                    </tr>
                    
                    <?php }   ?>
                </table> <br>
                <div class="muahang">
                    <div class="khoang_trong"></div>
                    <div class="tong_tien_cac_san_pham"> 
                    <strong>Tổng tiền các sản phẩm :</strong>  <input style="font-weight: 900;" name="tongtien" type="text" value="<?=$tong?> VNĐ" readonly>   
                    </div>
                </div>
                    Phương thức thanh toán*: <br>
                    <input type="radio" name="pttt" value="Thanh toán bằng tiền mặt" checked> Thanh toán bằng tiền mặt <br>
                    <!-- <input type="radio" name="pttt" id=""> Thanh toán bằng ngân hàng -->
                    
            </div>
            
        </div>
    </form>
</div>