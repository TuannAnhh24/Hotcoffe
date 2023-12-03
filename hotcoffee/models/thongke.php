<?php
    function tongso_hoadon() {
        $sql = "SELECT COUNT(*) as total FROM hoa_don";
        $result = pdo_query_one($sql);
        return $result['total'];
    }

    function doanh_thu() {
        $sql = "SELECT SUM(tong_tien) as doanhthu FROM hoa_don";
        $result = pdo_query_one($sql);
        return $result['doanhthu'];
    }

    function sp_banchay_nhat() {
        $sql = "SELECT name_sp, COUNT(*) as count FROM ct_hd GROUP BY name_sp ORDER BY count DESC LIMIT 1";
        $result = pdo_query_one($sql);
        return $result['name_sp'];
    }

    function kh_thanthiet() {
        $sql = "SELECT tai_khoan, COUNT(*) as count FROM hoa_don GROUP BY tai_khoan ORDER BY count DESC LIMIT 1";
        $result = pdo_query_one($sql);
        return $result['khach_hang'];
    }

    function tile_huydon() {
        $tongso_hoadon = tongso_hoadon();
        $sql = "SELECT COUNT(*) as cancelled FROM hoa_don WHERE trang_thai = '4'";
        $result = pdo_query_one($sql);
        $cancelled_orders = $result['cancelled'];
        return ($cancelled_orders / $tongso_hoadon) * 100;
    }
?>