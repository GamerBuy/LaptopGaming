<?php
include_once "model/m_admin.php";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'category':
            // lấy dữ liệu
            $dsdm = category_list();
            // hiển thị dư liệu
            $view_name = 'admin_category';
            break;
        case 'category_add':
            $dsdm = category_list();
            if(isset($_POST['name'])){
                category_add($_POST['name'],$_POST['status']);
                header('location: ?mod=admin&act=category');
            }
            $view_name = "category_add";
            break;
        case 'category_edit':
            $dsdm = category_list();
            $id = $_GET['id'];
            if(isset($_POST['submit_edit'])){
                $name = $_POST['name'];
                $status = $_POST['status'];
                category_edit($name,$status,$id);
                header('location: ?mod=admin&act=category');
            }
            $dm = category_edit_one($id);
            $view_name ="category_edit";
            break;
        case 'dashboard':
            // lấy dữ liệu
            $dsdm = category_list();
            $tongsp = count_product();
            $tongdm = count_category();
            $tongtk = count_account();
            $tongbill = count_bill();
            $tongthongke = statistical();       
            // hiển thị dư liệu
            $view_name = 'admin_dashboard';
            break;
        case 'product':
            // lấy dữ liệu
            include_once "model/m_admin.php";
            if(isset($_POST['submit'])){
                $TenSP = $_POST['TenSP'];
                $gia = $_POST['gia'];
                $SoLuong = $_POST['SoLuong'];
                $danhmuc = $_POST['danhmuc'];
                $motangan = $_POST['motangan'];
                $motachitiet = $_POST['motachitiet'];
                $HinhAnh = $_FILES['HinhAnh']['name'];
                product_add($TenSP, $gia, $SoLuong, $danhmuc, $motangan, $motachitiet, $HinhAnh);
                if(isset($_FILES['anhbosung'])){
                    $product_last = get_product_id_last();
                    $anhbosung = $_FILES['anhbosung']['name'];
                        foreach ($anhbosung as $item) {
                            add_images($item,$product_last['MaSP']);
                        }
                }
            }
            $list = show_full_product_with_category();
            $category_list = category_list();
            // hiển thị dư liệu
            $view_name = 'admin_product';
        break;
        case 'product-add':
            // lấy dữ liệu
            include_once "model/m_admin.php";
            include_once "model/m_product.php";
            if(isset($_GET['id'])){
                $product = get_product_by_id($_GET['id']);
                $category_list = category_list();
            }
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $ten = $_POST['name'];
                $motangan = $_POST['mtngan'];
                $motachitiet = $_POST['mtchitiet'];
                $gia = $_POST['price'];
                $soluong = $_POST['mount'];
                $image = "";
                if(isset($_FILES['image'])){
                    if($_FILES['image']['name'] == ''){
                        $product = get_product_by_id($id);
                        $image = $product['HinhAnh'];
                    }else{
                        $image =$_FILES['image']['name'];
                    }
                }
                $danhmuc = $_POST['category'];
                $trangthai = $_POST['trangthai'];
                product_update($ten, $image, $gia, $motangan, $motachitiet, $danhmuc, $soluong, $trangthai,$id);
                header('Location: '.$base_url.'index.php?mod=admin&act=product');
            }
            // hiển thị dư liệu
            $view_name = 'admin_product_add';
        break;
    }
    include_once 'view/v_admin_layout.php';
} else {
    header('Location: '.$base_url.'index.php?mod=admin&act=dashboard');
}
?>