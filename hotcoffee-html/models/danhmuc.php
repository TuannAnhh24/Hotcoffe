<?php 

    function insert_danhmuc($tenloai){
        $sql ="INSERT INTO danhmuc(name) VALUES ('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql ="DELETE FROM danhmuc where id=" .$id;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql = "SELECT * FROM danhmuc order by id desc";
        $listdanhmuc= pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql="SELECT * FROM danhmuc where id=" .$id;
        $dm =pdo_query_one($sql);
        return $dm;
    }
    function update_dm($id,$tenloai){
        $sql ="UPDATE `danhmuc` SET  `name` = '$tenloai' WHERE `danhmuc`.`id` = $id";
        pdo_execute($sql);
    }
    function load_tendm($iddm){
        if($iddm > 0){
            $sql="SELECT * FROM danhmuc where id=" .$iddm;
            $dm =pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        } 
    }
?>