<?php 
    $sql = "SELECT * FROM danh_muc order by name";
    $lay_dm = pdo_query($sql);
?>
<?php
    echo "
        <style>      

        .cup-size-selecto {
            display: block;
            justify-content: space-around;
            font-size: 10px;
            margin-bottom: 10px;
            margin-top: 20px;
            
        }        
        .khungSize {
            display:inline-flex;
            justify-content: center;
            align-items: center;
            margin-left:10px;
            width: 30px;
            height: 30px;
            margin-top: 20px;
            font-size: 10px;
            background-color: #FFFFFF;
            border: 1px solid green;
            transition: background-color 0.3s ease;
            color: #FFFFFF;
        }        
        .khungSize .sizeCoc {
            align-items: center;
            appearance: button;
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.004) 0px 0.0802685px 0.160537px 0px;
            box-sizing: border-box;
            color: #000000;
            cursor: pointer;
            display:inline-flex;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            justify-content: center;
            line-height: 30px;
            height: 30px;
            width: 30px;
            place-content: normal center;
            place-items: center normal;
            text-align: center;
            transition-duration: 0.2s;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);          
        }              
        .khungSize.clicked {
            background-color: #F39C12;
        }        
        /* Thêm CSS để định dạng nút khi được chọn */
        .cup-size-btn.active {
            background-color: #ffcc00;
            /* Màu sắc khi nút được chọn */
            color: #fff;
            /* Màu văn bản khi nút được chọn */
            /* Thêm các thuộc tính CSS khác tùy thuộc vào thiết kế của bạn */
        } 
        .quantity{
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        } 
        .da_and_duong{
            display: flex;
        }
        .da select{
            border: 1px solid green;
            border-radius: 5px;
            margin-right: 48px;
            padding: 3px;
            margin-left: 12px;
            margin-bottom: 15px;
        }
        .duong select{
            border: 1px solid green;
            border-radius: 5px;
            padding: 3px;
            margin-bottom: 15px;
        }      
        </style>     
    ";
?>
    

