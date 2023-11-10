<?php
    function insert_sanpham($tensp,$giasp,$hinhsp,$mota,$iddm){
        $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinhsp','$mota','$iddm')";
        pdo_execute($sql);
    }

    function delete_sanpham($id){
        $sql = " DELETE FROM sanpham WHERE id =" .$id;
        pdo_execute($sql);
    }

    function loadall_sanpham_home(){
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham_top10(){
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY view desc limit 0,10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham($kyw,$iddm){
        $sql = "SELECT * FROM sanpham WHERE 1";
        if($kyw!=""){
            $sql.=" AND name like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" AND iddm = '".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadone_sanpham($id){
        $sql = 'SELECT * FROM sanpham WHERE id ='.$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function load_ten_dm($iddm){
        if($iddm>0){
            $sql = 'SELECT * FROM danhmuc WHERE id ='.$iddm;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        } else{
            return "";
        }
    }

    function load_sanpham_cungloai($id,$iddm){
        $sql = "SELECT * FROM sanpham WHERE iddm=".$iddm." AND id <>".$id;
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinhsp){
        if($hinhsp!=""){
            $sql = "UPDATE sanpham set iddm='".$iddm."', name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinhsp."' WHERE id=".$id;
        }else{
            $sql = "UPDATE sanpham set iddm='$iddm', name='$tensp',price='$giasp',mota='$mota' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
?>