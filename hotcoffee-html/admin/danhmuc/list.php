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
                <th></th>
            </tr>
            <?php 
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    // kiểm tra trạng thái theo kiểu tinyint "1 = tồn tại || 0 = đã xóa"
                    if($trang_thai == 0){
                        $trang_thai = "Đã xóa";
                    } else {
                        $trang_thai = "Tồn tại";
                    }

                    $suadm = 'index.php?act=suadm&id='.$id;
                    $xoadm = 'index.php?act=xoadm&id='.$id;

                    echo ' <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id_dm.'</td>
                            <td>'.$name.'</td>
                            <td>'.$trang_thai.'</td>
                            <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a>   <a href="'.$xoadm.'"><input type="button" value="Xóa"></td></a>
                            </tr>';
                }
            ?> 
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