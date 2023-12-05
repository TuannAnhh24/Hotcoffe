<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_5">
        <div class="content_wrap">
            <h1 class="page_title">Chi tiết đơn hàng</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="index.php">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Chi tiết đơn hàng</span>
            </div>
        </div>
    </div>
</div>

<div class="chi_tiet_hang_hoa">
    <table class="bang">
        <tr class="dong">
            <th class="cot">Khách hàng</th>
            <th class="cot">Sản phẩm</th>
            <th class="cot">Tổng tiền</th>
            <th class="cot">Phương thức thanh toán</th>
            <th class="cot">Trạng thái</th>
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
                    $trang_thai = "Sản phẩm đang được chuẩn bị";
                }else if($trang_thai==2){
                    $trang_thai = "Đang giao hàng";
                }else if($trang_thai==3){
                    $trang_thai = "Đã hoàn thành";
                }else if($trang_thai==4){
                    $trang_thai = "Đã Hủy";
                }
                $nhandh = 'index.php?act=nhandh&id_hd='.$id_hd;
                $huydh = 'index.php?act=huydh&id_hd='.$id_hd;
                $datlai = 'index.php?act=datlai&id_hd='.$id_hd;
            
        ?>
            <tr class="dong">
                <td class="cot">
                👤 <?php echo $sdt." - ";  echo $user; ?><br>
                🏚  <?php  echo "Địa chỉ: ".$dia_chi?>
                </td>
                <td class="cot"><a href="index.php?act=chitiethoadon&id_hd=<?=$id_hd?>"><input style="border: 1px solid #ccc; color: #5031eb; width: 180px; font-size: 12px;" type="button" value="Xem chi tiết hóa đơn"></input></a></td>
                <td class="cot"><?= $tong_tien ?> VNĐ</td>
                <td class="cot"><?= $phuong_thuc_tt ?></td>
                <td class="cot"><?= $trang_thai ?>
                    <?php 
                        if($trang_thai == "Chờ Xác Nhận"){
                            echo '<a href="'.$huydh.'"><input style="background-color:#BB9CC0; color:#fff; font-size:14px; border-radius:5px; padding:10px; border:#67729D" type="button"  value="Hủy"></a> ';
                        }else if($trang_thai=="Đang giao hàng"){
                            echo '<a href="'.$nhandh.'"><input style="background-color:#BB9CC0; color:#fff; font-size:14px; border-radius:5px; padding:10px; border:#67729D" type="button"  value="Đã Nhận"></a> ';
                        }else if($trang_thai == "Đã Hủy"){
                            echo '<a href="'.$datlai.'"><input style="background-color:#BB9CC0; color:#fff; font-size:14px; border-radius:5px; padding:10px; border:#67729D" type="button"  value="Đặt Lại"></a> ';
                        }
                    ?>
                </td>
            </tr>

        <?php } ?>
        
    </table>
</div>