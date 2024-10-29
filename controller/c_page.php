
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            // lấy dữ liệu
            include_once 'model/m_product.php';
            include_once 'model/m_category.php';
            $category = 1;
            if(isset($_GET['category'])){
                $category = $_GET['category'];
            }
            $list = get_product_by_category($category);
            $list_purchases = get_product_by_purchases();
            $list_category = get_all_category();
            // hiển thị dư liệu
            $view_name = 'page_home';
            break;
        case 'product':
            // lấy dữ liệu
            include_once 'model/m_product.php';
            $min = 0;
            $max =0;
            if(!isset($_SESSION['sort'])){
                $_SESSION['sort'] ='default';
            }
            if(isset($_GET['sort'])){
                $_SESSION['sort'] = $_GET['sort'];
            }
            $page = 1;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            $total_product = count(get_product_all());
            $total_pages = ceil($total_product/8);
            if(isset( $_SESSION['sort'])){
                switch ($_SESSION['sort']) {
                    case 'detail':
                        unset($_SESSION['min']);
                        unset($_SESSION['max']);
                        $list = page_product($page);
                        break;
                    case 'purchases':
                        $list = page_product_all_by_purchases($page);
                        break;
                    case 'price':
                        $min =$_SESSION['min'];
                        $max =$_SESSION['max'];
                        $min = (int)$min;
                        $max = (int)$max;
                        if($min != 0 && $max != 0){
                            $total_product = count(get_product_filter_min_max($min, $max));
                            $total_pages = ceil($total_product/8);
                            $list = page_product_filter_min_max($min, $max, $page);
                        }else if($min != 0 && $max == 0){
                            $total_product = count(get_product_filter_min($min));
                            $total_pages = ceil($total_product/8);
                            $list = page_product_filter_min($min, $page);
                        }else if($min == 0 && $max != 0){
                            $total_product = count(get_product_filter_max($max));
                            $total_pages = ceil($total_product/8);
                            $list = page_product_filter_max($max, $page);
                        }
                        break;
                    default:
                        $list = page_product($page);
                        break;
                }
            }else{
                $list = page_product($page);
            }
            if(isset($_POST['submit'])){
                $_SESSION['sort'] = "price";
                if(isset($_POST['minPrice']) && isset($_POST['maxPrice'] ) && $_POST['maxPrice'] != "" &&$_POST['minPrice'] != ""){
                    $min = $_POST['minPrice'];
                    $max =$_POST['maxPrice'];
                    $min = (int)$min;
                    $max = (int)$max;
                    $_SESSION['min'] = $min;
                    $_SESSION['max'] = $max;
                    $total_product = count(get_product_filter_min_max($min, $max));
                    $total_pages = ceil($total_product/8);
                    $list = page_product_filter_min_max($min, $max, 1);
                }else if(isset($_POST['minPrice']) && $_POST['maxPrice'] ==""){
                    $min = $_POST['minPrice'];
                    $min = (int)$min;
                    $_SESSION['min'] = $min;
                    $total_product = count(get_product_filter_min($min));
                    $total_pages = ceil($total_product/8);
                    $list = page_product_filter_min($min, 1);
                }else if(isset($_POST['maxPrice']) && $_POST['minPrice'] == ""){
                    $max = $_POST['maxPrice'];
                    $max = (int)$max;
                    $_SESSION['max'] = $max;
                    $total_product = count(get_product_filter_max($max));
                    $total_pages = ceil($total_product/8);
                    $list = page_product_filter_max($max, 1);
                }
            }
            // hiển thị dư liệu
            $view_name = 'page_product';
            break;
            case 'detail':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                include_once 'model/m_category.php';
                include_once 'model/m_comment.php';
                $id = 1;
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                $product = get_product_by_id($id);
                $list = get_product_by_category($product['MaDM']);
                $list_images = Get_product_images($id);
                $list_comment = get_all_comment($id);
                // hiển thị dư liệu
                $view_name = 'page_product_detail';
            break;
            case 'cart':
                // lấy dữ liệu
                if(!isset($_SESSION['user'])){
                    header('Location: '.$base_url.'index.php?mod=user&act=login');
                }
                include_once 'model/m_product.php';
                include_once 'model/m_cart.php';
                $list = get_all_cart($_SESSION['user']['MaTK']);
                $_SESSION['cart'] = $list;
                // hiển thị dư liệu
                $view_name = 'page_cart';
            break;
            case 'updateItemCart':
                include_once 'model/m_cart.php';
                $SoLuong = $_GET['quantity'];
                $MaSP = $_GET['id'];
                update_quantity_product_in_cart($MaSP, $SoLuong);
                header('Location: '.$base_url.'index.php?mod=page&act=cart');
            break;
            case 'deleteItemCart':
                include_once 'model/m_cart.php';
                $MaSP = $_GET['id'];
                delete_product_in_cart($MaSP);
                header('Location: '.$base_url.'index.php?mod=page&act=cart');
            case 'billInfo':
                // lấy dữ liệu
                include_once 'model/m_cart.php';
                $list = get_all_cart($_SESSION['user']['MaTK']);
                // hiển thị dư liệu
                $view_name = 'page_BillingInformation';
            break;
            case 'pay':
                include_once "model/m_cart.php";
                // lấy dữ liệu
                $tongtien = 0;
                $_SESSION['name'] = $_POST['fullName'];
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['diachi'] = $_POST['diachi'];
                $list = get_all_cart($_SESSION['user']['MaTK']);
                foreach ($list as $item) {
                    $tongtien += $item['gia'] *$item['SoSanPham'];
                }
                $tongSP = count($list);
                $maHD = $list[0]['MaHD'];
                update_bill($tongtien, $tongSP, $maHD);
                $hoaDon = get_bill($_SESSION['user']['MaTK']);
                // hiển thị dư liệu
                $view_name = 'page_pay';
            break;
            case 'search':
                // lấy dữ liệu
                include_once "model/m_product.php";
                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                if(isset($_POST['keyword'])){
                    $_SESSION['keyword'] = $_POST['keyword'];
                }
                $data_search = product_search($_SESSION['keyword'],$page);
                $number_page = ceil(productS($_SESSION['keyword'])/8);
                // hiển thị dư liệu
                $view_name = 'page_product_search';
            break;
    }   
    include_once 'view/v_user_layout.php';
} else {
    header('Location: '.$base_url.'index.php?mod=page&act=home');
}
//{}
?>