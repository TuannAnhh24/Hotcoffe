<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI SẢN PHẨM</h1>
         </div>
        <form action="index.php?act=listsp" method="POST">
                <input type="text" name= "kyw">
                <select name="iddm" >
                    <option value="0" selected>Tất Cả</option>
                    <?php foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    } 
                ?>
                </select>
                <input type="submit" name="listok" value= "GO">
        </form>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá gốc </th>
                <th>Giá khuyến mãi</th>
                <th>View</th>
                <th>Số lượng</th>
                <th> Mô tả</th>
                <th>ẢNh</th>
            </tr>
            <?php 
                foreach($listsanpham as $sanpham){
                    extract($sanpham);
                    $suasp = 'index.php?act=suasp&id='.$id;
                    $xoasp = 'index.php?act=xoasp&id='.$id;
                    $hinhpath= "../upload/".$img;
                    if(is_file($hinhpath)){
                        $hinh = "<img src= '".$hinhpath."' height ='100px'>";
                    }else {
                        $hinh = "Chưa update hình ảnh";
                    }

                    echo ' <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$name_sp.'</td>
                            <td>'.$gia_goc.'</td>
                            <td>'.$gia_km.'</td>
                            <td>'.$view.'</td>
                            <td>'.$size.'</td>
                            <td>'.$so_luong.'</td>
                            <td>'.$mo_ta.'</td>
                            <td>'.$img.'</td>
                            <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>   <a href="'.$xoasp.'"><input type="button" value="Xóa"></td></a>
                            </tr>';
                }
            ?> 
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>
    </div> 
