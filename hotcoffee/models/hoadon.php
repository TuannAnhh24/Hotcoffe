<?php
    function insert_hoadon($tong,$pttt,$username,$email,$sdt,$address){
        $sql= "INSERT INTO `hoa_don`(`tong_tien`, `phuong_thuc_tt`, `user`, `email`, `sdt`, `dia_chi`) 
            VALUES ('$tong','$pttt','$username','$email','$sdt','$address')";
        pdo_execute($sql);
        // Lấy ID của hóa đơn vừa được tạo
        $conn = pdo_get_connection();
        return $conn->lastInsertId();
    }

    function lay_id_hoadon(){
        $sql = "SELECT id_hd FROM hoa_don ORDER BY id_hd DESC LIMIT 1";
        $result = pdo_query($sql);
        $id_hoadon = $result[0]['id_hd']; // Trả về giá trị 'id_hd' đầu tiên
        return $id_hoadon;
    }

    function insert_ct_hd($id_hoadon,$name,$size_sp,$soluong_sp,$da_sp,$duong_sp){
        $sql= "INSERT INTO `ct_hd`( `id_hd`, `name_sp`, `size`, `so_luong`, `luong_da`, `luong_duong`) 
        VALUES ('$id_hoadon','$name','$size_sp','$soluong_sp','$da_sp','$duong_sp')";
        pdo_execute($sql);
    }

?>