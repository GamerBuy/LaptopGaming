<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>
    <link rel="stylesheet" href="<?=$base_url?>template/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 collapse collapse-horizontal show" style="min-height: 100vh" id="openMenu">
                <strong class="d-block shadow p-3 mb-3 bg-body rounded" style="border: 1px solid #F2B705;font-size:1.7rem"> LAPTOPSHOP </strong>
                <div class="list-group">
                    <a href="<?=$base_url?>index.php?mod=admin&act=dashboard" class="list-group-item list-group-item-action"><i class="fa-solid fa-house me-2"></i>Trang chủ</a>
                    <a href="<?=$base_url?>index.php?mod=admin&act=product" class="list-group-item list-group-item-action"><i class="fa-solid fa-bag-shopping me-2"></i>Sản phẩm</a>
                    <a href="<?=$base_url?>index.php?mod=admin&act=category" class="list-group-item list-group-item-action"><i class="fa-solid fa-list-ul me-2"></i>Danh mục</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-user me-2"></i>Tài khoản</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="fa-solid fa-cart-shopping me-2"></i>Thanh toán</a>
                </div>
            </div>
            <div class="col-md" style="border: 1px solid #F2B705">
                <div class="row">
                <nav class="navbar navbar-expand-lg" style="border: 1px solid #F2B705">
                    <div class="container m-1">
                        <button class="btn btn-white me-2" style="border-bottom: 1px solid #F2B705" type="button" data-bs-toggle="collapse" data-bs-target="#openMenu" aria-expanded="false" aria-controls="openMenu"><i class="fa-solid fa-list"></i>
                        </button>
                        <h2><a class="navbar-brand text-black p-1" href="#">Admin</a></h2>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Xin chào, <?=$_SESSION['user']['HoTen']?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?=$base_url?>index.php?mod=page&act=home">Trang chủ</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?=$base_url?>index.php?mod=user&act=logout">Đăng xuất</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                </div>
                <div class="row">
                <?php include_once 'view/v_' . $view_name . '.php'; ?>
                </div>
            </div>
        </div>
    </div>

