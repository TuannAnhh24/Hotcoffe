<?php
    function insert_taikhoan($email,$pass,$sdt){
        $sql= "INSERT INTO tai_khoan(email,pass,sdt) VALUES('$email','$pass','$sdt')";
        pdo_execute($sql);
    }

    function select_taikhoan_by_email($email){
        $sql= "SELECT * FROM tai_khoan WHERE email = ? ";
        return pdo_execute_and_fetch($sql,$email);
    }

?>