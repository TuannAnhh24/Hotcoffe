<?php
    include "header.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "../model/pdo.php";
    if (isset($_GET['act']) ){
        $act = $_GET['act'];
        switch ($act){ 
            // ---------------------------- load toàn bộ danh mục -------------------------
            case 'listdm':
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
            break;
            // ---------------------------- Thêm danh mục ----------------------------
            case 'adddm':
                if(isset($_POST['themmoi']) && $_POST['themmoi'] ){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/add.php";
            break;  
            // ---------------------------- biểu đồ ----------------------------
            case 'bieudo':
                $listthongke = loadall_thongke();
                include "thongke/bieudo.php";
            break;
            // ----------------------------Xóa danh mục ----------------------------
            case 'xoadm':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
            break;
            //---------------------------- Sửa danh mục ----------------------------    
            case 'suadm':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
            break;
            // ---------------------------- Cập nhật danh mục ----------------------------
            case 'updatedm':    
                if(isset($_POST['capnhat']) && $_POST['capnhat'] ){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
            break;  
                /*--------------------------------- controller sản phẩm ------------------------------------*/ 
            case 'addsp':
                // kiểm tra xem người dùng có click vào nút add không ??
                if(isset($_POST['themmoi']) && $_POST['themmoi'] ){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinhsp = $_FILES['hinhsp']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinhsp']['name']);
                    if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)){
                        // echo "the file". htmlspecialchars(basename($_FILES["hinhsp"]["name"]));
                    }
                    insert_sanpham($tensp,$giasp,$hinhsp,$mota,$iddm);
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
            break;
                // ---------------------------- Hiển thị danh sách sản phẩm ----------------------------
            case 'listsp':
                if(isset($_POST['listok']) && $_POST['listok'] ){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else {
                    $kyw = "";
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw,$iddm);
                include "sanpham/list.php";
            break;  
                // ---------------------------- Xóa sản phẩm ----------------------------
            case 'xoasp':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
            break;    
                // ---------------------------- Sửa sản phẩm ----------------------------
            case 'suasp':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
            break;
                // ---------------------------- Cập nhật sản phẩm ----------------------------
            case 'updatesp':    
                if(isset($_POST['capnhat']) && $_POST['capnhat'] ){
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinhsp = $_FILES['hinhsp']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinhsp']['name']);
                    if (move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file)){
                        // echo "the file". htmlspecialchars(basename($_FILES["hinhsp"]["name"]));
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinhsp);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
            break;
                // ----------------------------------------------- Khách hàng ---------------------------------------------
            case "dskh":
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;  
                // ----------------------------------------------- Xóa tài khoản -----------------------------------------
            case 'xoatk':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    delete_taikhoan($_GET['id']);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
                    //---------------------------- Danh sách bình luận ----------------------------
            case "dsbl":
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;    
                    // ---------------------------- Xóa bình luận ----------------------------
            case "xoabl":
                if(isset($_GET['id']) && $_GET['id']>0){
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan(0);
                include "binhluan/list.php";
                break;  
                // ---------------------------- thống kê ----------------------------
            case 'thongke':
                $listthongke= loadall_thongke();
                include "thongke/list.php";
                break;
            default :
                include "home.php";
                break;
        }
    }else {
        include "home.php";
    }
    include "footer.php";
?>