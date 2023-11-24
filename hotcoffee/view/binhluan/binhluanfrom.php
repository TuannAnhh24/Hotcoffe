<?php
    session_start();
    include "../../models/pdo.php";
    include "../../models/binhluan.php";
    include "../../models/sanpham.php";
    if(isset($_SESSION['email'])){
        $id_tk = $_SESSION['email']['id_tk'];
    }
    $id_sp = $_REQUEST['id_sp'];
    $lay_name =loadone_sanpham($id_sp);
    extract($lay_name);
    $dsbl = loadall_binhluan($id_sp); 
    // join bảng tài khoản 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="woocommerce-Tabs-panel" id="tab-reviews" >
        <div id="reviews" class="woocommerce-Reviews">
            <div id="comments">
            <h2 class="woocommerce-Reviews-title">Bình luận</h2>
            <?php
                if(empty($dsbl)){
                    echo '<p class="woocommerce-noreviews">Hiện tại không có đánh giá nào.  
                        </div>';
                }else {
                    echo '<div style="display: flex; flex-direction: column; border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">';
                    foreach($dsbl as $bl){
                    extract($bl);
                    echo '<span style="font-weight: bold;">'.$id_tk.'</span>';
                    echo '<span style="font-size: 0.8em; color: #888;">'.$ngay_bl.'</span>';
                    echo '<p style="margin-top: 10px;">'.$noi_dung.'</p>';
                    }
                    echo '</div>';
                }
                
                
                
            ?>
            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Bạn hãy nhận xét về &ldquo;<?=$name_sp?>&rdquo;</h3>
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" id="commentform" class="comment-form">
                            <!-- <p class="comment-notes">
                                <span id="email-notes">Địa chỉ email của bạn sẽ không được công bố.</span> Các trường bắt buộc được đánh dấu 
                                <span class="required">*</span>
                            </p> -->
                            <!-- <p class="comment-form-rating">
                                <label for="rating">Đánh giá của bạn</label>
                                <select name="rating" id="rating" aria-required="true" required>
                                    <option value="">Rate&hellip;</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very Poor</option>
                                </select>
                            </p> -->
                            <p class="comment-form-comment">
                                <label for="comment">Đánh giá của bạn
                                    <span class="required">*</span>
                                </label>
                                <textarea id="comment" name="noidung" cols="45" rows="8" aria-required="true" required></textarea>
                            </p>
                            <p class="form-submit">
                                <input type="hidden" name="id_sp" value="<?=$id_sp?>">
                                <input name="guibinhluan" type="submit" id="submit" class="submit" value="Gửi bình luận" />
                                <!-- <input type='hidden' name='comment_post_ID' value='140' id='comment_post_ID' />
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0' /> -->
                            </p>
                        </form>
                    </div>
                    <?php 
                        if(isset($_POST['guibinhluan'])){
                            $id_sp = $_POST['id_sp'];
                            $id_tk = $_SESSION['email']['id_tk'];
                            $noi_dung = $_POST['noidung'];
                            $ngay_bl = date("h:i:sa d/m/Y");
                            insert_binhluan($id_sp, $id_tk, $noi_dung, $ngay_bl);
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                        }
                        
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>
</html>