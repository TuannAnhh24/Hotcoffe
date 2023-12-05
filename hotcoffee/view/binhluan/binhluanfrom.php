<?php
    session_start();
    include "../../models/pdo.php";
    include "../../models/binhluan.php";
    include "../../models/sanpham.php";
    if(isset($_SESSION['email'])){
        $id_tk = $_SESSION['email']['id_tk'];
    }
    $id_sp = $_REQUEST['id_sp'];
    $lay_name = loadone_sanpham($id_sp);
    extract($lay_name);
    $dsbl = loadall_binhluan($id_sp); 
    // join tài khoản 
    $sql = 'SELECT * FROM `tai_khoan` as tk INNER JOIN `binh_luan` as bl ON tk.id_tk = bl.id_tk ';
    $lay_tk = pdo_query_one($sql); 
    
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
                    echo '<p class="woocommerce-noreviews">Hiện tại không có đánh giá nào.</p>';
                } else {
                    foreach($dsbl as $bl){
                        extract($bl);
                        echo '<div style="background-color: #f8f8f8; margin-bottom: 15px; padding: 10px; border-radius: 5px;">';
                        echo '<h4 style="margin: 0;">'.$lay_tk['email'].'</h4>';
                        echo '<span style="font-size: 0.8em; color: #888;">'.$ngay_bl.'</span>';
                        echo '<p style="margin-top: 10px;">'.$noi_dung.'</p>';
                        echo '</div>';
                    }
                }
            ?>
            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">
                        <h3 id="reply-title" class="comment-reply-title">Bạn hãy nhận xét về &ldquo;<?=$name_sp?>&rdquo;</h3>
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" id="commentform" class="comment-form">
                            <?php
                            
                                if (isset($_SESSION['email'])) {
                                    // Người dùng đã đăng nhập
                                    if (da_mua_hang($id_tk, $id_sp)) {
                                        // Người dùng đã mua sản phẩm, hiển thị form bình luận
                                        echo '<p class="comment-form-comment">
                                        <label for="comment">Đánh giá của bạn
                                            <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="noidung" cols="45" rows="8" aria-required="true" required></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <input type="hidden" name="id_sp" value="'.$id_sp.'">
                                            <input name="guibinhluan" type="submit" id="submit" class="submit" value="Gửi bình luận" />
                                        </p>';
                                    } else {
                                        // Người dùng chưa mua sản phẩm, hiển thị thông báo
                                        echo '<p>Bạn cần mua sản phẩm này trước khi bình luận.</p>';
                                    }
                                    
                                } else {
                                    // Người dùng chưa đăng nhập, hiển thị thông báo
                                    echo '<p>Bạn cần <a href="index.php?act=dangnhap">đăng nhập</a> để bình luận.</p>';
                                }
                            ?>
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