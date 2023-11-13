<?php 
    session_start();
    include "view/header.php";
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
                include "view/dangnhap.php";
                break;

            case 'dangky':
                include "view/dangky.php";
                break;

            case 'quenmk':
                include "view/quenmk.php";
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