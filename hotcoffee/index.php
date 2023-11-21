<?php 
    ob_start();
    session_start();
    include "view/header.php";
    include "models/taikhoan.php";
    include "models/pdo.php";
    include "models/sanpham.php";
    include "models/danhmuc.php";
    include "global.php";
    $listdanhmuc= loadall_danhmuc();
    $spBanchay = loadall_sanpham_banchay();
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
                    $onedm =  loaddm_Ctsanpham(number_format($id_sp));
                    extract($onesp);
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
                    update_taikhoan($id_tk,$username,$pass,$email,$sdt,$address,$namsinh,$gioitinh);
                    $_SESSION['email'] = checkuser($email,$pass);
                    echo "<script type='text/javascript'>alert('Cập nhật thông tin thành công');</script>";
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
            // ------------------------------------ Trang cảm ơn  ------------------------------------
            case 'camon':
                include "view/camon.php";
                break;
            // ------------------------------------ Trang chi tiết đơn hàng  ------------------------------------
            case 'ctdh':
                include "view/ct.donhang.php";
                break;
            // ------------------------------------ Trang thanh toán  ------------------------------------
            case 'thanhtoan':
                include "view/thanhtoan.php";
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

