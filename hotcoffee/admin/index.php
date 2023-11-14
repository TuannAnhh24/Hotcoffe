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
                 // ------------------------------------ Danh sách sản phẩm --------------------------------
            case 'listSp':     
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm= $_POST['iddanhmuc'];
                }else{
                    $kyw = "";
                    $iddm= 0;
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham= loadall_sanpham($kyw,$iddm);
                include "sanpham/list.php";
                break;
                  // ------------------------------------ Thêm sản phẩm ------------------------------------   
            case "addsp":
                if(isset($_POST['addSanpham'])&& $_POST['addSanpham']){
                    $idDm = $_POST['id_dm'];
                    $tenSp = $_POST['nameSp'];
                    $giaGoc = $_POST['gia_Goc'];
                    $giaKm = $_POST['gia_Km'];
                    $moTa = $_POST['moTa'];
                    $img = $_FILES['anhSp']['name'];
                    $saveImg = "../images/";
                    $targetFiles= $saveImg.basename($_FILES['anhSp']['name']);
                    if(move_uploaded_file($_FILES['anhSp']['tmp_name'],$targetFiles)){
                        echo "Upload thành công";
                    }else{
                        echo "up ảnh bị lỗi";
                    }
                    insert_sanpham($tenSp,$giaGoc,$giaKm,$moTa,$img,$idDm);       
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
                 // ------------------------------------  ------------------------------------
            case 'ctsp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $chitietSanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/addCt.php";
                break;  
                // ------------------------------------ Thêm chi tiết sản phẩm ------------------------------------
            case 'addctsp':   
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $chitietSanpham = loadone_sanpham($_GET['id']);
                }
                if (isset($_POST['addCtsp'])&&$_POST['addCtsp']){
                    $giaM = $_POST['giaM'];
                    $giaL = $_POST['giaL'];
                    $giaXL = $_POST['giaXL'];
                    $idSp = $_POST['idSp'];
                    insert_sanphamCT($giaM,$idSp,$giaL,$giaXL);
                }  
                    $listdanhmuc = loadall_danhmuc();
                   
                  include "sanpham/addCt.php";
                break;

                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $chitietSanpham = loadone_sanpham($_GET['id']);
                    }
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/update.php";
                    break;
                // ------------------------------------ Update sản phẩm ------------------------------------
            case 'updatesp':
                if(isset($_POST['addSanpham'])&& $_POST['addSanpham']){
                    $id=$_POST['id_sp'];
                    $idDm = $_POST['id_dm'];
                    $tenSp = $_POST['nameSp'];
                    $giaGoc = $_POST['gia_Goc'];
                    $giaKm = $_POST['gia_Km'];
                    $moTa = $_POST['moTa'];
                    $img = $_FILES['anhSp']['name'];
                    $saveImg = "../images/";
                    $targetFiles= $saveImg.basename($_FILES['anhSp']['name']);
                    if(move_uploaded_file($_FILES['anhSp']['tmp_name'],$targetFiles)){
                        echo "Upload thành công";
                    }else{
                        echo "up ảnh bị lỗi";
                    }
                    update_sanpham($id,$idDm,$tenSp,$giaGoc,$giaKm,$moTa,$img);       
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham= loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case 'deleteSp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_Ctsanpham($_GET['id']);
                    delete_sanpham($_GET['id']);
                    
                }
                $listsanpham= loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>