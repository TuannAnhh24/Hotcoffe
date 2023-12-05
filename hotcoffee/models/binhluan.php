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

    function da_mua_hang($id_tk, $id_sp){
        $sql = "SELECT COUNT(*) as count FROM ct_hd chd JOIN hoa_don hd ON chd.id_hd = hd.id_hd WHERE hd.id_tk='$id_tk' AND chd.id_sp='$id_sp' AND hd.trang_thai='3'";
        $result = pdo_query_one($sql);
        if ($result['count'] > 0) {
            // Người dùng đã mua sản phẩm
            return true;
        } else {
            // Người dùng chưa mua sản phẩm
            return false;
        }
    }
    
?>