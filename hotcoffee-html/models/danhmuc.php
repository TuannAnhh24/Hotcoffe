<<<<<<< HEAD
<?php
    function insert_danhmuc($tenDanhmuc){
        // thêm cột thêm danh_muc(name,???) và VALUES('$tenDanhmuc'. '???' )
        $sql= "INSERT INTO danh_muc(name) VALUES('$tenDanhmuc') ";
        pdo_execute($sql);
    }

    function delete_danhmuc($id_dm){
        $sql = "UPDATE danh_muc SET trang_thai = '1' WHERE id_dm=".$id_dm;
        // $sql = "DELETE FROM danh_muc WHERE id_dm=".$id_dm;
        pdo_execute($sql);
    }

    function khoiphuc_danhmuc($id_dm){
        $sql = "UPDATE danh_muc SET trang_thai = '0' WHERE id_dm=".$id_dm;
        pdo_execute($sql);
    }

    function loadall_danhmuc(){
        $sql = "SELECT * FROM danh_muc order by name ";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function loadone_danhmuc($id_dm){
        $sql = "SELECT * FROM danh_muc WHERE id_dm=".$id_dm;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($id_dm,$tenDanhmuc){
        $sql= "UPDATE danh_muc set name='$tenDanhmuc' where id_dm=".$id_dm;
        pdo_execute($sql);
    }
=======
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
>>>>>>> 253526b689d7176de967ee26523ce743550e5a52
?>