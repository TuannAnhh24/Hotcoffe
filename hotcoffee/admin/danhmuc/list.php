<div class="row2">
         <div class="row2 font_title">
          <h1>DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Thực hiện</th>
                <th></th>
            </tr>
            <?php 
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    // kiểm tra trạng thái theo kiểu tinyint "1 = Đã xóa || 0 = Tồn tại"
                    if($trang_thai == 0){
                        $trang_thai = "Tồn Tại";
                    } else {
                        $trang_thai = "Đã xóa";
                    }
                    $suadm = 'index.php?act=suadm&id_dm='.$id_dm;
                    $xoadm = 'index.php?act=xoadm&id_dm='.$id_dm;
                    $kpdm = 'index.php?act=kpdm&id_dm='.$id_dm;
                ?> 
                     <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td> <?=$id_dm?> </td>
                        <td> <?=$name?> </td>
                        <td> <?=$trang_thai?> </td>
                        <td>
                            <a href="<?=$suadm?>"><input type="button" value="Sửa"></a>   
                            <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="<?=$xoadm?>"><input type="button" value="Xóa"></a>
                            <a href="<?=$kpdm?>"><input type="button" value="Khôi phục"></a> 
                        </td>
                    </tr>
                <?php } ?>
            
           </table>
           </div>
           <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>
    </div> 