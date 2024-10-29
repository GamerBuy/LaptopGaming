
<h2>Đăng Nhập</h2>
<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error'] ?>
    </div>
<?php endif;
unset($_SESSION['error']); ?>
<form class="w-50 mx-auto" method="POST" action="">

        <!-- Email input -->
        <div class="form-outline mb-3">
        <label for="phone" class="form-label">Số Điện Thoại</label>
        <input type="text" id="phone" name="sdt" class="form-control form-control-lg">
        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
        <label for="phone" class="form-label">Mật Khẩu</label>
        <input type="password" id="pass" name="matkhau" class="form-control form-control-lg">
        </div>

        <div class="d-flex justify-content-between align-items-center">
        <!-- Checkbox -->
        <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" >
            <label class="form-check-label" for="form2Example3">
            Lưu mật khẩu
            </label>
        </div>
        <a href="#!" class="text-body">Quên mật khẩu?</a>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="<?=$base_url?>index.php?mod=user&act=signup"
            class="link-danger">Đăng ký</a></p>
        </div>
        

        </form>