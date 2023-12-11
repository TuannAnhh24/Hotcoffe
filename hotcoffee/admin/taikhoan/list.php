<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <!-- <td></td> -->
                        <th>Họ Tên </th>
                        <th>Email</th>
                        <th>Mật Khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Năm sinh</th>
                        <th>Ảnh</th>
                        <th>Giới tính</th>
                        <th>Vai trò</th>
                        <td></td>
                    </tr>
                    <?php 
                        foreach($listtaikhoan as $taikhoan){
                            extract($taikhoan);
                            $xoatk = 'index.php?act=xoatk&id_tk='.$id_tk;
                            $hinhbath = "../images/".$img;
                            // check admin 
                            if ($phan_quyen == 1){
                                $phan_quyen = "admin";
                            }else {
                                $phan_quyen = "khách hàng";
                            }
                            // check hình ảnh
                            if(file_exists($hinhbath)){
                                $hinh = $hinhbath;
                            }else {
                                $hinh = "<p>Hình ảnh chưa được upload</p>";
                            }
                            
                    ?> 
                             <tr>
                                    <!-- <td><input type="checkbox" name="" id=""></td> -->
                                    <td> <?=$user?> </td>
                                    <td> <?=$email?> </td>
                                    <td> <?=$pass?> </td>
                                    <td> <?=$sdt?> </td>
                                    <td> <?=$dia_chi?> </td>
                                    <td> <?=$nam_sinh?> </td>
                                    <td> <img src="<?= $hinh?>" width="100px" height="50px"> </td>
                                    <td> <?=$gioi_tinh?> </td>
                                    <td> <?=$phan_quyen?> </td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa tài khoản người dùng không?')" href="<?=$xoatk?>"><div class="xoa"><input type="button" value="Xóa"></div></td></a>
                                    </tr>
                        <?php } ?>
                    
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
            </div>
        </form>
    </div>
</div>
</div> 