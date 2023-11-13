<?php 
    session_start();
    include "view/header.php";
    include "models/taikhoan.php";
    include "models/pdo.php";
    
    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act = $_GET['act'];
        switch ($act) {
            case 'ban':
                include "view/ban.php";
                break;

            case 'gioithieu':
                include "view/gioithieu.php";
                break;

            case 'lienhe':
                include "view/lienhe.php";
                break;

            case 'menu':
                include "view/menu.php";
                break;

            case 'dangnhap':
                include "view/taikhoan/dangnhap.php";
                break;

            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $sdt = $_POST['sdt'];
                    insert_taikhoan($email,$pass,$sdt);
                    $thongbao = "Đã đăng ký thành công";
                }
                include "view/taikhoan/dangky.php";
                break;

            case 'quenmk':
                include "view/taikhoan/quenmk.php";
                break;
            
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>