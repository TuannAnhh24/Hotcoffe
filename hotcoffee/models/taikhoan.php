<?php
    function insert_taikhoan($email,$pass,$sdt){
        $sql= "INSERT INTO tai_khoan(email,pass,sdt) VALUES('$email','$pass','$sdt')";
        pdo_execute($sql);
    }

?>