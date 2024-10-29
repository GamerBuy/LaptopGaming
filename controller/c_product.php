<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'addtocart':
            // lấy dữ liệu
            if(!isset($_SESSION['user'])){
                header('Location: '.$base_url.'index.php?mod=user&act=login');
            }
            $MaSP = $_GET['id'];
            $MaTK = $_SESSION['user']['MaTK'];
            $SoLuong = $_GET['quantity'];
            $SoLuong = (int)$SoLuong;
            include_once("model/m_cart.php");
            $_SESSION['cart'] = get_all_cart($_SESSION['user']['MaTK']);
            $result = check_exits_cart($MaTK);
            $bill = get_bill($MaTK);
            $product_result = check_product_exits_in_cart($MaSP,$bill['MaHD']);
            if($result == true){
                if($product_result == true){
                    update_product_in_cart($MaSP, $SoLuong);
                }else{
                    add_product_to_cart( $result['MaHD'], $MaSP);
                    update_product_in_cart_with_equal($MaSP, $SoLuong);
                }
            }else{
                add_cart($MaTK);
                $result = check_exits_cart($MaTK);
                if($product_result == true){
                    update_product_in_cart($MaSP, $SoLuong);
                }else{
                    add_product_to_cart( $result['MaHD'], $MaSP);
                    update_product_in_cart_with_equal($MaSP, $SoLuong);
                }
            }
            $_SESSION['ThongBao'] = "Đã thêm sản phẩm vào giỏ hàng";
            header('Location: '.$base_url.'index.php?mod=page&act=detail&id='.$MaSP.'');
            // hiển thị dư liệu
            $view_name = 'user_login';
            break;
            case 'comment':
                include_once "model/m_comment.php";
                comment_add($_POST['MaSP'], $_SESSION['user']['MaTK'], $_POST['content'], $_POST['TotalStar']);
                header('Location: '.$base_url.'index.php?mod=page&act=detail&id='.$_POST["MaSP"].'');
            break;
    }
    include_once 'view/v_user_layout.php';
} else {
    header('Location: '.$base_url.'index.php?mod=page&act=home');
}
?>