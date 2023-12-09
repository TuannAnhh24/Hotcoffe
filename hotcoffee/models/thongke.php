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
        $sql = "SELECT dm.name, COUNT(*) as count
        FROM ct_hd ct
        JOIN san_pham sp ON ct.id_sp = sp.id_sp
        JOIN danh_muc dm ON sp.id_dm = dm.id_dm
        GROUP BY dm.name
        ORDER BY count DESC
        LIMIT 1";
        $result = pdo_query_one($sql);
        return $result['name'];
    }

    function kh_thanthiet() {
        $sql = "SELECT user, COUNT(*) as count FROM hoa_don GROUP BY user ORDER BY count DESC LIMIT 1";
        $result = pdo_query_one($sql);
        return $result['user'];
    }

    function tile_huydon() {
        $tongso_hoadon = tongso_hoadon();
        $sql = "SELECT COUNT(*) as cancelled FROM hoa_don WHERE trang_thai = '4'";
        $result = pdo_query_one($sql);
        $cancelled_orders = $result['cancelled'];
        return ($cancelled_orders / $tongso_hoadon) * 100;
    }

    function thongke_sp_banchay(){
        $sql = "SELECT dm.name, COUNT(*) as count
        FROM ct_hd ct
        JOIN san_pham sp ON ct.id_sp = sp.id_sp
        JOIN danh_muc dm ON sp.id_dm = dm.id_dm
        GROUP BY dm.name
        ORDER BY count DESC";
        $result = pdo_query($sql);
        return $result;
    }

    function thongke_donhang(){
        $sql = "SELECT MONTH(ngay_dat) as Thang, COUNT(*) as SoDonHang
        FROM hoa_don
        GROUP BY MONTH(ngay_dat)
        ORDER BY Thang ASC;";
        $result = pdo_query($sql);
        return $result;
    }

    function thongke_doanhthu(){
        $sql = "SELECT MONTH(ngay_dat) as Thang, SUM(tong_tien) as DoanhThu
        FROM hoa_don
        GROUP BY MONTH(ngay_dat)
        ORDER BY Thang ASC;";
        $result = pdo_query($sql);
        return $result;
    }

?>