<div class="single single-product woocommerce woocommerce-page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive">
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title"><?=$name_sp?></h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="index.php">Trang chủ</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="index.php?act=menu">Menu</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current"><?=$name_sp?></span>
                </div>
            </div>
        </div>
    </div>

        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                <article class="post_item post_item_single post_item_product">   
                    <input type="hidden">
                        <?php 
                                $linksp="index.php?act=spct&id_sp=".$id_sp;
                                $bnt = 'index.php?btn_test.php';
                                $image = $img_path.$img;
                                echo '
                                
                               
                                <div id="product-140" class="post-140 product has-post-thumbnail first sale">
                                <span class="onsale">Sale!</span>
                                <div class="images">
                                    <a href="'.$image.'" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto[product-gallery]">
                                        <img src="'.$image.'" class="attachment-shop_single size-shop_single" alt="americano" title="'.$name_sp.'" />
                                    </a>
                                </div>
                                <div class="summary entry-summary">
                                    <h1 class="product_title  entry-title">'.$name_sp.'</h1>
                                    <div>
                                        <p class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"></span><span id="originalPrice">'.$gia_goc.'</span>VNĐ
                                                </span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"></span><span id="discountedPrice">'.$gia_km.'</span> VNĐ
                                                </span>
                                            </ins>
                                        </p>
                                    </div>
                                    <div>
                                        <p>'.$mo_ta.'</p>
                                    </div>
                                   
                                    <form action="index.php?act=add-to-cart"  class="cart" method="post" enctype="multipart/form-data">
                                    <div class="quantity_cup-size-selector">
                                        <div class="quantity">
                                            <input type="number" step="1" min="1" max="20" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"  oninput="if(this.value > 20) this.value = 20" onblur="checkMaxValue(this);"/>
                                        </div>
                                        
                                        <!-- Sử dụng nút để chọn size cốc -->
                                        <div class="cup-size-selector">
                                            <div class="size-selector">
                                                <div class="khungSize">
                                                    <span class="sizeCoc"  data-value="M" selected>M</span>
                                                </div>
                                                <div class="khungSize">
                                                    <span class="sizeCoc"  data-value="L">L</span>
                                                </div>
                                                <div class="khungSize">
                                                    <span class="sizeCoc" data-value="XL">XL</span>
                                                </div>
                                            </div>                                             
                                            
                                        </div> 
                                    </div>
                                    
                                        <br>
                                        <div class="da_and_duong">
                                            <div class="da">
                                                <select name="luongda" id="luongda">
                                                    <option value="" selected disabled>Lượng đá</option>
                                                    <option value="25%">25%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="75%">75%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                            </div>
                                            <div class="duong">
                                                <select name="luongduong" id="luongduong">
                                                    <option value="" selected disabled>Lượng đường</option>
                                                    <option value="25%">25%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="75%">75%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                            </div>
                                        </div>
                                
                                        <input type="hidden" id="selectedSize" name="selectedSize" value="">
                                        <input type="hidden" name="name_sp"  value="'.$name_sp.'"  />
                                        <input type="hidden" name="gia_goc"  value="'.$gia_goc.'"  />
                                        <input type="hidden" name="gia_km"   value="'.$gia_km.'"  />
                                        <input type="hidden" name="img"      value="'.$image.'"  />
                                        <input type="hidden" name="id_sp"  value="'.$id_sp.'">
                                        
                                        <button name="add-to-cart" type="submit" class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
                                    </form>


                                    <div class="product_meta">
                                        <span class="posted_in">Loại:
                                            <a href="#" rel="tag">'.$name.'</a>
                                        </span>
                                        <span class="product_id">Mã sản phẩm:
                                            <span>'.$id_sp.'</span>
                                        </span>
                                    </div>
                                </div>
                                    ';
                        ?>  
                        
                        <div class="woocommerce-tabs wc-tabs-wrapper" > 
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function(){
                                    $("#binhluan").load("view/binhluan/binhluanfrom.php", {id_sp: <?= $id_sp ?>});
                                });
                            </script>
                            <div class="" id="binhluan" >
                            </div>
                        </div>
                        <div class="related products">
                            <h2>NHỮNG SẢM PHẨM TƯƠNG TỰ</h2>
                            <ul class="products">
                            <?php 
                                foreach ($listsanphamCL as $list){
                                    extract($list);
                                    $linksp="index.php?act=spct&id_sp=".$id_sp;
                                    $hinh = $img_path.$img;
                                    $cl1 ="product has-post-thumbnail column-1_3 first";
                                    $cl2 = "product has-post-thumbnail column-1_3  last";
                                    if($id_sp ==0 || $id_sp % 2 == 0){
                                        $cl= $cl2;
                                    }else{
                                        $cl = $cl2;
                                    }
                                    
                                    echo '
                                    <li class="'.$cl.'">
                                    <a href="'.$linksp.'" class="woocommerce-LoopProduct-link"> </a>
                                    <div class="post_item_wrap">
                                        <div class="post_featured">
                                            <div class="post_thumb">
                                                <a class="hover_icon hover_icon_link" href="'.$linksp.'">
                                                    <img src="'.$hinh.'" class="attachment-shop_catalog size-shop_catalog" alt="cappuccino" title="'.$name_sp.'" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post_content">
                                            <h3>
                                                <a href="'.$linksp.'">'.$name_sp.'</a>
                                            </h3>
                                            
                                            <span class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>'.$gia_goc.'</span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>'.$gia_km.'
                                                </span>
                                            </ins>
                                            </span>
                                            
                                            </span>
                                                
                                            <a href="#"></a>
                                            <a rel="nofollow" href="#" data-quantity="1" data-product_id="139" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                        </div>
                                    </div>
                                </li> 
                                    ';
                        
                                }
                            ?>      
                            </ul>
                        </div>
                    </div>
                </article>
            </div>

                <!-- loại sản phẩm -->
                <div class="sidebar widget_area scheme_original" role="complementary">
                    <div class="sidebar_inner widget_area_inner">
                    
                        <aside class="widget woocommerce widget_product_categories">
                            <h5 class="widget_title">Loại</h5>
                            <ul class="product-categories">
                                <?php
                                    foreach ($listdanhmuc as $danhmuc){
                                        extract($danhmuc);
                                        echo ' 
                                        <li class="cat-item">
                                                <a href="index.php?act=menu&id_dm='.$id_dm.'" ">'.$name.'</a>
                                        </li>
                                        ';
                                    }
                                ?>  
                            </ul>
                        </aside>

                        
                        <!-- san phảm bán chạy -->
                        <aside class="widget woocommerce widget_top_rated_products">
                            <h5 class="widget_title"> Sản phẩm bán chạy</h5>
                            <ul class="product_list_widget">
                                <?php 
                                    foreach ($spBanchay as $sp){
                                        extract($sp);
                                        $linksp= "index.php?act=spct&id_sp=".$id_sp;
                                        $img1 = $img_path.$img;
                                            
                                        echo '
                                        <li>
                                        <a href="'.$linksp.'" title="'.$name.'">
                                            <img src="'.$img1.'" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" />
                                            <span class="product-title">'.$name_sp.'</span>
                                        </a>
                                        <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>'.$gia_goc.'</span>
                                    </li>';
                                    }
                                    ?>
                            </ul>
                            
                            </aside>

                    <aside class="widget widget_socials">
                        <h5 class="widget_title">follow us</h5>
                        <div class="widget_inner">
                            <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                                <div class="sc_socials_item">
                                    <a href="#" target="_blank" class="social_icons social_twitter">
                                        <span class="icon-twitter"></span>
                                    </a>
                                </div>
                                <div class="sc_socials_item">
                                    <a href="#" target="_blank" class="social_icons social_facebook">
                                        <span class="icon-facebook"></span>
                                    </a>
                                </div>
                                <div class="sc_socials_item">
                                    <a href="#" target="_blank" class="social_icons social_gplus">
                                        <span class="icon-gplus"></span>
                                    </a>
                                </div>
                                <div class="sc_socials_item">
                                    <a href="#" target="_blank" class="social_icons social_linkedin">
                                        <span class="icon-linkedin"></span>
                                    </a>
                                </div>
                                <div class="sc_socials_item">
                                    <a href="#" target="_blank" class="social_icons social_skype">
                                        <span class="icon-skype"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div> 



