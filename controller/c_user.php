<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            // lấy dữ liệu
            include_once 'model/m_user.php';
            if(isset($_POST['sdt']) && isset($_POST['matkhau'])){
                $result = user_login($_POST['sdt'],$_POST['matkhau']);
                if($result == true){
                    $_SESSION['user'] = $result;
                    header('Location: '.$base_url.'index.php?mod=page&act=home');
                }else{
                    $_SESSION['error'] = "Số điện thoại hoặc mật khẩu không chính xác !";
                }
            }
            // hiển thị dư liệu
            $view_name = 'user_login';
            break;
            case 'signup':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ten = $_POST["name"];
                    $email = $_POST["email"];
                    $soDienThoai = $_POST["sdt"];
                    $matKhau = $_POST["matkhau"];
                    $xacNhanMatKhau = $_POST["xacnhanmatkhau"];
                
                    // Kiểm tra và xử lý lỗi cho trường "ten"
                    if (empty($ten)) {
                        $errors["ten"] = "Vui lòng nhập tên của bạn";
                    }
                
                    // Kiểm tra và xử lý lỗi cho trường "email"
                    if (empty($email)) {
                        $errors["email"] = "Vui lòng nhập địa chỉ email";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors["email"] = "Địa chỉ email không hợp lệ";
                    }elseif (check_email_account($_POST["email"]) == true) {
                        $errors["email"] = "Địa chỉ email đã tồn tại";
                    }
                
                    // Kiểm tra và xử lý lỗi cho trường "soDienThoai"
                    if (empty($soDienThoai)) {
                        $errors["soDienThoai"] = "Vui lòng nhập số điện thoại";
                    }elseif (check_phone_account($_POST["sdt"]) == true) {
                        $errors["soDienThoai"] = "Số điện thoại đã tồn tại";
                    }
                
                    // Kiểm tra và xử lý lỗi cho trường "matKhau"
                    if (empty($matKhau)) {
                        $errors["matKhau"] = "Vui lòng nhập mật khẩu";
                    }
                
                    // Kiểm tra và xử lý lỗi cho trường "xacNhanMatKhau"
                    if (empty($xacNhanMatKhau)) {
                        $errors["xacNhanMatKhau"] = "Vui lòng xác nhận mật khẩu";
                    } elseif ($matKhau !== $xacNhanMatKhau) {
                        $errors["xacNhanMatKhau"] = "Mật khẩu xác nhận không khớp";
                    }
                
                    // Nếu không có lỗi, có thể xử lý dữ liệu hoặc chuyển hướng
                    if (empty($errors)) {
                        user_signup($soDienThoai,$matKhau,$ten,$email);
                        header('Location: '.$base_url.'index.php?mod=page&act=login');
                    }
                }
                // hiển thị dư liệu
                $view_name = 'user_signup';
                break;
            case 'info':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                // hiển thị dư liệu
                $view_name = 'user_infomation';
                break;
            case 'logout':
                unset($_SESSION['user']);
                header('Location: '.$base_url.'index.php?mod=page&act=home');
            break;
    }
    include_once 'view/v_user_layout.php';
} else {
    header('Location: '.$base_url.'index.php?mod=page&act=home');
}
?>