<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH ĐƠN HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <!-- <th></th> -->
                <th>Mã đơn</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </tr>
            <?php 
                if(isset($_SESSION['email'])){
                    extract($_SESSION['email']);
                }
                foreach ($listhoadon as $hd){
                    extract($hd);
                    if($trang_thai==0){
                        $trang_thai = "Chờ Xác Nhận";
                    }else if($trang_thai==1){
                        $trang_thai = "Đang vận chuyển";
                    }
            ?>
                     <tr>
                        <!-- <td><input type="checkbox" name="" id=""></td> -->
                        <td><?= $id_hd ?></td>
                        <td>
                        👤 <?php echo $sdt." - ";  echo $user; ?><br>
                        🏚  <?php  echo "Địa chỉ: ".$dia_chi?>
                        </td>
                        <td><a href="index.php?act=chitiethoadon&id_hd=<?=$id_hd?>"><input style="border: 1px solid #ccc; color: #5031eb; width: 180px; font-size: 12px;" type="button" value="Xem chi tiết hóa đơn"></input></a></td>
                        <td><?= $tong_tien ?> VNĐ</td>
                        <td><?= $phuong_thuc_tt ?></td>
                        <td><?= $trang_thai ?></td>
                        <td>
                            <a href="<?=$suadm?>"><input type="button" value="Xác Nhận"></a>   
                            <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="<?=$xoadm?>"><input type="button" value="Đang vận chuyển"></a>
                            <!-- <a href="<?=$kpdm?>"><input type="button" value="Khôi phục"></a>  -->
                            Đã hoàn thành
                        </td>
                    </tr>
                <?php } ?>
            
           </table>
           </div>
           <!-- <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div> -->
          </form>
         </div>
        </div>
    </div> 