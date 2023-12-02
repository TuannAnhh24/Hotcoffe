
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
                                $ttien=$cart[3]*$cart[1];
                            $tong+=$ttien;
                            
                            $xoasp = '<a href="index.php?act=xoasp-gh&id_gh='.$i.'"><input type="button" value="Xóa"></a>';
                          
                            echo '  
                            <form action="index.php?act=menu" enctype="multipart/form-data">
                                <div class="item_gio_hang">
                                    <div class="hinh_anh" name="img">
                                        <img src="'.$cart[4].'" alt="">
                                    </div>
                                    <div class="ten" name =""> '.$cart[0].'</div>
                                    <div class="ten"> '.$cart[5].'</div>
                                    <div class="gia">
                                        
                                        <span class="giaban">'.$cart[3].' VNĐ</span>
                                    </div>
                                    <input type="number" step="1" min="1" max="20" name="quantity" value="'.$cart[1].'"  class="input-text qty text" size="4" pattern="[0-9]*" onchange="updateTotalPrice(this);" inputmode="numeric"  oninput="if(this.value > 20) this.value = 20" onblur="checkMaxValue(this);"/>
                                    <div class="tongtien" name="thanhtien">'.$ttien.' VNĐ</div>
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
                                        <a href=""><input type="submit" value="Đặt Hàng" name="dathang"></a>
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

                        function updateTotalPrice(input) {
                            const newQuantity = parseInt(input.value);
                            const price = parseFloat(input.closest('.item_gio_hang').querySelector('.giaban').textContent);
                            const newTotal = price * newQuantity;

                            const totalElement = input.closest('.item_gio_hang').querySelector('.tongtien');
                            totalElement.textContent = newTotal + ' VNĐ';

                            updateOverallTotal(); // Cập nhật tổng tiền tổng cộng
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
