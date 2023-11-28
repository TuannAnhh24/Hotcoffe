<?php
     function loadall_donhang(){
        $sql = "SELECT * FROM hoa_don order by id_hd ";
        $listdonhang = pdo_query($sql);
        return $listdonhang ;
    }

    function loadone_CTsanpham(){
        $sql = 'SELECT * FROM `hoa_don` as hd INNER JOIN `san_pham` as sp ON hd.id_sp = sp.id_sp ';  
        $dm = pdo_query_one($sql);
        return $dm;
    }

?>