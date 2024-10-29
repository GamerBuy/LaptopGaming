<?php
    include_once 'm_pdo.php';
    //start category
    function category_list(){
        $sql =" SELECT * FROM danhmuc";
        return pdo_query($sql);
    }
    function category_add($name,$status){
        $sql ="INSERT INTO danhmuc(TenDM,trangthai) VALUES (?,?)";
        return pdo_execute($sql,$name,$status);
    }
    function category_edit_one($id){
        $sql ="SELECT * FROM danhmuc WHERE MaDM=?";
        return pdo_query_one($sql,$id);
    }
    function category_edit($name,$status,$id){
        $sql="UPDATE danhmuc SET TenDM=?, trangthai=? WHERE MaDM=?";
        return pdo_execute($sql,$name,$status,$id);
    }
    //end category
    function count_product(){
        $sql = "SELECT COUNT(*) FROM sanpham";
        return pdo_query_value($sql);
    }
    function count_category(){
        $sql = "SELECT COUNT(*) FROM danhmuc";
        return pdo_query_value($sql);
    }
    function count_account(){
        $sql = "SELECT COUNT(*) FROM taikhoan";
        return pdo_query_value($sql);
    }
    function count_bill(){
        $sql = "SELECT COUNT(*) FROM hoadon WHERE TrangThai='hoan-thanh'";
        return pdo_query_value($sql);
    }
    function statistical() {
       $sql = " SELECT dm.MaDM, dm.TenDM, COUNT(sp.MaSP) AS SoLuong
        FROM danhmuc dm LEFT JOIN sanpham sp ON dm.MaDM = sp.MaDM GROUP BY dm.MaDM";
        return pdo_query($sql);
    }
    function category_cmT(){
        $sql =" SELECT * FROM binhluan";
        return pdo_query($sql);
    }
    function category_delete($id){
        $sql ="DELETE FROM binhluan WHERE MaBL=?";
        return pdo_execute($sql,$id);
    }
/* start minh */
    function add_images($anh,$masp){
        pdo_execute("INSERT INTO anhbosung (`anh`, `MaSP`) VALUES (?,?)",$anh, $masp);
    }
    function get_product_id_last(){
        return pdo_query_one("SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT 1");
    }
    function show_full_product_with_category(){
        return pdo_query ("SELECT * FROM sanpham sp INNER JOIN danhmuc dm ON sp.MaDM = dm.MaDM");
    }
    function product_add($name, $gia, $soluong, $danhmuc, $motangan, $motadai, $hinhanh){
        pdo_execute("INSERT INTO sanpham (`TenSP`, `gia`, `SoLuong`, `MaDM`, `MoTaNgan`, `MoTaChiTiet`,`HinhAnh`) VALUES (?,?,?,?,?,?,?)",$name, $gia, $soluong, $danhmuc, $motangan, $motadai, $hinhanh);
    }
    function product_update($ten, $anh, $gia, $motangan, $motachitiet, $madm, $soluong,$trangthai,$id){
        pdo_execute("UPDATE sanpham SET TenSP = ?, HinhAnh =?, gia = ?, MoTaNgan = ?, MoTaChiTiet = ?, MaDM = ?, SoLuong =?, TrangThai = ? WHERE MaSP = ?", $ten, $anh, $gia, $motangan, $motachitiet, $madm, $soluong,$trangthai,$id);
    }
/* end minh */
?>