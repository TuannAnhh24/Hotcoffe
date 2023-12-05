<?php 
    ob_start();
    session_start();
    include "view/header.php";
    include "models/taikhoan.php";
    include "models/pdo.php";
    include "models/sanpham.php";
    include "models/danhmuc.php";
    include "models/hoadon.php";
    include "global.php";
    $listdanhmuc= loadall_danhmuc();
    $spBanchay = loadall_sanpham_banchay();

    if(!isset($_SESSION['mycart']))  $_SESSION['mycart'] = [];

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
                // ---------------------------------------- MENU ----------------------------------------
         case 'menu':
                    //phân page
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 6;
                    $total_records = get_total_products();
                    $total_records = intval($total_records);
                    $total_page = ceil($total_records / $limit);
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
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
                    include "view/menu.php";
                    break;
            // ---------------------------------------- Sản phẩm chi tiết ----------------------------------------
            case 'spct': 
                
                if(isset($_GET['id_sp'])&&$_GET['id_sp']>0){
                    $id_sp =$_GET['id_sp']; 
                    $onesp = loadone_sanpham($id_sp);
                    extract($onesp);
                    $onedm =  loaddm_Ctsanpham(number_format($id_sp));
                    // lấy danh mục
                    $lay_dm = lay_dm($id_dm);
                    $dm = $lay_dm[0]; // Lấy danh mục đầu tiên từ kết quả
                    extract($dm);
                    
                    $sp_cung_loai = loadone_sanpham_cungloai($id_sp,$id_dm);

                    //phân page
                    $current_page = isset($_GET['pageNho']) ? $_GET['pageNho'] : 1;
                    $limit =4;
                    $total_records = get_total_productsCL($id_dm);
                    $total_records = intval($total_records);
                    $total_page = ceil($total_records / $limit);
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    $start = ($current_page - 1) * $limit;
                    $listsanphamCL = load_spCL($start, $limit,$id_dm);
                        include "view/sanphamCt.php";   
                }else{
                    include "view/home.php";
                }
                break;
                
           
            //---------------------------------------- Đăng nhập tài khoản ----------------------------------------
            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $checkuser = checkuser($email,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['email'] = $checkuser;
                        header('location: index.php');
                    }else {
                        echo "<script type='text/javascript'>alert('Tài khoản không tồn tại. Vui lòng thực hiện đăng ký tài khoản');</script>";
                    }
                }
                include "view/taikhoan/dangnhap.php";
                break;
            // ---------------------------------------- Đăng ký tài khoản ----------------------------------------
            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $sdt = $_POST['sdt'];
                    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
                    $user = select_taikhoan_by_email($email);
                    if ($user){
                        // Nếu người dùng tồn tại, hiển thị thông báo lỗi
                        echo "<script type='text/javascript'>alert('Email đã được sử dụng. Vui lòng chọn Email khác');</script>";
                    } else {
                        insert_taikhoan($email,$pass,$sdt);
                        echo "<script type='text/javascript'>alert('Đã đăng ký thành công');</script>";
                    }
                }
                include "view/taikhoan/dangky.php";
                break;
            // -------------------------------------------------- Cập nhật tài khoản --------------------------------------------------
            case 'edit_taikhoan':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
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
                    $target_file = $target_dir.basename($_FILES["hinhanh"]["name"]);
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file))
                    // end update hình ảnh
                    update_taikhoan($id_tk,$username,$pass,$email,$sdt,$address,$namsinh,$gioitinh,$img);
                    $_SESSION['email'] = checkuser($email,$pass);
                    header('Location: index.php');
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;
            // ---------------------------------------- Quên mật khẩu ----------------------------------------    
            case 'quenmk':
                if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                    $email = $_POST['email'];
                    $checkemail = checkemail($email);
                    extract($checkemail);
                    if(is_array(checkemail($email))){
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
                            $mail->Subject = 'Hello '.$_POST['email'].' ';
                            $mail->Body    = 'Nhận thấy bạn đang không nhớ được <b>Mật Khẩu!</b> đăng nhập của mình Chúng tôi quyết định cấp lại cho bạn mật khẩu đăng nhập qua email!!! Mật khẩu của bạn là: '.$pass.' ';
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
            // ---------------------------------------- Đăng xuất tài khoản ----------------------------------------
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
                }else{
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
                        if ($cartItem[0] === $name_sp && $cartItem[5] === $size ) {
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
                if ( isset($_POST['dathang'])) {
                    // Lấy giá trị mới từ biểu mẫu
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
                }

                if(isset($_POST['thanhtoan'])){
                    $username=$_POST['username'];
                    $email = $_POST['email'];
                    $sdt = $_POST['sdt'];
                    $address = $_POST['address'];
                    $pttt = $_POST['pttt'];
                    $tong = $_POST['tongtien'];
                    $id_tk = $_POST['id_tk'];
                    // Nếu không có tài khoản
                    // if(!isset($_SESSION['email'])){
                    //     $user= [$username,$sdt,$address,$email];
                    //     $_SESSION['user'][] = $user;
                    // }
                    insert_hoadon($id_tk,$tong,$pttt,$username,$email,$sdt,$address);
                    $id_hoadon = lay_id_hoadon();
                    
                    foreach ($_SESSION['mycart'] as $cart) {
                        $name = $cart[0]; 
                        $size_sp = $cart[5]; 
                        $soluong_sp= $cart[1]; 
                        $da_sp = $cart[6]; 
                        $duong_sp = $cart[7];
                        if($size_sp=="M"){
                            $thanhtien=$cart[3]*$soluong_sp;
                        }elseif($size_sp=="L"){
                            $thanhtien=($cart[3]+$cart[3]*15/100)*$soluong_sp;
                        }elseif($size_sp=="XL"){
                            $thanhtien=($cart[3]+$cart[3]*25/100)*$soluong_sp;
                        } 
                        $id_sp = $cart[8];
                        
                        $ct_hd=insert_ct_hd($id_hoadon,$id_sp,$name,$size_sp,$soluong_sp,$da_sp,$duong_sp,$thanhtien);
                        header("Location: index.php?act=camon");
                    }
                }
                
                include "view/hoadon.php";
                break;
            // ------------------------------------ Trang theo dõi đơn hàng  ------------------------------------
            case 'ctdh':
                cap_nhat_trang_thai_don_hang();
                $listhoadon = load_more_hoadon($id_tk);
                include "view/ct.donhang.php";
                break;
            // ------------------------------------ Trang chi tiết hóa đơn  ------------------------------------
            case 'chitiethoadon':
                if(isset($_GET['id_hd']) && ($_GET['id_hd']>0)){
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
                if(isset($_GET['id_hd']) && ($_GET['id_hd']>0)){
                    nhan_dh($_GET['id_hd']);
                }
                $listhoadon = load_more_hoadon($id_tk);
                include "view/ct.donhang.php";
                break;
            // ------------------------------------ Hùy đơn hàng ------------------------------------
            case 'huydh':
                if(isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)){
                    huy_hoadon($_GET['id_hd']);
                }
                $listhoadon = load_more_hoadon($id_tk);
                include "view/ct.donhang.php";
                break;
            // ------------------------------------ Đặt lại đơn hàng ------------------------------------
            case 'datlai':
                if(isset($_GET['id_hd']) && ($_GET['id_hd'] > 0)){
                    datlai_hd($_GET['id_hd']);
                }
                $listhoadon = load_more_hoadon($id_tk);
                include "view/ct.donhang.php";
                break;

            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
    include "view/footer.php";
    ob_end_flush();
?>

