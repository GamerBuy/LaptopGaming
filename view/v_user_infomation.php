
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    <h2 class="mt-5">Thông Tin Cá Nhân</h2>
    <div class="row mt-4">
        <div class="col-sm-6"><img src="<?=$base_url?>upload/avatar/<?=$_SESSION['user']['HinhAnh']?>" class="rounded float-start" alt="..." style="width: 100%; height: 100%;"></div>
        <div class="col-sm-6">
        <form class=" mx-auto" method="POST" action="">
                <div class="form-outline mb-4">
                <label for="phone" class="form-label">Họ Và Tên</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?=$_SESSION['user']['HoTen']?>"/>
                </div>
                <div class="form-outline mb-4">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                    <input type="text" id="phone" name="SoDienThoai" class="form-control form-control-lg" value="<?=$_SESSION['user']['SoDienThoai']?>"/>
                </div>

                <div class="form-outline mb-3">
                <label for="email" class="form-label">email</label>
                    <input type="text" id="email" name="email" class="form-control form-control-lg" value="<?=$_SESSION['user']['email']?>"/>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Cập nhật</button>
                    <a href="<?=$base_url?>index.php?mod=user&act=logout" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng xuất</a>
                </div>

                </form>
        </div>
    </div>
    </div>
    <div class="col-sm-1"></div>
</div>