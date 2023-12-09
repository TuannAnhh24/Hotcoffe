<?php 
    function load_vc(){
        $sql = "SELECT * FROM voucher ";
        return pdo_query($sql);
    }
?>