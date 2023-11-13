<?php
    include "header.php";
    include "../models/sanpham.php";
    include "../models/pdo.php";
    include "../models/danhmuc.php";
    //controller
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
            case "addsp":
                if(isset($_POST['addSanpham'])&& $_POST['addSanpham']){
                    $idDm = $_POST['id_dm'];
                    $nameSp = $_POST['nameSp'];
                    $giaGoc = $_POST['gia_Goc'];
                    $giaKm = $_POST['gia_Km'];
                    $sizeM= $_POST['sizeM'];
                    $sizeL= $_POST['sizeL'];
                    $sizeXL= $_POST['sizeXL'];
                    $moTa = $_POST['moTa'];
                    $img = $_FILES['anhSp']['name'];
                    $saveImg = "../images/";
                    $targetFiles= $saveImg.basename($_FILES['anhSp']['name']);
                    if(move_uploaded_file($_FILES['anhSp']['tmp_name'],$targetFiles)){
                        echo "Upload thành công";
                    }else{
                        echo "up ảnh bị lỗi";
                    }
            
                    $thongbao ="Thêm thành công";     
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case 'updatesp':

                include "sanpham/updates.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>