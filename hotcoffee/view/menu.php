<div class="archive woocommerce woocommerce-page body_filled article_style_stretch layout_excerpt template_excerpt scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive">
<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
                <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
                    <div class="content_wrap">
                        <h1 class="page_title">MENU</h1>
                        <div class="breadcrumbs">
                            <a class="breadcrumbs_item home" href="index.php">Home</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <span class="breadcrumbs_item current">Menu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_content_wrap page_paddings_yes">
                <div class="content_wrap">
                    <div class="content">
                        <div class="list_products shop_mode_thumbs">
                            <nav class="woocommerce-breadcrumb">
                                <a href="index.php">Home</a>&nbsp;&#47;&nbsp;Shop
                            </nav>
                            <!-- --------Tìm kIếm---------- -->
                            <div class="mode_buttons">
                            <form action="index.php?act=menu" method="POST">
                                <input type="text" name="kyw"  placeholder="Từ khóa tìm kiếm">
                                <input type="submit" name="enter" value="Tìm Kiếm">
                            </form>
                            </div> 
                          <!--List sản phẩm -->
                            <input type="hidden" name="q" value="#" />
                            </form>
                            <ul class="products">
                                <?php 
                                     $counter = 1; // Khởi tạo biến đếm ban đầu
                                    foreach ($listsanpham as $list){
                                        extract($list);
                                        $linksp="index.php?act=spct&id_sp=".$id_sp;
                                        $hinh = $img_path.$img;
                                        $cl1 ="product has-post-thumbnail column-1_2 first sale";
                                        $cl2 = "product has-post-thumbnail column-1_2 last";
                                        if($counter % 2 !== 0){
                                            $cl= $cl1;
                                        }else{
                                            $cl =  $cl2;
                                        }
                                        // Tăng biến đếm sau mỗi lần lặp
                                         $counter++;
                                        echo ' 
                                        
                                        <li class="'.$cl.'">
                                        <a href="index.php?act=spct&id_sp" class="woocommerce-LoopProduct-link"></a>
                                        <div class="post_item_wrap">
                                            <div class="post_featured">
                                                <div class="post_thumb">
                                                    <a class="hover_icon hover_icon_link" href="index.php?act=spct&id_sp='.$id_sp.'">
                                                        <span class="onsale">Sale!</span>
                                                        <img  src="'.$hinh.'" class="attachment-shop_catalog size-shop_catalog"   width: "700px"; height: "700px";  />
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
                                                        <span class="woocommerce-Price-currencySymbol"></span>'.number_format($gia_goc, 0, '.', ',').'VNĐ</span>
                                                </del>
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol"></span>'.number_format($gia_km, 0, '.', ',').' VNĐ
                                                    </span>
                                                </ins>
                                                </span>
                                                <form action="index.php?act=add-to-cart" class="cart" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_sp"  value="'.$id_sp.'"  />
                                                <input type="hidden" name="name_sp"  value="'.$name_sp.'"  />
                                                <input type="hidden" name="gia_goc"  value="'.$gia_goc.'"  />
                                                <input type="hidden" name="gia_km"   value="'.$gia_km.'"  />
                                                <input type="hidden" name="img"      value="'.$hinh.'"  />
                                                <input type="hidden" name="selectedSize"    value="M"  />
                                                <input type="hidden" name="quantity"      value="1"  />
                                                
                                                <button name="add-to-cart" type="submit" class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>

                                                </form>
                                            </div>
                                        </div>
                                    </li> ';}
                                ?>
                            </ul>
                             <!----------------------- Phân trang ----------------------->
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
                                    ?>
                            </nav>
                        </div>
                    </div>
                                
                    <!----------------- Danh mục sản phẩm ------------------------>
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
                                            </li>';
                                        }
                                    ?>
                                   
                                    
                                </ul>
                            </aside>
                            <!------------------------- Sản phảm bán chạy --------------------------->
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
                                            <span class="woocommerce-Price-currencySymbol"></span>'.number_format($gia_goc, 0, '.', ',').'VNĐ</span>
                                        </li>';
                                        }
                                        ?>
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
        </div>
        
