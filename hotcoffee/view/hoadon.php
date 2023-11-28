<div class="hoso">
    <div class="ho_so_cua_toi">
        <p>Xác nhận đặt hàng</p>
        Kiểm tra thông tin đơn hàng
    </div>
    <div class="thongtinhoso">
        <div class="thong_tin_ho_so">
           <table class="thongtin_user">
                <tr >
                    <td>
                        <label for="username"><b>Họ tên người dùng</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" value="<?= $user?>" required>
                    </td>
                </tr> 

                <tr>
                    <td>
                        <label for="email"><b>Email</b></label>
                    </td>
                    <td>
                        <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email" value="<?= $email?>" required >
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="number"><b>Số điện thoại</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" value="<?= $sdt?>" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="address"><b>Địa chỉ</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" value="<?= $dia_chi?>" required>
                    </td>
               </tr>

            </table>
            
            <div class="luu">
                <input type="hidden" name="id_tk" value="<?=$id_tk?>">
                <input type="submit" name="capnhat" class="btn" value="Cập nhật"></input>
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
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </table> <br>
            <div class="muahang">
                <div class="khoang_trong"></div>
                <div class="tong_tien_cac_san_pham"> 
                    Tổng tiền các sản phẩm : <strong>'.$tong.' VNĐ</strong>    
                </div>
            </div>
                Phương thức thanh toán*: <br>
                <input type="radio" name="pttt" id="" checked> Thanh toán bằng tiền mặt <br>
                <input type="radio" name="pttt" id=""> Thanh toán bằng ngân hàng
                
        </div>
        
    </div>
</div>