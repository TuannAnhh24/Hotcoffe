<!-- phân trang  -->
<?php
    // // Số lượng sản phẩm trên mỗi trang
    // $products_per_page = 5;
    // // Lấy số trang hiện tại từ URL, nếu không có thì mặc định là 1
    // $page = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
    // // Tính vị trí sản phẩm đầu tiên trên trang
    // $first_product = ($page - 1) * $products_per_page;
    // $sql = "SELECT * FROM san_pham LIMIT $first_product, $products_per_page";
    // // Thực hiện một câu truy vấn riêng để lấy tổng số sản phẩm
    // $sql_total = "SELECT COUNT(*) as total FROM san_pham";
    // $result_total = pdo_query_one($sql_total);
    // $total_products = $result_total['total'];
    // // Tính toán số lượng trang
    // $trang = ceil($total_products / $products_per_page);

    // Số lượng sản phẩm trên mỗi trang
    $products_per_page = 5;
    // Lấy số trang hiện tại từ URL, nếu không có thì mặc định là 1
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = '';
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else {
        $begin = ($page*3)-3;
    }
    $sql = "SELECT * FROM san_pham LIMIT $begin, $products_per_page";
    // Thực hiện một câu truy vấn riêng để lấy tổng số sản phẩm
    $sql_total = "SELECT COUNT(*) as total FROM san_pham";
    $result_total = pdo_query_one($sql_total);
    $total_products = $result_total['total'];
    // Tính toán số lượng trang
    $trang = ceil($total_products / $products_per_page);
?>
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
                        echo '<option value="'.$id_dm.'">'.$name.'</option>';
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
                <th></th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc </th>
                <th>Giá khuyến mãi</th>
                <th>View</th>
                <th>Mô tả</th>
                <th> Ảnh</th>
                <th>Chức năng</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM san_pham LIMIT $begin, $products_per_page";
            $listsanpham = pdo_query($sql);
                foreach($listsanpham as $sanpham){
                    extract($sanpham);
                    $suasp = 'index.php?act=suasp&id='.$id_sp;
                    $xoasp = 'index.php?act=deleteSp&id='.$id_sp;
                    $ctsp = 'index.php?act=ctsp&id='.$id_sp;
                    $hinhpath= "../images/".$img;
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
                            <td>'.$mo_ta.'</td>
                            <td> '.$hinh.'</td>
                            <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> | <a href="'.$xoasp.'" onclick="return confirm(\'Bạn có chắc muốn xóa không?\')"><input type="button" value="Xóa"></a> | <a href="'.$ctsp.'"><input type="button" value="Thêm chi tiết sản phẩm"></a></td>
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
            <nav id="pagination" class="pagination_wrap pagination_pages">
                <?php 
                    for ($i = 1; $i<= $trang; $i++ ){
                        echo '<a class="pager_current active" href="index.php?trang='.$i.'">'.$i.'</a>';
                    }
                 ?>
                <!-- <a href="#" class="">2</a> -->
                <!-- <a href="#" class="pager_next"></a>
                <a href="#" class="pager_last"></a> -->
            </nav>
         </div>
        </div>
    </div> 
