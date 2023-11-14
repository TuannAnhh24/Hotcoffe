<?php
    function insert_taikhoan($email,$pass,$sdt){
        $sql= "INSERT INTO tai_khoan(email,pass,sdt) VALUES('$email','$pass','$sdt')";
        pdo_execute($sql);
    }

    function select_taikhoan_by_email($email){
        $sql= "SELECT * FROM tai_khoan WHERE email = ? ";
        return pdo_execute_and_fetch($sql,$email);
    }

    function checkuser($email,$pass){
        $sql= "SELECT * FROM tai_khoan WHERE email='".$email."' AND pass='".$pass."' ";
        $sp= pdo_query_one($sql);
        return $sp;
    }

    function checkemail($email){
        $sql= "SELECT * FROM tai_khoan WHERE email='".$email."' ";
        $sp= pdo_query_one($sql);
        return $sp;
    }

    function update_taikhoan($id_tk,$username,$pass,$email,$sdt,$address,$namsinh,$gioitinh){
        $sql = "UPDATE tai_khoan set user='$username',pass='$pass',email='$email',sdt='$sdt',dia_chi='$address',nam_sinh='$namsinh',gioi_tinh='$gioitinh' WHERE id_tk=".$id_tk;
        pdo_execute($sql);
    }

?>