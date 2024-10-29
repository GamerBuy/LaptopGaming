<?php
include_once("m_pdo.php");
function check_exits_cart($MaTK){
    return pdo_query_one("SELECT * FROM hoadon WHERE MaTK = ? AND TrangThai = ?",$MaTK, 'gio-hang');
}
function check_product_exits_in_cart($MaSP,$maHD){
    return pdo_query_one("SELECT * FROM chitiethoadon WHERE MaSP = ? AND MaHD = ?",$MaSP,$maHD);
}
function add_cart($MaTK){
    pdo_execute("INSERT INTO hoadon (`MaTK`,`NgayLapHoaDon`) VALUES (?,?)",$MaTK,date('Y-m-d H:i:s'));
}
function add_product_to_cart($MaHD, $MaSP){
    pdo_execute("INSERT INTO chitiethoadon (`MaHD`,`MaSP`) VALUES (?,?)",$MaHD, $MaSP);
}
function update_product_in_cart($MaSP, $SoLuong){
    pdo_execute("UPDATE chitiethoadon SET SoSanPham = SoSanPham + ? WHERE MaSP = ?;",$SoLuong, $MaSP);
}
function update_product_in_cart_with_equal($MaSP, $SoLuong){
    pdo_execute("UPDATE chitiethoadon SET SoSanPham =  ? WHERE MaSP = ?;",$SoLuong, $MaSP);
}
function get_all_cart($MaTK){
    return pdo_query("SELECT cthd.MaHD,cthd.SoSanPham, sp.MaSP, sp.TenSP, sp.HinhAnh, sp.gia FROM hoadon hd INNER JOIN chitiethoadon cthd on hd.MaHD = cthd.MaHD INNER JOIN sanpham sp ON cthd.MaSP = sp.MaSP WHERE hd.MaTK = ? AND hd.TrangThai = ?",$MaTK, 'gio-hang');
}
function update_quantity_product_in_cart($id, $SoLuong){
    pdo_execute("UPDATE chitiethoadon
    SET SoSanPham = ?
    WHERE MaSP = ?",$SoLuong, $id);
}
function delete_product_in_cart($id){
    pdo_execute("DELETE FROM chitiethoadon WHERE MaSP = ?;",$id);
}
function get_all_product_in_cart($MaTK){
    return pdo_query("SELECT * FROM chitiethoadon cthd INNER JOIN hoadon hd ON cthd.MaHD = hd.MaHD WHERE hd.MaTK = ?",$MaTK);
}
function get_all_product_in_cart_by_MaHD($MaHD){
    return pdo_query("SELECT * FROM chitiethoadon cthd INNER JOIN hoadon hd ON cthd.MaHD = hd.MaHD WHERE cthd.MaHD = ?",$MaHD);
}
function update_quantity_by_cart($id,$quantity){
    pdo_execute("UPDATE chitiethoadon SET SoSanPham = ? WHERE MaSP = ?;",$quantity, $id);
}
function update_bill($total_price, $total_product,$MaHD){
    pdo_execute("UPDATE hoadon
    SET TongSanPham = ?, TongTien = ?
    WHERE MaHD = ?",$total_product, $total_price, $MaHD);
}
function get_bill($MaTK){
    return pdo_query_one("SELECT * FROM hoadon WHERE MaTK = ? AND TrangThai = ?",$MaTK, "gio-hang");
}
function success_cart($MaHD){
    pdo_execute("UPDATE hoadon SET TrangThai = 'hoan-thanh' WHERE MaHD = ? AND TrangThai = 'gio-hang'",$MaHD);
}