<script>
    
    window.onload = function() {
        // Lấy phần tử tương ứng với size 'M'
        var sizeM = document.querySelector('.sizeCoc[data-value="M"]');
        // Kích hoạt sự kiện click cho phần tử này
        sizeM.click();
    }
    // Lấy tất cả các phần tử có lớp 'khungSize'
    var sizes = document.querySelectorAll('.khungSize');
    // Lặp qua từng phần tử
    for (var i = 0; i < sizes.length; i++) {
        // Thêm sự kiện click cho mỗi phần tử
        sizes[i].addEventListener('click', function() {
            // Kiểm tra xem phần tử hiện tại có chứa lớp 'clicked' hay không
            var isClicked = this.classList.contains('clicked');

            // Xóa lớp 'clicked' khỏi tất cả các phần tử
            for (var j = 0; j < sizes.length; j++) {
                sizes[j].classList.remove('clicked');
            }

        });
    }

    function checkMaxValue(input) {
        if (input.value > 20) {
            input.value = 20;
        }
        }       
        
        var tralois = document.getElementsByClassName("khungSize");
        for (var i = 0; i < tralois.length; i++) {
            tralois[i].addEventListener("click", function() {
                this.classList.toggle("clicked");
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const sizeElements = document.querySelectorAll('.sizeCoc');
        const hiddenInput = document.getElementById('selectedSize');
        
        sizeElements.forEach(function(element) {
            element.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                hiddenInput.value = selectedValue; // Gán giá trị vào input hidden
                console.log('Selected size:', selectedValue);
            });
        });
    });

  // Giá gốc và giá khuyến mãi
let originalPrice = parseFloat(document.querySelector('#originalPrice').textContent);
let discountedPrice = parseFloat(document.querySelector('#discountedPrice').textContent);

// Hàm tính giá khuyến mãi dựa trên size
function calculateDiscountedPrice(originalPrice, discountedPrice, size) {
    let discount;
    switch(size) {
        case 'M':
            return discountedPrice; // Trả về giá khuyến mãi hiện tại
        case 'L':
            discount = 0.15;
            break;
        case 'XL':
            discount = 0.25;
            break;
        default:
            console.log("Invalid size");
            return discountedPrice; // Trả về giá khuyến mãi hiện tại nếu size không hợp lệ
    }
    return discountedPrice * (1 + discount);
}

// Hàm cập nhật giá khi thay đổi số lượng hoặc kích thước
function updatePrice() {
    let quantity = parseInt(document.querySelector('input[name="quantity"]').value);
    let size = document.querySelector('.sizeCoc.clicked').getAttribute('data-value');

    let newOriginalPrice = (originalPrice * quantity).toLocaleString('en-US');
    let newDiscountedPrice = (calculateDiscountedPrice(originalPrice, discountedPrice, size) * quantity).toLocaleString('en-US');

    document.querySelector('#originalPrice').textContent = newOriginalPrice;
    document.querySelector('#discountedPrice').textContent = newDiscountedPrice;
}

// Lắng nghe sự kiện thay đổi trên trường nhập số lượng
document.querySelector('input[name="quantity"]').addEventListener('input', updatePrice);
document.querySelector('input[name="quantity"]').addEventListener('change', updatePrice);

// Lắng nghe sự kiện click trên các phần tử .sizeCoc
document.querySelectorAll('.sizeCoc').forEach(function(sizeElement) {
    sizeElement.addEventListener('click', function() {
        // Thêm hoặc xóa class 'clicked' cho phần tử size được chọn
        document.querySelectorAll('.sizeCoc').forEach(function(el) {
            el.classList.remove('clicked');
        });
        this.classList.add('clicked');

        // Gọi hàm cập nhật giá khi chọn kích thước
        updatePrice();
    });
});

// Mở rộng sự kiện onload cho việc tự động chọn size M
window.onload = function() {
    // Lấy phần tử tương ứng với size 'M'
    var sizeM = document.querySelector('.sizeCoc[data-value="M"]');
    // Kích hoạt sự kiện click cho phần tử này
    sizeM.click();
    updatePrice();
};






</script>