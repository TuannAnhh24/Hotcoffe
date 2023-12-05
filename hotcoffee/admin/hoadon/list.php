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
                                $trang_thai = "Đã Xác Nhận";
                            }else if($trang_thai==2){
                                $trang_thai = "Đang Vận Chuyển";
                            }else if($trang_thai==3){
                                $trang_thai = "Đã Hoàn Thành";
                            }else if($trang_thai==4){
                                $trang_thai = "Đã Hủy";
                            }
                            $xacnhandonhang = 'index.php?act=xacnhandonhang&id_hd='.$id_hd;
                            $giaodonhang = 'index.php?act=giaodonhang&id_hd='.$id_hd;
                            $xoadh = 'index.php?act=xoadh&id_hd='.$id_hd;
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
                                <?php 
                                    if($trang_thai=="Chờ Xác Nhận"){
                                        echo '<a href="'.$xacnhandonhang.'"><input type="button" value="Xác Nhận"></a>';
                                    }else if($trang_thai=="Đã Xác Nhận"){
                                        echo '<a href="'.$giaodonhang.'"><input type="button" value="Giao"></a> ';
                                    }else if ($trang_thai == "Đã Hoàn Thành"){
                                        echo ' <a onclick="return confirm("Bạn có chắc muốn xóa danh mục này không?")" href="'.$xoadh.'"><input type="button" value="Xóa"></a>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                
                </table>
                 <!----------------------- Phân trang ----------------------->
            <nav id="pagination" class="pagination_wrap pagination_pages">
                    <?php
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a class="pager_prev" href="index.php?act=dsdh&page='.($current_page-1).'"></a> ';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        
                        if ($i == $current_page){
                            echo ' <span class="pager_current active ">'.$i.'</span>';
                        }
                        else{
                            echo '<a href="index.php?act=dsdh&page='.$i.'">'.$i.'</a>';
                        }
                    }
                        ?>
                </nav>                            

            </div>
               
        </form>
                      
    </div>
    
</div>
</div> 