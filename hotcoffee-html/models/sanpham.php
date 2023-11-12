<?php
    function insert_sanpham($tenSp,$giaGoc,$giaKm,$view,$moTa,$img,$idDm){
        $sql = "INSERT INTO san_pham(name_sp,gia_goc,gia_km,view,mo_ta,img,id_dm) values('$tenSp','$giaGoc','$giaKm','$view','$moTa','$img','$idDm')";
        pdo_execute($sql);
    }

    function delete_sanpham($id){
        $sql = " DELETE FROM san_pham WHERE id_sp =" .$id;
        pdo_execute($sql);
    }

    function loadall_sanpham_home(){
        $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY id_sp desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham_top10(){
        $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY view desc limit 0,10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham($kyw,$iddm){
        $sql = "SELECT * FROM san_pham WHERE 1";
        if($kyw!=""){
            $sql.=" AND name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" AND id_dm = '".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadone_sanpham($id){
        $sql = 'SELECT * FROM san_pham WHERE id_sp ='.$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function load_ten_dm($iddm){
        if($iddm>0){
            $sql = 'SELECT * FROM danh_muc WHERE id_sp ='.$iddm;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        } else{
            return "";
        }
    }

    function load_sanpham_cungloai($id,$iddm){
        $sql = "SELECT * FROM san_pham WHERE id_dm=".$iddm." AND id <>".$id;
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function update_sanpham($id,$iddm,$tenSp,$giaGoc,$giaKm,$mota,$hinhsp){
        if($hinhsp!=""){
            $sql = "UPDATE san_pham set id_dm='".$iddm."', name_sp='".$tenSp."',gia_goc='".$giaGoc."',gia_km='".$giaKm."',mo_ta='".$mota."',img='".$hinhsp."' WHERE id_sp=".$id;
        }else{
            $sql = "UPDATE san_pham set id_dm=".$iddm.", name=".$tenSp.", gia_goc= ".$giaGoc.",gia_km= ".$giaGoc.",mo_ta='$mota' WHERE id_sp=".$id;
        }
        pdo_execute($sql);
    }
?>