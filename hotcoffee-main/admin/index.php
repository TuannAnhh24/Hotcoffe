<?php

ob_start();
session_start();


include "header1.php";
include "../models/sanpham.php";
include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/taikhoan.php";
include "../models/binhluan.php";
include "../models/hoadon.php";
include "../models/thongke.php";


$login_error = ""; // Biến để lưu trữ thông báo lỗi
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['email'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'login') {
        // Đoạn mã xử lý đăng nhập
        if (isset($_POST['btn_login']) && ($_POST['btn_login'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $checkuser = checkuser($email, $pass);
            if (is_array($checkuser)) {
                $_SESSION = $checkuser;
                header('Location: index.php');
                exit();
            } else {
                $login_error = "Tài khoản không tồn tại";          
            }
        }
        include "login.php";
    } else {
        header('Location: login.php');
        exit();
    }
} else {
    //controller
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
                // ------------------------------------ Thêm danh mục ------------------------------------
            case 'adddm':
                // kiểm tra xem người dùng có click vào nút add hay không 
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
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
                if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                    delete_danhmuc($_GET['id_dm']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                // ------------------------------------ khôi phục danh mục ------------------------------------
            case 'kpdm':
                if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                    khoiphuc_danhmuc($_GET['id_dm']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                // ------------------------------------ Sửa danh mục ------------------------------------
            case 'suadm':
                if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id_dm']);
                }
                include "danhmuc/update.php";
                break;
                // ------------------------------------ Cập nhật danh mục ------------------------------------    
            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenDanhmuc = $_POST['tenDanhmuc'];
                    $id_dm = $_POST['id_dm'];
                    update_danhmuc($id_dm, $tenDanhmuc);
                    $thongbao = "cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                // ------------------------------------ Danh sách sản phẩm --------------------------------
            case 'listSp':
                //phân page
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                //$total_records = get_total_products();
                // Lấy tổng số sản phẩm với hoặc không có điều kiện lọc theo id_dm
                if (isset($_POST['id_dm']) && $_POST['id_dm'] > 0) {
                    $id_dm = $_POST['id_dm'];
                    $total_records = get_total_products($id_dm); // Số sản phẩm với id_dm
                } else {
                    $id_dm = 0;
                    $total_records = get_total_products(); // Số sản phẩm không có id_dm
                }
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } elseif ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = max($start, 0); // Đảm bảo giá trị không nhỏ hơn 0
                // lọc
                if (isset($_POST['id_dm']) && $_POST['id_dm'] > 0) {
                    $id_dm = $_POST['id_dm'];
                } else {
                    $id_dm = 0;
                }
                if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }

                $listsanpham = load_sp($start, $limit, $id_dm, $kyw);
                $tendanhmuc = load_danhmuc_tontai();
                include "sanpham/list.php";
                break;
                // ------------------------------------ Thêm sản phẩm ------------------------------------   
            case "addsp":
                if (isset($_POST['addSanpham']) && $_POST['addSanpham']) {
                    $idDm = $_POST['id_dm'];
                    $tenSp = $_POST['nameSp'];
                    $giaGoc = $_POST['gia_Goc'];
                    $giaKm = $_POST['gia_Km'];
                    $moTa = $_POST['moTa'];
                    $img = $_FILES['anhSp']['name'];
                    $saveImg = "../images/";
                    $targetFiles = $saveImg . basename($_FILES['anhSp']['name']);
                    // Kiểm tra xem file có phải là hình ảnh hay không
                    $check = getimagesize($_FILES["anhSp"]["tmp_name"]);
                    if ($check !== false) {
                        // File là hình ảnh
                        if (move_uploaded_file($_FILES['anhSp']['tmp_name'], $targetFiles)) {
                            echo "Upload thành công";
                        } else {
                            echo "up ảnh bị lỗi";
                        }
                        insert_sanpham($tenSp, $giaGoc, $giaKm, $moTa, $img, $idDm);
                    } else {
                        // File không phải là hình ảnh
                        echo "<script> alert('File không phải là hình ảnh !!!'); </script>";
                    }
                }
                $listdanhmuc = load_danhmuc_tontai();
                include "sanpham/add.php";
                break;
                // ------------------------------------ Chi tiết sản phẩm   ------------------------------------
            case 'ctsp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $chitietSanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/addCt.php";
                break;
                // ------------------------------------ Thêm chi tiết sản phẩm ------------------------------------
            case 'addctsp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $chitietSanpham = loadone_sanpham($_GET['id']);
                }
                if (isset($_POST['addCtsp']) && $_POST['addCtsp']) {
                    $giaM = $_POST['giaM'];
                    $giaL = $_POST['giaL'];
                    $giaXL = $_POST['giaXL'];
                    $idSp = $_POST['idSp'];
                    insert_sanphamCT($giaM, $idSp, $giaL, $giaXL);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/addCt.php";
                break;
                // ------------------------------------ Sửa sản phẩm ------------------------------------
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $chitietSanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = load_danhmuc_tontai();
                include "sanpham/update.php";
                break;
                // ------------------------------------ Update sản phẩm ------------------------------------
            case 'updatesp':
                if (isset($_POST['Sua']) && $_POST['Sua']) {
                    $idSp = $_POST['id_sp'];
                    $idDm = $_POST['id_dm'];
                    $tenSp = $_POST['nameSp'];
                    $giaGoc = $_POST['gia_Goc'];
                    $giaKm = $_POST['gia_Km'];
                    $moTa = $_POST['moTa'];
                    $img = $_FILES['anhSp']['name'];
                    $saveImg = "../images/";
                    $targetFiles = $saveImg . basename($_FILES['anhSp']['name']);
                    if (move_uploaded_file($_FILES['anhSp']['tmp_name'], $targetFiles)) {
                        echo "Upload thành công";
                    } else {
                        echo "up ảnh bị lỗi";
                    }
                    update_sanpham($idSp, $idDm, $tenSp, $giaGoc, $giaKm, $moTa, $img);
                    header("Location:index.php?act=listSp");
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;
                // ------------------------------------ Xóa sản phẩm ------------------------------------
            case 'deleteSp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_ct_hoadon_fromsp($_GET['id']);
                    delete_binhluan_fromsp($_GET['id']);
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;
                // ------------------------------------ Danh sách tài khoản  ------------------------------------
            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
                // ------------------------------------ Xóa tài khoản  ------------------------------------
            case 'xoatk':
                if (isset($_GET['id_tk']) && ($_GET['id_tk'] > 0)) {
                    $id_tk = $_GET['id_tk'];
                    $kt_tk = loadone_taikhoan($id_tk);
                    extract($kt_tk);
                    if ($phan_quyen == 1) {
                        echo "<script> alert('Tài khoản này không thể bị xóa !!!'); </script>";
                    } else {
                        delete_taikhoan($_GET['id_tk']);
                    }
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/list.php";
                break;
                // ------------------------------------ Danh sách bình luận  ------------------------------------
            case 'dsbl':
                //phân page
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;
                $total_records = get_total_bl();
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } elseif ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = max($start, 0); // Đảm bảo giá trị không nhỏ hơn 0
                //Lọc theo ngày
                $ngay_BatDau = "";
                $ngay_KetThuc = "";
                if (isset($_POST['filter'])) {
                    $ngay_BatDau = $_POST['ngayBatDau'];
                    $ngay_KetThuc = $_POST['ngayKetThuc'];
                }
                $listbl = load_bl($start, $limit, $ngay_BatDau, $ngay_KetThuc);
                include "binhluan/list.php";
                break;
                // ------------------------------------ Xóa Bình luận ------------------------------------
            case 'xoabl':
                if (isset($_GET['id_bl']) && ($_GET['id_bl'] > 0)) {
                    delete_binhluan($_GET['id_bl']);
                    header('location:index.php?act=dsbl');
                }
                $listbl = loadall_binhluan(0);
                include "binhluan/list.php";
                break;
                // ------------------------------------ Trang hóa đơn ------------------------------------
            case 'dsdh':
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $limit = 10;
                $total_records = get_total_hd();
                $total_records = intval($total_records);
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page && $total_page > 0) {
                    $current_page = $total_page;
                } elseif ($current_page < 1) {
                    $current_page = 1;
                }
                $start = max(0, ($current_page - 1) * $limit);
                // lọc theo trạng thái
                $trang_Thai = "";
                $ngay_BatDau = "";
                $ngay_KetThuc = "";
                if (isset($_POST['filter'])) {
                    $trang_Thai = isset($_POST['trangThai']) ? $_POST['trangThai'] : "";
                    $ngay_BatDau = isset($_POST['ngayBatDau']) ? $_POST['ngayBatDau'] : "";
                    $ngay_KetThuc = isset($_POST['ngayKetThuc']) ? $_POST['ngayKetThuc'] : "";
                }

                $listhoadon = load_hd($start, $limit, $trang_Thai, $ngay_BatDau, $ngay_KetThuc);

                include "hoadon/list.php";
                break;
                // ------------------------------------ Trang chi tiết hóa đơn  ------------------------------------
            case 'chitiethoadon':
                if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                    $id_hd = $_GET['id_hd'];
                    $xem_hd = CT_hoadon($id_hd);
                    // $lay_sp = loadone_CTsanpham();
                }
                include "hoadon/ct.hoadon.php";
                break;
                // ------------------------------------ Xác nhận đơn hàng  ------------------------------------
            case 'xacnhandonhang':
                if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                    xacnhan_dh($_GET['id_hd']);
                    header('location:index.php?act=dsdh');
                }
                $listhoadon = loadall_hoadon();
                exit();
                break;
                // ------------------------------------ Vận chuyển đơn hàng  ------------------------------------
            case 'giaodonhang':
                if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                    giao_dh($_GET['id_hd']);
                    header('location:index.php?act=dsdh');
                }
                $listhoadon = loadall_hoadon();
                include "hoadon/list.php";
                break;
                // ------------------------------------ Xóa đơn hàng ------------------------------------
            case 'xoadh':
                if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                    delete_ct_hoadon($_GET['id_hd']);
                    delete_donhang($_GET['id_hd']);
                    header('location:index.php?act=dsdh');
                }
                $listhoadon = loadall_hoadon();
                include "hoadon/list.php";
                break;
                // ------------------------------------ Thống kê ------------------------------------
            case 'thongke':
                $total_orders = tongso_hoadon();
                $revenue = doanh_thu();
                $best_selling_product = sp_banchay_nhat();
                // $loyal_customer = kh_thanthiet();
                $cancellation_rate = tile_huydon();
                include "thongke/list.php";
                break;
                // ------------------------------------ oder_list thống kê ------------------------------------
            case 'oder_list':
                $listhoadon = loadall_hoadon();
                include "thongke/oder_list.php";
                break;
                // ------------------------------------ Biểu đồ thống kê sản phẩm bán chạy ------------------------------------
            case 'banchay':
                $thongke_sp_banchay = thongke_sp_banchay();
                include "thongke/banchay.php";
                break;
                // ------------------------------------ Biểu đồ thống kê tỉ lệ hủy đơn hàng ------------------------------------
            case 'tk-huydon':
                $cancellation_rate = tile_huydon();
                include "thongke/tl.huydon.php";
                break;
                // ------------------------------------ Biểu đồ thống kê đơn hàng ------------------------------------
            case 'tk-donhang':
                $thongke_donhang = thongke_donhang();
                include "thongke/tk.donhang.php";
                break;
                // ------------------------------------ Biểu đồ thống kê doanh thu ------------------------------------
            case 'tk-doanhthu':
                $thongke_doanhthu = thongke_doanhthu();
                include "thongke/tk.doanhthu.php";
                break;
                // ------------------------------------Logout ADmin ------------------------------------
            case 'logout':
                session_unset();
                header('Location: login/login.php');
                break;
        }
    } else {
        include "home.php";
    }
}
include "footer1.php";
ob_end_flush();
