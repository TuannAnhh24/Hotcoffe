<?php
    include "header.php";
    include "../models/sanpham.php";
    include "../models/pdo.php";
    if (isset($_GET['act']) ){
        $act = $_GET['act'];
        switch ($act){ 
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không 
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenDanhmuc = $_POST['tenDanhmuc'];
                    // thêm cột thêm danh_muc(name,???) và VALUES('$tenDanhmuc'. '???' )
                    $sql= "INSERT INTO danh_muc(name) VALUES('$tenDanhmuc') ";
                    pdo_execute($sql);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case 'listdm':
                $sql = "SELECT * FROM danh_muc order by name ";
                $listdanhmuc = pdo_query($sql);
                include "danhmuc/list.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>