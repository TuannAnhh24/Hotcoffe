<?php
    include "header.php";
    include "../models/sanpham.php";
    include "../models/pdo.php";
    include "../models/danhmuc.php";
    include "../models/taikhoan.php";
    include "../models/binhluan.php";
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
              //phân page
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $limit = 6;
              $total_records = get_total_products();
              $total_records = intval($total_records);
              $total_page = ceil($total_records / $limit);
              if ($current_page > $total_page){
                  $current_page = $total_page;
              }
              elseif ($current_page < 1){
                  $current_page = 1;
              }
              $start = ($current_page - 1) * $limit;
              //
              if(isset($_GET['id_dm'])&&$_GET['id_dm']>0){
                  $id_dm =$_GET['id_dm']; 
              }else{
                  $id_dm = 0;
              }if(isset($_POST['kyw'])&&$_POST['kyw']!=""){
                  $kyw = $_POST['kyw'];
              }else{
                  $kyw= "";
              }
           
              $listsanpham = load_sp($start, $limit,$id_dm,$kyw);
              $tendanhmuc = load_tendm($id_dm);
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
                 // ------------------------------------ Chi tiết sản phẩm   ------------------------------------
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
                // ------------------------------------ Sửa sản phẩm ------------------------------------
                case 'suasp':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $chitietSanpham = loadone_sanpham($_GET['id']);
                    }
                    $listdanhmuc= loadall_danhmuc();
                    include "sanpham/update.php";
                    break;
                // ------------------------------------ Update sản phẩm ------------------------------------
            case 'updatesp':
                if(isset($_POST['Sua']) && $_POST['Sua']){ 
                    $idSp=$_POST['id_sp'];
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
                    update_sanpham($idSp,$idDm,$tenSp,$giaGoc,$giaKm,$moTa,$img);   
                    header("Location:index.php?act=listSp");
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham= loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            // ------------------------------------ Xóa sản phẩm ------------------------------------
            case 'deleteSp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_Ctsanpham($_GET['id']);
                    delete_sanpham($_GET['id']);
                }
                $listsanpham= loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            // ------------------------------------ Danh sách tài khoản  ------------------------------------
            case 'dskh':
                $listtaikhoan= loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            // ------------------------------------ Xóa tài khoản  ------------------------------------
            case 'xoatk':
                if(isset($_GET['id_tk']) && ($_GET['id_tk'] > 0)){
                    $id_tk = $_GET['id_tk'];
                    $kt_tk = loadone_taikhoan($id_tk);
                    extract($kt_tk);
                    if($phan_quyen == 1){
                        echo "<script> alert('Tài khoản này không thể bị xóa !!!'); </script>";
                    }else {
                        delete_taikhoan($_GET['id_tk']);
                    }
                }
                $listtaikhoan= loadall_taikhoan();
                include "taikhoan/list.php";
                break;
            // ------------------------------------ Danh sách bình luận  ------------------------------------
            case 'dsbl':
                $listbl= loadall_binhluan(0);
                include "binhluan/list.php";
                break;
            // ------------------------------------ Xóa Bình luận ------------------------------------
            case 'xoabl':
                if(isset($_GET['id_bl']) && ($_GET['id_bl'] > 0)){
                    delete_binhluan($_GET['id_bl']);
                }
                $listbl= loadall_binhluan(0);
                include "binhluan/list.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>