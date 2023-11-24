<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
            <table>
                <tr>
                    <th></th>
                    <th>Sản phẩm</th>
                    <th>Tài Khoản</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th></th>
                </tr>
                <?php 
                    foreach($listbl as $bl){
                        extract($bl);
                        $xoabl = 'index.php?act=xoabl&id_bl='.$id_bl;
                ?> 
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?=$id_sp?></td>
                                <td><?=$id_tk?></td>
                                <td><?=$noi_dung?></td>
                                <td><?=$ngay_bl?></td>
                                <td><a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="<?=$xoabl?>"><input type="button" value="Xóa"></td></a>
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