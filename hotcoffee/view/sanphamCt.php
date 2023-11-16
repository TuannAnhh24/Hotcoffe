
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
                        <a class="breadcrumbs_item cat_post" href="<?php echo 'index.php?act=danhmuc&id_dm='.$onesp['id_dm'] ?>"></a>
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
                        
                        <?php 
                                var_dump($onedm);
                                
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
                                    <h1 class="product_title entry-title">'.$name_sp.'</h1>
                                    <div>
                                        <p class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>'.$gia_goc.'
                                                </span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>'.$gia_km.'
                                                </span>
                                            </ins>
                                        </p>
                                    </div>
                                    <div>
                                        <p>'.$mo_ta.'</p>
                                    </div>
                                    <form class="cart" method="post" enctype="multipart/form-data">
                                        <div class="quantity">
                                        <input type="number" step="1" min="1" max="20" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"  oninput="if(this.value > 20) this.value = 20" onblur="checkMaxValue(this);"/>

                                        </div>
                                        <input type="hidden" name="add-to-cart" value="'.$gia_km.'" />
                                        <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
                                    </form>
                                    ';
                        ?>
                             
                             <script>
                                        function checkMaxValue(input) {
                                        if (input.value > 20) {
                                            input.value = 20;
                                        }
                                        }                                     
                             </script>
                                <div class="product_meta">
                                    <span class="posted_in">Category:
                                        <a href="#" rel="tag">Drinks</a>
                                    </span>
                                    <span class="product_id">Product ID:
                                        <span>140</span>
                                    </span>
                                </div>
                            </div>
                            <div class="woocommerce-tabs wc-tabs-wrapper">
                                <ul class="tabs wc-tabs">
                                    <li class="description_tab">
                                        <a href="<?php echo "index.php?act=spct&id_sp=".$id_sp."#tab-description" ?>">Description</a>
                                    </li>
                                    <li class="reviews_tab">
                                        <a href="#tab-reviews">Reviews (0)</a>
                                    </li>
                                </ul>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description">
                                    <h2>Product Description</h2>
                                    <p>
                                        Suspendisse in nulla lacinia, auctor ligula quis, ultrices eros. Maecenas iaculis sit amet tortor ut cursus. Etiam tempor libero a tristique hendrerit.
                                        Proin rutrum dolor at nibh volutpat dictum. Fusce sem justo, congue fermentum gravida in, rhoncus in ex.
                                    </p>
                                    <p>
                                        Maecenas in tempus lorem. Integer pretium tortor quis arcu convallis, non efficitur odio porta. Donec auctor molestie rutrum.
                                        In dolor est, aliquet ut turpis varius, luctus sollicitudin arcu. Nam nec lacinia magna. Fusce placerat est blandit dui mollis convallis eget eu quam.
                                        Sed quis ligula vitae dui condimentum ultrices nec in sapien.
                                    </p>
                                </div>
                                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews">
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">Reviews</h2>
                                            <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                        </div>
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">Be the first to review &ldquo;Americano&rdquo;
                                                        <small>
                                                            <a rel="nofollow" id="cancel-comment-reply-link" href="#respond">Cancel reply</a>
                                                        </small>
                                                    </h3>
                                                    <form action="#" method="post" id="commentform" class="comment-form">
                                                        <p class="comment-notes">
                                                            <span id="email-notes">Your email address will not be published.</span> Required fields are marked
                                                            <span class="required">*</span>
                                                        </p>
                                                        <p class="comment-form-rating">
                                                            <label for="rating">Your Rating</label>
                                                            <select name="rating" id="rating" aria-required="true" required>
                                                                <option value="">Rate&hellip;</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very Poor</option>
                                                            </select>
                                                        </p>
                                                        <p class="comment-form-comment">
                                                            <label for="comment">Your Review
                                                                <span class="required">*</span>
                                                            </label>
                                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                                                        </p>
                                                        <p class="comment-form-author">
                                                            <label for="author">Name
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input id="author" name="author" type="text" value="" size="30" aria-required="true" required />
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label for="email">Email
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input id="email" name="email" type="email" value="" size="30" aria-required="true" required />
                                                        </p>
                                                        <p class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                                            <input type='hidden' name='comment_post_ID' value='140' id='comment_post_ID' />
                                                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="related products">
                                <h2>NHỮNG SẢM PHẨM TƯƠNG TỰ</h2>
                                <ul class="products">
                                <?php 
                                    foreach ($listsanphamCL as $list){
                                        extract($list);
                                        $linksp="index.php?act=sanphamct&id_sp=".$id_sp;
                                        $hinh = $img_path.$img;
                                        $cl1 ="product has-post-thumbnail column-1_3 first";
                                        $cl2 = "product has-post-thumbnail column-1_3  last";
                                        if($id_sp ==0 || $id_sp % 2 == 0){
                                            $cl= $cl1;
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
                                <nav id="pagination" class="pagination_wrap pagination_pages">
                                            <?php
                                                     $idTT = $_GET['id_sp'];
                                                if ($current_page > 1 && $total_page > 1){
                                                    
                                                    echo '<a class="pager_prev"  href="index.php?act=spct&id_sp='.$idTT.'&pageNho='.($current_page-1).'"></a> ';
                                                }
                                                for ($i = 1; $i <= $total_page; $i++){
                                                    
                                                    if ($i == $current_page){
                                                        echo ' <span class="pager_current active ">'.$i.'</span>';
                                                    }
                                                    else{
                                                        echo '<a href="index.php?act=spct&id_sp='.$idTT.'&pageNho='.$i.'">'.$i.'</a>';
                                                    }
                                                }
                                                ?>
                                  </nav>
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
                        <aside class="widget widget_text">
                            <h5 class="widget_title">newsletter</h5>
                            <div class="textwidget">
                                <form class="mc4wp-form mc4wp-form-422" method="post" data-id="422" data-name="">
                                    <div class="mc4wp-form-fields">
                                        <p>
                                            <label>Enter your email below and be the first to know news from us!</label>
                                            <input type="email" name="EMAIL" placeholder="E-mail address" required />
                                        </p>
                                        <p>
                                            <input type="submit" value="Subscribe" />
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
                        </aside>
                    </div>
                </div>
            </div>
        </div>
</div>    
