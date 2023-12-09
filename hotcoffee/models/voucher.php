<?php 
    function load_vc(){
        $sql = "SELECT * FROM voucher ";
        return pdo_query($sql);
    }
    function kiemtra_vc(){
        $sql = "SELECT * FROM voucher WHERE tinh_trang";
        return pdo_query($sql);
    }
    function update_vc($id_vc){
        $sql = "UPDATE `voucher` SET `tinh_trang` = 'Đã sử dụng' WHERE `voucher`.`id_vc` = $id_vc";
        return pdo_execute($sql);
    }
?>