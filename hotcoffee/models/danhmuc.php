<?php 

    function insert_danhmuc($tenloai){
        $sql ="INSERT INTO danh_muc(name) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql ="DELETE FROM danh_muc where id_dm=" .$id;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql = "SELECT * FROM danh_muc order by id_dm desc";
        $listdanhmuc= pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql="SELECT * FROM danh_muc where id_dm=" .$id;
        $dm =pdo_query_one($sql);
        return $dm;
    }
    function update_dm($id,$tenloai){
        $sql ="UPDATE `danh_muc` SET  `name` = '$tenloai' WHERE `danhmuc`.`id_dm` = $id";
        pdo_execute($sql);
    }
    function load_tendm($iddm){
        if($iddm > 0){
            $sql="SELECT * FROM danh_muc where id_dm=" .$iddm;
            $dm =pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        } 
    }
?>