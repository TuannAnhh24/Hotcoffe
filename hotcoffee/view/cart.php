 
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
                        <div class="ten"> Size </div>
                        <div class="ten"> Mức đá </div>
                        <div class="ten"> Mức đường </div>
                        <div class="gia_a"> 
                            <span class="giaban">Giá Bán </span> 
                        </div>
                        <div class="soluong">Số Lượng</div>
                        <div class="tongtien">Tổng Tiền</div>
                        <div class="delete"></div>
                    </div>
                    <?php 
                        $tong=0;
                        $ttien=0;
                        $i=0;
                       
                          foreach ($_SESSION['mycart'] as $cart){
                            
                            // $cart = [$name_sp, $quantity, $gia_goc, $gia_km, $img, $size, $luongda, $luongduong];
                            if($cart[5]=="M"){
                                $ttien=$cart[3]*$cart[1];
                            }else if($cart[5]=="L"){
                                $ttien=($cart[3]*1.15)*$cart[1];
                            }else if($cart[5]=="XL"){
                                $ttien=($cart[3]*1.25)*$cart[1];
                            } 

                        
                            $tong+=$ttien;
                            
                            $xoasp = '<a href="index.php?act=xoasp-gh&id_gh='.$i.'"><input type="button" value="Xóa"></a>';
                          
                            echo '  
                            <form action="index.php?act=hd" method="post" enctype="multipart/form-data">
                                <div class="item_gio_hang">
                                    <div class="hinh_anh" name="img">
                                        <img src="'.$cart[4].'" alt="">
                                    </div>
                                    <div class="ten" ><input style="width: 120px;" type="text" name="name_sp[]" value="'.$cart[0].'" readonly> </div>
                                    <div class="ten"> <input style="width: 120px; " type="text" id="size_'.$i.'" name="laysize[]" value="'.$cart[5].'" readonly onchange="updateTotalPrice(this);"> </div>
                                    <div class="ten"> 
                                        <select name="luongda[]" id="luongda">
                                            <option value="25%" '.($cart[6] == '25%' ? 'selected' : '').'>25%</option>
                                            <option value="50%" '.($cart[6] == '50%' ? 'selected' : '').'>50%</option>
                                            <option value="75%" '.($cart[6] == '75%' ? 'selected' : '').'>75%</option>
                                            <option value="100%" '.($cart[6] == '100%' ? 'selected' : '').'>100%</option>
                                        </select>
                                    </div>
                                    <div class="ten">  
                                        <select name="luongduong[]" id="luongduong">
                                            <option value="25%" '.($cart[7] == '25%' ? 'selected' : '').'>25%</option>
                                            <option value="50%" '.($cart[7] == '50%' ? 'selected' : '').'>50%</option>
                                            <option value="75%" '.($cart[7] == '75%' ? 'selected' : '').'>75%</option>
                                            <option value="100%" '.($cart[7] == '100%' ? 'selected' : '').'>100%</option>
                                        </select>
                                    </div>
                                    <div class="gia">                                        
                                        <span class="giaban" id="price_'.$i.'" data-price="'.$cart[3].'">'.$cart[3].' VNĐ</span>
                                    </div>        
                                    <div class="soluong"><input type="number" id="quantity_'.$i.'" step="1" min="1" max="20" name="quantity[]" value="'.$cart[1].'"  class="input-text qty text" size="4" pattern="[0-9]*" onchange="updateTotalPrice(this);" inputmode="numeric"  oninput="if(this.value > 20) this.value = 20" onblur="checkMaxValue(this);"/></div>
                                    <div class="tongtien" id="tongtien_'.$i.'" name="thanhtien">'.$ttien.' VNĐ</div>
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
                                        Tổng tiền các sản phẩm : <strong>'.$tong.' VNĐ</strong>    
                                    </div>
                                    <div class="thanhtoan">
                                        <a href="index.php?act=menu"><input type="button" value="Tiếp tục mua sắm"></a> 
                                        <a href="index.php?act=hd"><input type="submit" value="Đặt Hàng" name="dathang"></a>
                                    </div>
                             </div>
                             </form>
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

                        function updateTotalPrice(element) {
                            // Lấy id của sản phẩm từ phần tử đã thay đổi
                            
                            var id = element.id.split('_')[1];

                            // Lấy giá trị của các phần tử liên quan
                            var quantity = document.querySelector('#quantity_' + id).value;
                            var size = document.querySelector('#size_' + id).value;
                            var price = document.querySelector('#price_' + id).getAttribute('data-price');

                            // Tính toán tổng tiền dựa trên kích cỡ của sản phẩm
                            
                            var ttien = 0;
                            if(size == "M"){
                                ttien = Math.round(price * quantity);
                            } else if(size == "L"){
                                ttien = Math.round(price * 1.15 * quantity);
                            } else if(size == "XL"){
                                ttien = Math.round(price * 1.25 * quantity);
                            }

                            // Cập nhật tổng tiền cho sản phẩm này
                            document.querySelector('#tongtien_' + id).innerText = ttien + ' VNĐ';
                        }


                        function updateOverallTotal() {
                            let overallTotal = 0;
                            const totalElements = document.querySelectorAll('.item_gio_hang .tongtien');

                            totalElements.forEach(totalElement => {
                                const price = parseFloat(totalElement.textContent);
                                overallTotal += price;
                            });

                            const overallTotalElement = document.querySelector('.tong_tien_cac_san_pham strong');
                            overallTotalElement.textContent = overallTotal + ' VNĐ';

                            const isUserLoggedIn = $_SESSION['email'];

                            if (isUserLoggedIn) {
                                updateCartForUser(); // Gọi hàm updateCartForUser khi người dùng đã đăng nhập
                            } else {
                                updateCartForGuest(); // Gọi hàm updateCartForGuest khi người dùng là guest
                            }
                        }

                        function updateCartForUser() {
                            const cartItems = [];
                            const cartElements = document.querySelectorAll('.item_gio_hang');
                            cartElements.forEach(cartElement => {
                                const productName = cartElement.querySelector('.ten').textContent.trim();
                                const productPrice = parseFloat(cartElement.querySelector('.giaban').textContent);
                                const productQuantity = parseInt(cartElement.querySelector('input[name="quantity"]').value);
                                const productTotal = productPrice * productQuantity;

                                cartItems.push({ name: productName, quantity: productQuantity, price: productPrice, total: productTotal });
                            });

                            fetch('update_cart_for_user.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({ cartItems: cartItems }),
                            })
                            .then(response => {
                                // Xử lý response từ server (nếu cần)
                            })
                            .catch(error => {
                                console.error('Lỗi:', error);
                            });
                        }

                        function updateCartForGuest() {
                            const cartItems = [];
                            const cartElements = document.querySelectorAll('.item_gio_hang');
                            cartElements.forEach(cartElement => {
                                const productName = cartElement.querySelector('.ten').textContent.trim();
                                const productPrice = parseFloat(cartElement.querySelector('.giaban').textContent);
                                const productQuantity = parseInt(cartElement.querySelector('input[name="quantity"]').value);
                                const productTotal = productPrice * productQuantity;

                                cartItems.push([productName, productQuantity, productPrice, productTotal]);
                            });

                            // Gửi dữ liệu giỏ hàng lên server cho guest, tương tự như phần xử lý JavaScript của bạn trước đây
                            // Đây chỉ là ví dụ, bạn cần viết code xử lý gửi dữ liệu giỏ hàng của guest lên server
                        }
                    </script>

             </div>
             </body>
</html>
