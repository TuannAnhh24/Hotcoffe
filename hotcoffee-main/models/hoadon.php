<?php
function insert_hoadon($id_tk, $tong, $pttt, $username, $email, $sdt, $address)
{
    $sql = "INSERT INTO `hoa_don` (`id_tk`,`tong_tien`, `phuong_thuc_tt`, `user`, `email`, `sdt`, `dia_chi`, `ngay_dat`) 
            VALUES ('$id_tk','$tong','$pttt','$username','$email','$sdt','$address',CURDATE())";
    pdo_execute($sql);
    // Lấy ID của hóa đơn vừa được tạo
    $conn = pdo_get_connection();
    return $conn->lastInsertId();
}

function lay_id_hoadon()
{
    $sql = "SELECT id_hd FROM hoa_don ORDER BY id_hd DESC LIMIT 1";
    $result = pdo_query($sql);
    $id_hoadon = $result[0]['id_hd']; // Trả về giá trị 'id_hd' đầu tiên
    return $id_hoadon;
}

function insert_ct_hd($id_hoadon, $id_sp, $name, $size_sp, $soluong_sp, $da_sp, $duong_sp, $thanhtien)
{
    $sql = "INSERT INTO `ct_hd`( `id_hd`,`id_sp`, `name_sp`, `size`, `so_luong`, `luong_da`, `luong_duong`,`tien`) 
        VALUES ('$id_hoadon','$id_sp','$name','$size_sp','$soluong_sp','$da_sp','$duong_sp','$thanhtien')";
    pdo_execute($sql);
}

function loadall_hoadon()
{
    $sql = "SELECT * FROM hoa_don order by id_hd desc ";
    $listhoadon = pdo_query($sql);
    return $listhoadon;
}

function load_more_hoadon($id_tk)
{
    $sql = "SELECT * FROM hoa_don WHERE id_tk = ? order by id_hd desc ";
    $listhoadon = pdo_query($sql, $id_tk);
    return $listhoadon;
}

function CT_hoadon($id_hd)
{
    $sql = "SELECT * FROM ct_hd WHERE id_hd=" . $id_hd;
    $xem_hd = pdo_query($sql);
    return $xem_hd;
}

function loadone_CTsanpham()
{
    $sql = 'SELECT * FROM `ct_hd` as hd INNER JOIN `san_pham` as sp ON hd.id_sp = sp.id_sp ';
    $dm = pdo_query_one($sql);
    return $dm;
}

function xacnhan_dh($id_hd)
{
    $sql = "UPDATE `hoa_don` SET `trang_thai` = '1' WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}

function giao_dh($id_hd)
{
    $sql = "UPDATE `hoa_don` SET `trang_thai` = '2' WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}

function nhan_dh($id_hd)
{
    $sql = "UPDATE `hoa_don` SET `trang_thai` = '3' WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}

function delete_donhang($id_hd)
{
    $sql = "DELETE FROM `hoa_don` WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}

function delete_ct_hoadon($id_hd)
{
    $sql = "DELETE FROM `ct_hd` WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}
function delete_ct_hoadon_fromsp($id_sp)
{
    $sql = "DELETE FROM `ct_hd` WHERE id_sp=" . $id_sp;
    pdo_execute($sql);
}

function huy_hoadon($id_hd)
{
    $sql = "UPDATE `hoa_don` SET `trang_thai` = '4' WHERE id_hd=" . $id_hd;
    pdo_execute($sql);
}

function cap_nhat_trang_thai_don_hang()
{
    $sql = "UPDATE hoa_don SET trang_thai='3' WHERE trang_thai='2' AND DATEDIFF(NOW(), ngay_dat) > 1";
    pdo_execute($sql);
}
function get_total_hd()
{
    $sql = "SELECT COUNT(*) as total FROM hoa_don ";
    return pdo_query_value($sql);
}

function load_hd($start, $limit, $trangThai = "", $ngayBatDau = "", $ngayKetThuc = "")
{
    $sql = "SELECT * FROM `hoa_don` WHERE 1 = 1"; // Bắt đầu với điều kiện luôn đúng

    if ($trangThai !== "") {
        $sql .= " AND trang_thai = '$trangThai'";
    }

    if ($ngayBatDau !== "" && $ngayKetThuc !== "") {
        $sql .= " AND ngay_dat BETWEEN '$ngayBatDau' AND '$ngayKetThuc'";
    }

    $sql .= " ORDER BY id_hd DESC LIMIT $start, $limit";
    $listsp = pdo_query($sql);
    return $listsp;
}

function insert_vnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_OrderInfo, $vnp_PayDate, $vnp_TmnCode, $vnp_CardType, $vnp_TransactionNo, $code_cart)
{
    $sql = "INSERT INTO vnpay(vnp_amount, vnp_bankcode, vnp_banktranno, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_cardtype, vnp_transactionno, code_cart) 
        VALUES ('$vnp_Amount', '$vnp_BankCode', '$vnp_BankTranNo', '$vnp_OrderInfo', '$vnp_PayDate', '$vnp_TmnCode', '$vnp_CardType', '$vnp_TransactionNo', '$code_cart')";
    pdo_execute($sql);
}

function dat_lai_san_pham($id_hd)
{
    $sql = "SELECT ct_hd.*, sp.* 
                FROM `ct_hd` as ct_hd
                JOIN `san_pham` as sp ON ct_hd.id_sp = sp.id_sp
                WHERE ct_hd.id_hd=" . $id_hd;
    return pdo_query($sql);
}
