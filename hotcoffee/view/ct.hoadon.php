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
            <th class="cot">Mã đơn</th>
            <th class="cot">Tên sản phẩm</th>
            <th class="cot">Size</th>
            <th class="cot">Số lượng</th>
            <th class="cot">Lượng đá</th>
            <th class="cot">Lượng đường</th>
            <th class="cot">Thành tiền</th>
        </tr>

        <?php 
            foreach ($xem_hd as $ct){
                extract($ct);
                $ttien=0;
                
                foreach ($_SESSION['mycart'] as $cart){
                    if($cart[5]=="M"){
                        $ttien=$cart[3]*$cart[1];
                    }elseif($cart[5]=="L"){
                        $ttien=($cart[3]+$cart[3]*15/100)*$cart[1];
                    }elseif($cart[5]=="XL"){
                        $ttien=($cart[3]+$cart[3]*25/100)*$cart[1];
                    } 
                

        ?>
            <tr class="dong">
                <td class="cot"><?= $id_hd ?></td>
                <td class="cot"> <?= $name_sp ?> </td>
                <td class="cot"><?= $size ?></td>
                <td class="cot"><?= $so_luong ?></td>
                <td class="cot"><?= $luong_da ?></td> 
                <td class="cot"><?= $luong_duong ?></td>
                <td class="cot"><?= $ttien ?> VNĐ</td> 
            </tr>

        <?php }  } ?>
        
    </table>
</div>