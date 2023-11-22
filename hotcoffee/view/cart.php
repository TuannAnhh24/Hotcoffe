
<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
                <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_5">
                    <div class="content_wrap">
                        <h1 class="page_title">Giỏ Hàng</h1>
                        <div class="breadcrumbs">
                            <a class="breadcrumbs_item home" href="index.php">Home</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <span class="breadcrumbs_item current">Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gio_hang"> 
                    <div class="item_gio_hang_td">
                        <div class="hinh_anh"> Hình Ảnh </div>
                        <div class="ten"> Tên Sản Phẩm </div>
                        <div class="ten"> Size/Cái </div>
                        <div class="gia_a"> 
                            <span class="giaban">Giá Bán </span> 
                        </div>
                        <div class="soluong">Số Lượng</div>
                        <div class="tongtien">Tổng Tiền</div>
                        <div class="delete"></div>
                    </div>
                    <?php 
                        $tong=0;
                        $i=0;
                       
                          foreach ($_SESSION['mycart'] as $cart){
                            
                            extract($cart);
                            
                            $ttien =$cart[3]*$cart[1];
                            $tong+=$ttien;
                            
                            $xoasp = '<a href="index.php?act=xoasp-gh&id_gh='.$i.'"><input type="button" value="Xóa"></a>';
                          
                            echo '  
                            
                                <div class="item_gio_hang">
                                    <div class="hinh_anh">
                                        <img src="'.$cart[4].'" alt="">
                                    </div>
                                    <div class="ten"> '.$cart[0].'</div>
                                    <div class="ten"> '.$cart[0].'</div>
                                    <div class="gia">
                                        <span class="giagoc">'.$cart[2].' VNĐ</span>
                                        <span class="giaban">'.$cart[3].' VNĐ</span>
                                    </div>
                                    <input type="number" step="1" min="1" max="20" name="quantity" value="'.$cart[1].'" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"  oninput="if(this.value > 20) this.value = 20" onblur="checkMaxValue(this);"/>
                                    <div class="tongtien">'.$ttien.'</div>
                                    <div class="delete">
                                        '.$xoasp.'
                                    </div>
                                </div>';
                                $i+=1;
                            }
                                
                             echo '
                             <div class="muahang">
                                    <div class="khoang_trong"></div>
                                    <div class="tong_tien_cac_san_pham"> 
                                        Tổng tiền các sản phẩm : <strong>'.$tong.'</strong>    
                                    </div>
                                    <div class="thanhtoan">
                                        <a href="index.php?act=menu"><input type="button" value="Tiếp tục mua sắm"></a> 
                                        <a href=""><input type="button" value="Đặt Hàng"></a>
                                    </div>
                             </div>
                             '   
                    
                    ?>
                    <script>
                        function checkMaxValue(input) {
                                if (input.value > 20) {
                                    input.value = 20;
                                } else if (input.value < 1) {
                                    input.value = 1;
                                }
                            }

                            // Lắng nghe sự kiện blur cho input
                            var inputQuantity = document.querySelector('input[name="quantity"]');
                            inputQuantity.addEventListener("blur", function() {
                                checkMaxValue(this);
                            });   
                                      
                    </script>     
             </div>
