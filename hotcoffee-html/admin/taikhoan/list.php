<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Mật Khẩu</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>ĐỊA CHỈ</th>
                        <th>Năm sinh</th>
                        <th>Ảnh</th>
                        <th>Giới tính</th>
                        <th>Phân Quyền</th>
                        <td></td>
                    </tr>
                    <?php 
                        foreach($listtaikhoan as $taikhoan){
                            extract($taikhoan);
                            $xoatk = 'index.php?act=xoatk&id='.$id;

                            echo ' <tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$user.'</td>
                                    <td>'.$pass.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$sdt.'</td>
                                    <td>'.$dia_chi.'</td>
                                    <td>'.$nam_sinh.'</td>
                                    <td><img src="'.$img.'" alt=""></td>
                                    <td>'.$gioi_tinh.'</td>
                                    <td>'.$phan_quyen.'</td>
                                    <td><a href="'.$xoatk.'"><input type="button" value="Xóa"></td></a>
                                    </tr>';
                        }
                    ?> 
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