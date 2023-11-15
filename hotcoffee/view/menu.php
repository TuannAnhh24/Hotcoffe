<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
        <div class="content_wrap">
            <h1 class="page_title">Thực đơn</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="index.html">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Thực đơn</span>
            </div>
<<<<<<< HEAD
        </div>
    </div>
</div>
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="content">
                <div class="list_products shop_mode_thumbs">
                    <nav class="woocommerce-breadcrumb">
                        <a href="index.html">Home</a>&nbsp;&#47;&nbsp;Shop
                    </nav>
                    <div class="mode_buttons">
                        <form action="#" method="post">
                            <input type="text" placeholder="Tìm kiếm">
                            <input type="submit" value="Tìm kiếm">
                        </form>
=======
            <div class="page_content_wrap page_paddings_yes">
                <div class="content_wrap">
                    <div class="content">
                        <div class="list_products shop_mode_thumbs">
                            <nav class="woocommerce-breadcrumb">
                                <a href="index.html">Home</a>&nbsp;&#47;&nbsp;Shop
                            </nav>
                            <div class="mode_buttons">
                            <form action="index.php?act=menu" method="POST">
                                <input type="text" name="kyw"  placeholder="Từ khóa tìm kiếm">
                                <input type="submit" name="enter" value="Tìm Kiếm">
                                </form>
                            </div>

                            <form class="woocommerce-ordering" method="get">
                            <select name="iddm" >
                                <?php 
                                    foreach($listdanhmuc as $danhmuc){
                                        extract($danhmuc);
                                    echo "<option value='".$id_dm."'> $name </option>";
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="q" value="#" />
                            </form>
                            <ul class="products">
                                <?php 
                                    foreach ($listsanpham as $list){
                                        extract($list);
                                        $linksp="index.php?act=sanphamct&idsp=".$id_sp;
                                        $hinh = $img_path.$img;
                                        echo ' 
                                        <li class="product has-post-thumbnail column-1_2 first sale">
                                        <a href="index.php?act=sanphamCT&id" class="woocommerce-LoopProduct-link"></a>
                                        <div class="post_item_wrap">
                                            <div class="post_featured">
                                                <div class="post_thumb">
                                                    <a class="hover_icon hover_icon_link" href="sanphamChitiet.html">
                                                        <span class="onsale">Sale!</span>
                                                        <img src="'.$hinh.'" class="attachment-shop_catalog size-shop_catalog"  />
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
                                                <a href="#"></a>
                                                <a rel="nofollow" href="#" data-quantity="1" data-product_id="140" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                    </li>';
                                    }
                                ?>
                               
                            </ul>
                            <!-- phân trang -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                            <?php
							 if ($current_page > 1 && $total_page > 1){
								echo '<a class="pager_prev" href="index.php?act=menu&page='.($current_page-1).'"></a> ';
							}
							for ($i = 1; $i <= $total_page; $i++){
								
								if ($i == $current_page){
									echo ' <span class="pager_current active ">'.$i.'</span>';
								}
								else{
									echo '<a href="index.php?act=menu&page='.$i.'">'.$i.'</a>';
								}
							}
				 
							// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
							if ($current_page < $total_page && $total_page > 1){
								echo '<a class="pager_next" href="index.php?act=menu&page='.($current_page+1).'"></a> ';
							}
						    ?>
                            <!--  -->
                            
                                
                            </nav>
                        </div>
>>>>>>> d1fdad490a7c9061114acb77c6a2daab0963af0e
                    </div>

                    <!-- <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby">
                        <option value="menu_order" selected='selected'>Phân loại</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select> -->
                    <input type="hidden" name="q" value="#" />
                    </form>
                    <ul class="products">
                        <li class="product has-post-thumbnail column-1_2 first sale">
                            <a href="sanphamChitiet.html" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="sanphamChitiet.html">
                                            <span class="onsale">Sale!</span>
                                            <img src="images/2000x2000.png" class="attachment-shop_catalog size-shop_catalog" alt="americano" title="americano" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="sanphamChitiet.html">Americano</a>
                                    </h3>
                                    <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>10.00</span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>7.00
                                        </span>
                                    </ins>
                                    </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="140" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </li>
                        <li class="product has-post-thumbnail column-1_2 last">
                            <a href="sanphamChitiet.html" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="sanphamChitiet.html">
                                            <img src="images/2000x2000.png" class="attachment-shop_catalog size-shop_catalog" alt="cappuccino" title="cappuccino" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="sanphamChitiet.html">Cappuccino</a>
                                    </h3>
                                    <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>4.00</span>
                                    </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="139" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </li>
                        <li class="product has-post-thumbnail column-1_2 first sale">
                            <a href="sanphamChitiet.html" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="sanphamChitiet.html">

                                            <span class="onsale">Sale!</span>
                                            <img src="images/2000x2000.png" class="attachment-shop_catalog size-shop_catalog" alt="waffles" title="waffles" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="sanphamChitiet.html">Lemon Waffles</a>
                                    </h3>
                                    <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>27.00
                                    </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#36;</span>18.00
                                        </span>
                                    </ins>
                                    </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="138" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </li>
                        <li class="product has-post-thumbnail column-1_2 last">
                            <a href="sanphamChitiet.html" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="sanphamChitiet.html">
                                            <img src="images/2000x2000.png" class="attachment-shop_catalog size-shop_catalog" alt="panini" title="panini" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="sanphamChitiet.html">Mac&#038;Cheese Panini</a>
                                    </h3>
                                    <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">&#36;</span>14.00
                                    </span>
                                    </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="137" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <nav id="pagination" class="pagination_wrap pagination_pages">
                        <span class="pager_current active ">1</span>
                        <a href="#" class="">2</a>
                        <a href="#" class="pager_next"></a>
                        <a href="#" class="pager_last"></a>
                    </nav>
                </div>
            </div>
            <div class="sidebar widget_area scheme_original" role="complementary">
                <div class="sidebar_inner widget_area_inner">
                    <!-- <aside class="widget widget_text">
                        <h5 class="widget_title">Đăng Nhập</h5>
                        <div class="textwidget">
                            <form class="mc4wp-form mc4wp-form-422" method="post" data-id="422" data-name="">
                                <div class="mc4wp-form-fields">
                                    <p>
                                        <label>Nhập email của bạn để đăng nhập</label>
                                        <input type="email" name="EMAIL" placeholder="Địa chỉ E-mail" required /> <br> <br>
                                        <input type="password" name="password" placeholder="Nhập mật khẩu" required />
                                    </p>
                                    <p>
                                        <input type="submit" value="Đăng Nhập" /><br>
                                        <a href="#"><label for="">Đăng ký tài khoản</label></a>
                                    </p>
                                    <div class="hideblock">
                                        <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" />
                                    </div>
                                    <input type="hidden" name="_mc4wp_timestamp" value="1497855810" />
                                    <input type="hidden" name="_mc4wp_form_id" value="422" />
                                    <input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
                                </div>
                                <div class="mc4wp-response"></div>
                            </form>
                        </div>
                    </aside> -->
                    <aside class="widget woocommerce widget_product_categories">
                        <h5 class="widget_title">Loại</h5>
                        <ul class="product-categories">
                            <li class="cat-item">
                                <a href="#">Cà phê</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Đồ ăn</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">rượu</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Thịt chó</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">All</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget woocommerce widget_top_rated_products">
                        <h5 class="widget_title"> Sản phẩm bán chạy</h5>
                        <ul class="product_list_widget">
                            <li>
                                <a href="sanphamChitiet.html" title="Smooth Iced Coffee">
                                    <img src="images/2000x2000.png" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" />
                                    <span class="product-title">Smooth Iced Coffee</span>
                                </a>
                                <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>15.00</span>
                            </li>
                            <li>
                                <a href="sanphamChitiet.html" title="Mac&amp;Cheese Panini">
                                    <img src="images/2000x2000.png" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" />
                                    <span class="product-title">Mac&Cheese Panini</span>
                                </a>
                                <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>14.00</span>
                            </li>
                            <li>
                                <a href="sanphamChitiet.html" title="Americano">
                                    <img src="images/2000x2000.png" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" />
                                    <span class="product-title">Americano</span>
                                </a>
                                <del>
                                <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>10.00</span>
                            </del>
                                <ins>
                                <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">&#36;</span>7.00</span>
                            </ins>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget_socials">
                        <h5 class="widget_title">Theo dõi chúng tôi</h5>
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
    <!-- END CONTENT  -->

