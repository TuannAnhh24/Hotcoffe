<?php
ob_start();
session_start();
include "view/header.php";
include "models/taikhoan.php";
include "models/pdo.php";
include "models/sanpham.php";
include "models/danhmuc.php";
include "models/hoadon.php";
include "models/voucher.php";
include "models/configvnpay.php";
include "global.php";
$listdanhmuc = load_danhmuc_tontai();
$spBanchay = loadall_sanpham_banchay();
$login_error = "";
if (!isset($_SESSION['mycart']))  $_SESSION['mycart'] = [];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_GET['act']) && ($_GET['act'] != "")) {
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
            // ---------------------------------------- MENU ----------------------------------------
        case 'menu':
            //phân page
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 6;
            $total_records = get_total_products();
            $total_records = intval($total_records);
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            //
            if (isset($_GET['id_dm']) && $_GET['id_dm'] > 0) {
                $id_dm = $_GET['id_dm'];
            } else {
                $id_dm = 0;
            }
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            $listsanpham = load_sp($start, $limit, $id_dm, $kyw);
            $tendanhmuc = load_tendm($id_dm);
            include "view/menu.php";
            break;
            // ---------------------------------------- Sản phẩm chi tiết ----------------------------------------
        case 'spct':

            if (isset($_GET['id_sp']) && $_GET['id_sp'] > 0) {
                $id_sp = $_GET['id_sp'];
                $onesp = loadone_sanpham($id_sp);
                extract($onesp);
                $onedm =  loaddm_Ctsanpham(number_format($id_sp));
                // lấy danh mục
                $lay_dm = lay_dm($id_dm);
                $dm = $lay_dm[0]; // Lấy danh mục đầu tiên từ kết quả
                extract($dm);

                $sp_cung_loai = loadone_sanpham_cungloai($id_sp, $id_dm);

                $listsanphamCL = load_spCL($id_dm);
                include "view/sanphamCt.php";
            } else {
                include "view/home.php";
            }
            break;


            //---------------------------------------- Đăng nhập tài khoản ----------------------------------------
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                if (empty($email) || empty($pass)) {
                    $login_error = "Vui lòng nhập đầy đủ email và mật khẩu.";
                } else {
                    $checkuser = checkuser($email, $pass);
                    if (is_array($checkuser)) {
                        $_SESSION['email'] = $checkuser;
                        header('location: index.php');
                    } else {
                        $login_error = "Tài khoản hoặc mật khẩu sai";
                    }
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
            // ---------------------------------------- Đăng ký tài khoản ----------------------------------------
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $sdt = $_POST['sdt'];
                // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
                $user = select_taikhoan_by_email($email);
                if ($user) {
                    // Nếu người dùng tồn tại, hiển thị thông báo lỗi
                    echo "<script type='text/javascript'>alert('Email đã được sử dụng. Vui lòng chọn Email khác');</script>";
                } else {
                    insert_taikhoan($email, $pass, $sdt);
                    echo "<script type='text/javascript'>alert('Đã đăng ký thành công');</script>";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
            // -------------------------------------------------- Cập nhật tài khoản --------------------------------------------------
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $sdt = $_POST['sdt'];
                $address = $_POST['address'];
                $namsinh = $_POST['namsinh'];
                $gioitinh = $_POST['gioitinh'];
                $id_tk = $_POST['id_tk'];
                // update hình ảnh
                $img = $_FILES['hinhanh']['name'];
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file))
                    // end update hình ảnh
                    update_taikhoan($id_tk, $username, $pass, $email, $sdt, $address, $namsinh, $gioitinh, $img);
                $_SESSION['email'] = checkuser($email, $pass);
                header('Location: index.php');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
            // ---------------------------------------- Quên mật khẩu ----------------------------------------    
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                extract($checkemail);
                if (is_array(checkemail($email))) {
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;       //xuất thông tin chi tiết về quá trình gửi email
                        $mail->isSMTP();                                      //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                 //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                             //Enable SMTP authentication
                        $mail->Username   = 'anhntph42639@fpt.edu.vn';        //Địa chỉ người gửi
                        $mail->Password   = 'vfelxjjakhsacbyu';               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      //Enable implicit TLS encryption
                        $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //người nhận
                        $mail->setFrom('anhntph42639@fpt.edu.vn', 'TuanAnhh');        //  địa chỉ người gửi
                        $mail->addAddress($_POST['email']);                          //địa chỉ người nhận
                        // $mail->addReplyTo('info@example.com', 'Information');

                        //file đính kèm
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Hello ' . $_POST['email'] . ' ';
                        $mail->Body    = 'Nhận thấy bạn đang không nhớ được <b>Mật Khẩu!</b> đăng nhập của mình Chúng tôi quyết định cấp lại cho bạn mật khẩu đăng nhập qua email!!! Mật khẩu của bạn là: ' . $pass . ' ';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo "<script type='text/javascript'>alert('Vui lòng kiểm tra hộp thư');</script>";
                    } catch (Exception $e) {
                        echo "<script type='text/javascript'>alert('Vui lòng đăng ký tài khoản');</script>";
                    }
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
            // ----------------------------------- Đăng xuất tài khoản ---------------------------------
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
            // ------------------------------------ Trang Giỏ Hàng  ------------------------------------
        case 'cart':
            include "view/cart.php";
            break;
            // ------------------------------------ Xóa Sp Giỏ Hàng  ------------------------------------
        case 'xoasp-gh':
            if (isset($_GET['id_gh'])) {
                $id_to_remove = $_GET['id_gh'];
                if (isset($_SESSION['mycart'][$id_to_remove])) {
                    array_splice($_SESSION['mycart'], $id_to_remove, 1);
                }
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=add-to-cart');
            break;
            // ------------------------------------ Thêm vào Giỏ Hàng  ------------------------------------
        case 'add-to-cart':
            // Xử lý thêm sản phẩm vào giỏ hàng
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-cart'])) {
                $name_sp = $_POST['name_sp'];
                $quantity = $_POST['quantity'];
                $gia_goc = $_POST['gia_goc'];
                $gia_km = $_POST['gia_km'];
                $img = $_POST['img'];
                $size = $_POST['selectedSize']; // Thêm dòng này
                $luongda = $_POST['luongda'] ?? '100%'; // Thêm dòng này
                $luongduong = $_POST['luongduong'] ?? '100%'; // Thêm dòng này
                $id_sp = $_POST['id_sp'];
                $found = false; // Biến để kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                // Duyệt qua từng sản phẩm trong giỏ hàng để kiểm tra xem sản phẩm đã tồn tại hay chưa
                foreach ($_SESSION['mycart'] as $key => $cartItem) {
                    // Nếu tên sản phẩm đã tồn tại trong giỏ hàng
                    if ($cartItem[0] === $name_sp && $cartItem[5] === $size) {
                        // Cập nhật số lượng và giá sản phẩm
                        $_SESSION['mycart'][$key][1] += $quantity;
                        $_SESSION['mycart'][$key][2] = $gia_goc;
                        $_SESSION['mycart'][$key][3] = $gia_km;
                        $found = true; // Đã tìm thấy sản phẩm trong giỏ hàng
                        break;
                    }
                }
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
                if (!$found) {
                    $cart = [$name_sp, $quantity, $gia_goc, $gia_km, $img, $size, $luongda, $luongduong, $id_sp]; // Thêm vào dòng này
                    $_SESSION['mycart'][] = $cart;
                }
            }
            include "view/cart.php";
            break;
            // ------------------------------------ Trang Hóa đơn  ------------------------------------
        case 'hd':
            if (isset($_POST['dathang'])) {
                // Kiểm tra nếu giỏ hàng không rỗng thì thực hiện xử lý đặt hàng
                if (!empty($_SESSION['mycart'])) {
                    // Xử lý đặt hàng ở đây

                    $name_sp = $_POST['name_sp'];
                    $size = $_POST['laysize'];
                    $soluong_moi = $_POST['quantity'];
                    $da_moi = $_POST['luongda'] ?? '100%';
                    $duong_moi = $_POST['luongduong'] ?? '100%';

                    // Duyệt qua từng sản phẩm trong giỏ hàng
                    for ($i = 0; $i < count($name_sp); $i++) {
                        foreach ($_SESSION['mycart'] as $key => &$cartItem) {
                            // Nếu tên sản phẩm và kích cỡ khớp với sản phẩm bạn muốn chỉnh sửa
                            if ($cartItem[0] === $name_sp[$i] && $cartItem[5] === $size[$i]) {
                                // Cập nhật số lượng, lượng đá, và lượng đường
                                $cartItem[1] = $soluong_moi[$i];
                                $cartItem[6] = $da_moi[$i];
                                $cartItem[7] = $duong_moi[$i];
                            }
                        }
                    }

                    // Tính lại tổng giá trị của giỏ hàng sau khi cập nhật
                    $tong = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        // Tính giá trị của từng sản phẩm và cộng vào tổng
                        // $cart = [$name_sp, $quantity, $gia_goc, $gia_km, $img, $size, $luongda, $luongduong];
                        if ($cart[5] == "M") {
                            $ttien = $cart[3] * $cart[1];
                        } else if ($cart[5] == "L") {
                            $ttien = ($cart[3] * 1.15) * $cart[1];
                        } else if ($cart[5] == "XL") {
                            $ttien = ($cart[3] * 1.25) * $cart[1];
                        }
                        $tong += $ttien;
                    }
                } else {
                    // Nếu giỏ hàng rỗng, chuyển hướng người dùng về trang chủ hoặc hiển thị thông báo
                    header("Location: index.php"); // Chuyển hướng về trang chủ
                    exit(); // Dừng xử lý tiếp theo
                }
            }
            // Xử lý mã giảm giá
            // Khởi tạo biến thông báo
            $thongBao = "";
            $tongMoi = $tong; // Khởi tạo biến $tongMoi để lưu trữ tổng tiền mới
            // Xử lý mã giảm giá
            if (isset($_POST['maGg']) && $_POST['maGg']) {
                $maGiamgia = $_POST['maVoucher'];
                $voucherTonTai = false; // Biến để kiểm tra xem mã voucher có tồn tại không
                $maVoucher = load_vc();
                foreach ($maVoucher as $voucher) {
                    $id_vc = $voucher['id_vc'];
                    if ($voucher['ma_vc'] === $maGiamgia && $voucher['tinh_trang'] === 'Chưa sử dụng') {
                        $voucherTonTai = true; // Mã voucher hợp lệ

                        // Kiểm tra ngày bắt đầu và ngày kết thúc của mã voucher
                        $ngayBatDau = strtotime($voucher['ngay_bd']);
                        $ngayKetThuc = strtotime($voucher['ngay_kt']);
                        $ngayHienTai = time(); // Thời gian hiện tại

                        if ($ngayHienTai >= $ngayBatDau && $ngayHienTai <= $ngayKetThuc) {
                            // Mã voucher còn trong thời gian sử dụng hợp lệ
                            if ($voucher['gia_tri'] <= $tong) {
                                $tongMoi -= $voucher['gia_tri']; // Giảm giá trực tiếp từ tổng tiền
                            } else {
                                $tong = 0; // Nếu giảm giá lớn hơn tổng tiền, gán tổng tiền về 0
                            }
                        } else {
                            // Thông báo khi mã voucher không còn trong thời gian sử dụng
                            $voucherTonTai = false;
                        }

                        break; // Thoát khỏi vòng lặp khi tìm thấy mã voucher hợp lệ
                    }
                }


                // Kiểm tra và gửi thông báo nếu mã voucher không tồn tại
                if (!$voucherTonTai) {
                    //  $thongBao = "Mã voucher không hợp lệ. Vui lòng nhập lại.";
                    $thongBao = true;
                }
            }
            // Kiểm tra tính hợp lệ của mã giảm giá để quyết định hiển thị hoặc ẩn phần nhập mã giảm giá
            $maGiamgiaHople = (isset($maGiamgia) && $voucherTonTai);
            // Hiển thị thông báo nếu có
            if ($thongBao !== "") {
                echo '<div class="alert alert-danger">' . $thongBao . '</div>';
            }


            if (isset($_POST['thanhtoan'])) {
                if (empty($_SESSION['mycart'])) {
                    echo "<script type='text/javascript'>alert('Vui lòng chọn ít nhất một sản phẩm trước khi thanh toán');</script>";
                } else {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $address = $_POST['address'];
                    $pttt = $_POST['pttt'];
                    $tong = $_POST['tongtien'];
                    $id_tk = $_POST['id_tk'];
                    $code_cart = rand(1, 10000);
                    $id_vc = isset($_POST['id_vc']) ? $_POST['id_vc'] : null;

                    if ($pttt == "Thanh toán bằng tiền mặt") {

                        insert_hoadon($id_tk, $tong, $pttt, $username, $email, $sdt, $address);


                        $id_hoadon = lay_id_hoadon();


                        foreach ($_SESSION['mycart'] as $cart) {
                            $name = $cart[0];
                            $size_sp = $cart[5];
                            $soluong_sp = $cart[1];
                            $da_sp = $cart[6];
                            $duong_sp = $cart[7];
                            if ($size_sp == "M") {
                                $thanhtien = $cart[3] * $soluong_sp;
                            } elseif ($size_sp == "L") {
                                $thanhtien = ($cart[3] + $cart[3] * 15 / 100) * $soluong_sp;
                            } elseif ($size_sp == "XL") {
                                $thanhtien = ($cart[3] + $cart[3] * 25 / 100) * $soluong_sp;
                            }
                            $id_sp = $cart[8];
                            $ct_hd = insert_ct_hd($id_hoadon, $id_sp, $name, $size_sp, $soluong_sp, $da_sp, $duong_sp, $thanhtien);
                            if (isset($id_vc)) {
                                update_vc($id_vc);
                            }
                        }
                        unset($_SESSION['mycart']);
                        header("Location: index.php?act=camon");
                    } else if ($pttt == "Thanh toán bằng VN Pay") {
                        $vnp_TxnRef = $code_cart; //Mã giao dịch thanh toán tham chiếu của merchant
                        $vnp_Amount = $tong; // Số tiền thanh toán
                        $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
                        $vnp_BankCode = "NCB"; //Mã phương thức thanh toán
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount * 100,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => "Thanh toan GD: " . $vnp_TxnRef,
                            "vnp_OrderType" => "other",
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $expire
                        );
                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }

                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }
                        insert_hoadon($id_tk, $tong, $pttt, $username, $email, $sdt, $address);
                        $id_hoadon = lay_id_hoadon();
                        foreach ($_SESSION['mycart'] as $cart) {
                            $name = $cart[0];
                            $size_sp = $cart[5];
                            $soluong_sp = $cart[1];
                            $da_sp = $cart[6];
                            $duong_sp = $cart[7];
                            if ($size_sp == "M") {
                                $thanhtien = $cart[3] * $soluong_sp;
                            } elseif ($size_sp == "L") {
                                $thanhtien = ($cart[3] + $cart[3] * 15 / 100) * $soluong_sp;
                            } elseif ($size_sp == "XL") {
                                $thanhtien = ($cart[3] + $cart[3] * 25 / 100) * $soluong_sp;
                            }
                            $id_sp = $cart[8];

                            $ct_hd = insert_ct_hd($id_hoadon, $id_sp, $name, $size_sp, $soluong_sp, $da_sp, $duong_sp, $thanhtien);
                        }
                        unset($_SESSION['mycart']);
                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        header('Location: ' . $vnp_Url);
                        if (isset($id_vc)) {
                            update_vc($id_vc);
                        }
                    }
                }
            }
            include "view/hoadon.php";
            break;
            // ------------------------------------ Trang theo dõi đơn hàng  ------------------------------------
        case 'ctdh':
            if(!isset($id_tk)) {
                header("Location: index.php?act=dangnhap");
                exit(); // Dừng việc thực thi các lệnh tiếp theo sau khi chuyển hướng
            }
            cap_nhat_trang_thai_don_hang();
            $listhoadon = load_more_hoadon($id_tk);
            include "view/ct.donhang.php";
            break;
            // ------------------------------------ Trang chi tiết hóa đơn  ------------------------------------
        case 'chitiethoadon':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                $id_hd = $_GET['id_hd'];
                $xem_hd = CT_hoadon($id_hd);
            }
            include "view/ct.hoadon.php";
            break;
            // ------------------------------------ Trang cảm ơn  ------------------------------------
        case 'camon':
            include "view/camon.php";
            break;
            // ------------------------------------ Hoàn thành đơn hàng  ------------------------------------
        case 'nhandh':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                nhan_dh($_GET['id_hd']);
            }
            $listhoadon = load_more_hoadon($id_tk);
            include "view/ct.donhang.php";
            break;
            // ------------------------------------ Hùy đơn hàng ------------------------------------
        case 'huydh':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                huy_hoadon($_GET['id_hd']);
            }
            $listhoadon = load_more_hoadon($id_tk);
            include "view/ct.donhang.php";
            break;
            // ------------------------------------ Đặt lại đơn hàng ------------------------------------
        case 'datlai':
            if (isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)) {
                // Gọi hàm đã tạo ở trên để lấy thông tin chi tiết của đơn hàng
                $order_details = dat_lai_san_pham($_GET['id_hd']);
                foreach ($order_details as $product) {
                    // Thêm sản phẩm vào giỏ hàng
                    $_SESSION['mycart'][] = array(
                        $product['name_sp'],  // Tên sản phẩm
                        $product['so_luong'], // Số lượng
                        $product['gia_goc'],  // Giá gốc
                        $product['gia_km'],   // Giá bán
                        'images/' . $product['img'],      // Hình ảnh
                        $product['size'],     // Kích cỡ
                        $product['luong_da'], // Lượng đá
                        $product['luong_duong'], // Lượng đường
                        $product['id_sp'],
                    );
                }
                header("Location: index.php?act=cart");
            }
            $listhoadon = load_more_hoadon($id_tk);
            include "view/ct.donhang.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
ob_end_flush();
