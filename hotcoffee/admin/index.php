<?php
    include "header.php";
    include "../models/sanpham.php";
    include "../models/pdo.php";
    include "../models/danhmuc.php";
    //controller
    if (isset($_GET['act']) ){
        $act = $_GET['act'];
        switch ($act){ 
            // ------------------------------------ Thêm danh mục ------------------------------------
            case 'adddm':
            // kiểm tra xem người dùng có click vào nút add hay không 
            if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                $tenDanhmuc = $_POST['tenDanhmuc'];
                insert_danhmuc($tenDanhmuc);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
            // ------------------------------------ Danh sách danh mục ------------------------------------
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            // ------------------------------------ Xóa danh mục ------------------------------------
            case 'xoadm':
                if(isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)){
                    delete_danhmuc($_GET['id_dm']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            // ------------------------------------ khôi phục danh mục ------------------------------------
            case 'kpdm':
                if(isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)){
                    khoiphuc_danhmuc($_GET['id_dm']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            // ------------------------------------ Sửa danh mục ------------------------------------
            case 'suadm':
                if(isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)){
                    $dm = loadone_danhmuc($_GET['id_dm']);
                }
                include "danhmuc/update.php";
                break;
            // ------------------------------------ Cập nhật danh mục ------------------------------------    
            case 'updatedm':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $tenDanhmuc = $_POST['tenDanhmuc'];
                    $id_dm = $_POST['id_dm'];
                    update_danhmuc($id_dm,$tenDanhmuc);
                    $thongbao = "cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
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