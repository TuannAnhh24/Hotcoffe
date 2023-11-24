<?php
    function insert_binhluan($id_sp, $id_tk, $noi_dung, $ngay_bl){
        $sql= "INSERT INTO `binh_luan`(`id_sp`, `id_tk`, `noi_dung`, `ngay_bl`) VALUES ('$id_sp', '$id_tk','$noi_dung', '$ngay_bl')";
        pdo_execute($sql);
    }

    function loadall_binhluan($id_sp){
        $sql = "SELECT * FROM binh_luan WHERE 1"; 
        if($id_sp>0){
            $sql.=" AND id_sp='".$id_sp."' ";
            $sql.=" order by id_bl desc";
        }
        $listbl = pdo_query($sql);
        return $listbl;
    }

    function delete_binhluan($id_bl){
        $sql = "DELETE FROM binh_luan WHERE id_bl=".$id_bl;
        pdo_execute($sql);
    }
    
?>