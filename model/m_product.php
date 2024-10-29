<?php
include_once 'm_pdo.php';
function get_product_by_category($category){
    return pdo_query("SELECT * FROM sanpham WHERE MaDM = ?",$category);
}
function get_product_by_purchases(){
    return pdo_query("SELECT * FROM sanpham ORDER BY LuotMua DESC LIMIT 10");
}
function get_product_all(){
    return pdo_query("SELECT * FROM sanpham");
}
function page_product($page){
    $start = ($page-1)* 8;
    return pdo_query("SELECT * FROM sanpham LIMIT $start,8");
}
function page_product_all_by_purchases($page){
    $start = ($page-1)* 8;
    return pdo_query("SELECT * FROM sanpham ORDER BY LuotMua DESC LIMIT $start,8");
}
function get_product_filter_min_max($min, $max){
    return pdo_query("SELECT * FROM sanpham WHERE gia BETWEEN ? AND ?",$min, $max);
}
function get_product_filter_min($min){
    return pdo_query("SELECT * FROM sanpham WHERE gia >= $min");
}
function get_product_filter_max($max){
    return pdo_query("SELECT * FROM sanpham WHERE gia <= ?", $max);
}
function page_product_filter_min_max($min, $max, $page){
    $start = ($page-1)* 8;
    return pdo_query("SELECT * FROM sanpham WHERE gia BETWEEN ? AND ? LIMIT $start,8",$min, $max);
}
function page_product_filter_min($min, $page){
    $start = ($page-1)* 8;
    return pdo_query("SELECT * FROM sanpham WHERE gia >= $min LIMIT $start,8");
}
function page_product_filter_max($max, $page){
    $start = ($page-1)* 8;
    return pdo_query("SELECT * FROM sanpham WHERE gia <= ? LIMIT $start,8", $max);
}
function get_product_by_id($id){
    return pdo_query_one("SELECT * FROM sanpham WHERE MaSP = ?", $id);
}
function Get_product_images($id){
    return pdo_query("SELECT * FROM anhbosung WHERE MaSP = ?", $id);
}
function product_search($keyword,$page=1){
    $start = ($page-1)*8;
    $sql = "SELECT * FROM SanPham WHERE TenSP LIKE '%$keyword%' LIMIT $start,8";
    return pdo_query($sql);        
}
function productS($keyword){
    $sql = "SELECT COUNT(*) FROM SanPham WHERE TenSP LIKE '%$keyword%'";
    return pdo_query_value($sql);  
}
?>