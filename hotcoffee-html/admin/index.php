<?php
    include "header.php";
    include "../models/sanpham.php";
    if (isset($_GET['act']) ){
        $act = $_GET['act'];
        switch ($act){ 
            case 'sanpham':
                include "sanpham/list.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>