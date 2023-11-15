<?php 
    ob_start();
    session_start();
    include "view/header.php";
    include "models/taikhoan.php";
    include "models/pdo.php";

    ini_set("SMTP", "smtp.example.com" ); // Địa chỉ máy chủ SMTP
    ini_set("smtp_port", "25" ); // Cổng SMTP
    ini_set("sendmail_from", "minhnhat24422@gmail.com"); // Email của bạn
    
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

            case 'menu':
                include "view/menu.php";
                break;
                //tess
           
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
                // if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                //     $email = $_POST['email'];
                //     $checkemail = checkemail($email);
                //     if(is_array(checkemail($email))){
                //         $thongbao = "Mật khẩu của bạn là:".$checkemail['pass'];
                //     }else{
                //         $thongbao = "Email này không tồn tại";
                //     }
                // }
                // include "view/taikhoan/quenmk.php";
                // break;
                if(isset($_POST['guiemail']) && ($_POST['guiemail'])){
                    $email = $_POST['email'];
                    $checkemail = checkemail($email);
                    if(is_array(checkemail($email))){
                        $password = $checkemail['pass']; // Lấy mật khẩu từ cơ sở dữ liệu
                        $subject = "Mật khẩu của bạn";
                        $message = "Đây là mật khẩu của bạn: $password. Vui lòng đăng nhập và thay đổi mật khẩu.";
                        $headers = "From: minhnhat24422@gmail.com";
                        if (mail($email, $subject, $message, $headers)) {
                            $thongbao = "Email đã được gửi thành công đến $email";
                        } else {
                            $thongbao = "Có lỗi xảy ra khi gửi email.";
                        }
                        } else {
                            $thongbao = "Email này không tồn tại";
                        }
                    } 
                include "view/taikhoan/quenmk.php";
                break;
            // ---------------------------------------- Đăng xuất tài khoản ----------------------------------------
            case 'thoat':
                session_unset();
                header('Location: index.php');
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

