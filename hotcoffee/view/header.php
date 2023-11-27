<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <title>Hot Coffee &#8211; Uống là Nghiền</title>
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i|Grand+Hotel|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=latin-ext" type='text/css' media='all' >
    <link rel='stylesheet' href='js/vendor/revslider/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/woo/woocommerce-layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/woo/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='js/vendor/woo/woocommerce.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/woo/plugin.woocommerce.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/doc-style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/comp/comp.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.messages.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.portfolio.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="stylesheet" href="css/dk.dn.css">
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/giohang.css">
</head>

 <body class="home page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide preloader vc_responsive"> 
     <div id="page_preloader"></div> 
    <a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="index.html" data-separator="yes"></a>
    <a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>

    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <!-- HEADER  -->
            <header class="top_panel_wrap top_panel_style_3 scheme_original">
                <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
                    <div class="top_panel_middle">
                        <div class="content_wrap">
                            <div class="contact_logo">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="images/logo.png" class="logo_main" alt="" width="128" height="124">
                                        <img src="images/alternative-logo.png" class="logo_fixed" alt="" width="161" height="47">
                                    </a>
                                </div>
                            </div>
                            <div class="menu_main_wrap">
                                <a href="#" class="menu_main_responsive_button icon-menu"></a>
                                <nav class="menu_main_nav_area">
                                    <ul id="menu_main" class="menu_main_nav">
                                        
                                        <li class="menu-item "><a href="index.php">Trang Chủ</a></li>
                                        <li class="menu-item "><a href="index.php?act=ban">Bàn</a></li>
                                        <li class="menu-item"><a href="index.php?act=menu">Menu</a></li>
                                        <li class="menu-item"><a href="index.php?act=lienhe">Liên hệ</a></li>
                                        <li class="menu-item"><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                                             
                                    </ul>
                                </nav>
                                <div class="contact_cart">
                                    <a href="#" class="top_panel_cart_button" data-items="0" data-summa="&#036;0.00">
                                        <span class="contact_icon icon-shopping"></span>
                                        <span class="contact_label contact_cart_label">Giỏ hàng:</span>
                                        <span class="contact_cart_totals">
		                                <span class="cart_items">0 món</span> -
                                        <span class="cart_summa"> 0 VNĐ</span>
                                        </span>
                                    </a>
                                    <ul class="widget_area sidebar_cart sidebar">
                                        <li>
                                            <div class="widget woocommerce widget_shopping_cart">
                                                <div class="hide_cart_widget_if_empty">
                                                    <div class="widget_shopping_cart_content">
                                                        <ul class="cart_list product_list_widget ">
                                                            <li class="empty">Không có vật phẩm trong giỏ hàng</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <?php 
                                    if(isset($_SESSION['email'])){
                                        extract($_SESSION['email']);
                                        $avatar = isset($img) ? $img : 'images/dangnhap.png';
                                        if($img){
                                            $avatar = "images/".$img;
                                        }else{
                                            $avatar = 'images/dangnhap.png';
                                        }
                                ?>
                                <!-- hiển thị ra menu con khi có email đăng nhập  -->
                                <div class="profile">
                                    <img src="<?= $avatar ?>" class="dang_nhap" >
                                    <span class="triangle-down"></span>
                                    <ul class = "dropdown-menu">
                                        <li><a href="index.php?act=edit_taikhoan">Thông tin cá nhân</a></li>
                                        <?php if($phan_quyen == 1){ ?>
                                            <li><a href="admin/index.php">Đăng nhập admin</a></li>
                                        <?php } ?>
                                        <li><a href="index.php?act=ctdh">Theo dõi đơn hàng</a></li>
                                        <li><a href="index.php?act=thoat">Đăng xuất</a></li>
                                    </ul>
                                </div> 

                                <?php 
                                    }else{
                                ?>
                                <!-- đăng nhập không thành công hiển thị menu như bình thường  -->
                                <a href="index.php?act=dangnhap"><img src="images/dangnhap.png" class="profile" style="width: 50px; height: 50px;"></a>

                                <?php } ?>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </header>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                const menuItems = document.querySelectorAll('.menu-item a');

                menuItems.forEach(function(item) {
                    item.addEventListener('click', function(event) {
                    // Loại bỏ class 'current-menu-item' từ tất cả các phần tử trong menu trước khi thêm vào lại cho li được nhấp
                    menuItems.forEach(function(menuItem) {
                        menuItem.parentNode.classList.remove('current-menu-item');
                    });

                    // Thêm class 'current-menu-item' cho li chứa liên kết được nhấp
                    this.parentNode.classList.add('current-menu-item');
                    });
                });
                });
            </script>
            <!-- END HEADER  -->

