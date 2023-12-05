<?php

    function insert_sanpham($tenSp,$giaGoc,$giaKm,$moTa,$img,$idDm){
        $sql = "INSERT INTO `san_pham`(`name_sp`,`gia_goc`,`gia_km`,`mo_ta`,`img`,`id_dm`) values('$tenSp','$giaGoc','$giaKm','$moTa','$img','$idDm')";
        pdo_execute($sql);
    }
    function insert_sanphamCT($giaM,$idSp,$giaL,$giaXL){
        $sql = "INSERT INTO `ct_san_pham` (`id_ct_sp`, `gia`, `size`, `id_sp`) VALUES (NULL, '$giaM', 'M', '$idSp'), (NULL, '$giaL', 'L', '$idSp'), (NULL, '$giaXL', 'XL', '$idSp')";
        pdo_execute($sql);
    }

    function delete_sanpham($id){
        $sql = " DELETE FROM san_pham WHERE id_sp =" .$id;
        pdo_execute($sql);
    }
    function delete_Ctsanpham($id){
        $sql = " DELETE FROM ct_san_pham WHERE id_sp IN ($id) " ;
        pdo_execute($sql);
    }

    function loadall_sanpham_home(){
        $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY id_sp desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham_banchay(){
        $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY view desc limit 0,5";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham($kyw,$iddm){
        $sql = "SELECT * FROM `san_pham` WHERE 1";
        if($kyw!=""){
            $sql.=" AND name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" AND `id_dm` = '".$iddm."'";
        }
        $sql.=" order by id_sp desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_CTsanpham($id){
        $sql = 'SELECT * FROM `ct_san_pham` as A INNER JOIN `san_pham` as B ON A.id_sp = B.id_sp WHERE B.id_sp ='.$id;  
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function loadone_sanpham($id){
        $sql = 'SELECT * FROM `san_pham` WHERE `id_sp` ='.$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function load_ten_dm($idsp){
        if($idsp>0){
            $sql = 'SELECT * FROM danh_muc WHERE id_sp ='.$idsp;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        } else{
            return "";
        }
    }

    function loadone_sanpham_cungloai($id_sp,$id_dm){
        $sql = "SELECT * FROM san_pham WHERE id_dm=".$id_dm." AND id_sp <>".$id_sp;
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function update_sanpham($idSp,$idDm,$tenSp,$giaGoc,$giaKm,$mota,$img){
        if($img!=""){
            $sql = "UPDATE `san_pham` SET `name_sp` = '$tenSp', `gia_goc` = '$giaGoc', `gia_km` = '$giaKm', `mo_ta` = '$mota', `img` = '$img', `id_dm` = '$idDm' WHERE `san_pham`.`id_sp` = $idSp";
        }else{
            $sql = "UPDATE `san_pham` SET `name_sp` = '$tenSp', `gia_goc` = '$giaGoc', `gia_km` = '$giaKm', `mo_ta` = '$mota', `id_dm` = '$idDm' WHERE `san_pham`.`id_sp` = $idSp";
       
        }
        pdo_execute($sql);
    }

    function loaddm_Ctsanpham($id_sp){
        $sql = "SELECT * FROM san_pham  INNER JOIN danh_muc  ON san_pham.id_dm = danh_muc.id_dm WHERE san_pham.id_sp = '.$id_sp.' ";  
        $loaddm = pdo_execute($sql);
        return $loaddm;
    }

    function lay_dm($id_dm){
        $sql = "SELECT * FROM danh_muc WHERE id_dm = $id_dm";
        $lay_dm = pdo_query($sql);
        return $lay_dm;
    }
    //phân trang
    function load_sp($start, $limit,$id_dm=0,$kyw=""){
        $sql = "SELECT * FROM `san_pham` WHERE 1";
        if($kyw!=""){
            $sql.=" AND `name_sp` like '%$kyw%' ";
        }
        if($id_dm >0){
         $sql.=" AND `id_dm` = $id_dm";   
        } 
        $sql.=" order by id_sp desc";
        $sql.=" LIMIT $start, $limit";
       
        $listsp = pdo_query($sql);
        return $listsp;
    }
  
    function get_total_products(){
        $sql = "SELECT COUNT(*) as total FROM san_pham ";
        return pdo_query_value($sql);
    }

    function load_spCL($start, $limit,$id_dm=0){
        $sql = "SELECT * FROM `san_pham` WHERE `id_dm` = $id_dm";
        $sql.=" LIMIT $start, $limit";
        $listsp = pdo_query($sql);
        return $listsp;
    }
    function get_total_productsCL($id_dm){
        $sql = "SELECT COUNT(*) as total FROM san_pham WHERE id_dm = $id_dm";
        return pdo_query_value($sql);
    }
?>