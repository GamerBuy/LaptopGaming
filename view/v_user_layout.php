<?php
include_once "model/m_category.php";
include_once "model/m_cart.php";
$list_category_header = get_all_category();
$list_product_in_cart = 0;
if(isset($_SESSION['cart']) && isset($_SESSION['user'])){
    $ItemhoaDon = get_bill($_SESSION['user']['MaTK']);
    if( $ItemhoaDon == false){
        $list_product_in_cart = 0;
    }else{
        $list_product_in_cart = count(get_all_product_in_cart_by_MaHD($ItemhoaDon['MaHD']));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Pro</title>
    <link rel="stylesheet" href="<?= $base_url ?>template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>template/style.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <script src="https://kit.fontawesome.com/cc03047fef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="container" >
    <!-- start nav -->
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">    
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
                <a class="navbar-brand me-5" href="index.php?mod=page&act=home"><img style="width: 50px;" src="<?=$base_url?>upload/icon/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?mod=page&act=home">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?mod=page&act=product&sort=default">Sản phẩm</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thương hiệu
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($list_category_header as $item):?>
                            <li><a class="dropdown-item" href="#"><?=$item['TenDM']?></a></li>
                            <?php endforeach;?>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Thông tin</a>
                    </li>
                    <?php if(isset($_SESSION['user'])):?>
                        <?php if($_SESSION['user']['Quyen'] == 1):?>
                            <li class="nav-item">
                            <a class="nav-link active text-warning" aria-current="page" href="<?=$base_url?>index.php?mod=admin&act=dashboard">quản lý</a>
                            </li>
                        <?php endif;?>
                    <?php endif;?>
                </ul>
                    <form action="index.php?mod=page&act=search" method="POST" class="search-box">
                        <input type="text" name="keyword" class="search-text" placeholder="Nhập từ khóa tìm kiếm"> 
                        <button class="search-btn" name="timkiem"><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
                    </form>
                    <div class="">
                        <a href="<?=$base_url?>index.php?mod=page&act=cart" class="fa-solid fa-bag-shopping fa-xl mx-3 position-relative text-decoration-none text-black"><div class="position-absolute top-100 start-100 translate-middle"><span class="position-relative badge border border-light rounded-circle bg-warning p-2"><small class="position-absolute top-50 start-50 translate-middle" style="font-size: 10px;"><?=$list_product_in_cart?></small></span></div></a>
                        <?php if(isset($_SESSION['user'])):?>
                            <a href="<?=$base_url?>index.php?mod=user&act=info"><img src="<?=$base_url?>upload/avatar/<?=$_SESSION['user']['HinhAnh']?>" class="rounded-4" alt="..." style="width: 5vh;"></a>
                        <?php else:?>
                            <a href="<?=$base_url?>index.php?mod=user&act=login" class="fa-solid fa-circle-user fa-xl text-black text-decoration-none"></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </nav>
</div>
    <div class="col-md-1"></div>
</div>
    <!-- end nav -->
    <?php include_once 'view/v_' . $view_name . '.php'; ?>
    <!-- start footer -->
    <footer class="mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">       
                <div class="row">
                <div class="col-lg-3">
                    <div class="" style="width: 18rem;">
                    <ul class="">
                        <li class="list-group-item mb-2"><strong>khám phá</strong></li>
                        <li class="list-group-item">Ứng dụng mobile</li>
                        <li class="list-group-item">Bảo mật thông tin</li>
                        <li class="list-group-item">Quy định</li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="" style="width: 18rem;">
                        <ul class="">
                            <li class="list-group-item mb-2"><strong>Công ty</strong></li>
                            <li class="list-group-item">Giới thiệu</li>
                            <li class="list-group-item">liên hệ</li>
                            <li class="list-group-item">Quy chế</li>
                        </ul>
                        </div>
                </div>
                <div class="col-lg-3">
                    <div class="" style="width: 18rem;">
                        <ul class="">
                            <li class="list-group-item mb-2"><strong>Tham gia trên</strong></li>
                            <li class="list-group-item">Facebook</li>
                            <li class="list-group-item">Instagram</li>
                            <li class="list-group-item">Youtube</li>
                        </ul>
                        </div>
                </div>
                <div class="col-lg-3">
                    <div class="" style="width: 18rem;">
                        <ul class="">
                            <li class="list-group-item mb-2"><strong>Chính sách</strong></li>
                            <li class="list-group-item">Các câu hỏi thường gặp</li>
                            <li class="list-group-item">Điều khoản Điều kiện</li>
                            <li class="list-group-item">Chính sách quyền riêng tư</li>
                        </ul>
                        </div>
                </div></div>
            <div class="col-md-1"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col" style="margin-left: 35px;">Copyright ©2023 H.A.P</div>
                    <div class="col text-end">
                        follow us:
                        <i class="fa-brands fa-facebook fa-xl" style="color: #2668d9;"></i>
                        <i class="fa-brands fa-square-instagram fa-xl" style="color: #981ca6;"></i>
                        <i class="fa-brands fa-youtube fa-xl" style="color: #e52a2a;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        
    </footer>
        <!-- end footer -->
        <script
          type="text/javascript"
          src="https://code.jquery.com/jquery-1.11.0.min.js"
        ></script>
        <script
          type="text/javascript"
          src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
        ></script>
        <script
          type="text/javascript"
          src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>
        <script src="<?=$base_url?>template/js/app.js"></script>
    <script src="<?= $base_url ?>template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function redirectToSelectedOption() {
            var select = document.getElementById("selectOption");
            var selectedOption = select.options[select.selectedIndex].value;
            if (selectedOption === "product_purchases") {
                window.location.href = "index.php?mod=page&act=product&sort=purchases";
            }else if(selectedOption === "product_default"){
                window.location.href = "index.php?mod=page&act=product&sort=default";
            }
        }
        $(document).ready(function(){
        // Bắt sự kiện click vào icon filter
        $('#filterIcon').click(function(){
            // Toggle lớp d-none của div có class "filter"
            $('.filter').toggleClass('d-none');
        });
    });
    function swapImages(newImageUrl) {

        // Lấy đường dẫn của ảnh chính và ảnh xem thêm
        var mainImage = document.getElementById('mainImage').src;
        var SecondaryImage = document.getElementById(newImageUrl).src;
        // Lưu đường dẫn của ảnh chính
        var currentMainImageUrl = mainImage;
        // Thay đổi đường dẫn của ảnh chính thành đường dẫn của ảnh xem thêm
        document.getElementById('mainImage').src = SecondaryImage;

        // Thay đổi đường dẫn của ảnh xem thêm thnh đường dẫn của ảnh chính
        document.getElementById(newImageUrl).src = currentMainImageUrl;
    }
    </script>
</body>
</html>