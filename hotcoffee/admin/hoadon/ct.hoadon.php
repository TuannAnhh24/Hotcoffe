<div class="row2">
         <div class="row2 font_title">
          <h1>DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <!-- <th></th> -->
                <th>Mã đơn</th>
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Lượng đá</th>
                <th>Lượng đường</th>
                <th>Thành tiền</th>
                
            </tr>
            <?php 
                foreach ($xem_hd as $ct){
                    extract($ct);
                    $ttien=0;
            ?>
                     <tr>
                        <td><?= $id_hd ?></td>
                        <td> <?= $name_sp ?> </td>
                        <td><?= $size ?></td>
                        <td><?= $so_luong ?></td>
                        <td><?= $luong_da ?></td> 
                        <td><?= $luong_duong ?></td>
                        <td><?= $tien ?> VNĐ</td> 
                    </tr>
                <?php } ?>
            
           </table>
           </div>
          </form>
         </div>
        </div>
    </div> 