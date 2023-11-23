<?php 
    function add_giohang($id_tk,$name_sp,$soluong,$size,$gia,$thanhtien){
       $sql="INSERT INTO `gio_hang` (` id_tk`, `san_pham`, `so_luong`, `size`, `gia`) VALUES ('$id_tk', '$name_sp', '$soluong', '$size', '$gia',`$thanhtien`)";
       pdo_execute($sql);
    }
?>