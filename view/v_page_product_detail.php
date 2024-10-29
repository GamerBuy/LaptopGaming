<div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <aside class="col-xl-6">
                    <div class=" d-flex justify-content-center">
                    <a class="rounded-4">
                    <img class="rounded-4 fit w-100" id="mainImage" src="<?=$base_url?>/upload/product/<?=$product['HinhAnh']?>" />
                    </a>
                </div>
                <div class="row images">
                    <?php foreach ($list_images as $item):?>
                            <div class="col-3 mx-2 rounded-2 item-thumb" onclick="swapImages('<?=$item['ID']?>')">
                            <img width="100" height="100" class="rounded-2 d-block" id="<?=$item['ID']?>" src="<?=$base_url?>/upload/product/<?=$item['anh']?>" />
                            </div>

                        <?php endforeach;?>
                </div>
                </aside>
                <div class="col-xl-6">
                    <h5><?=$product['TenSP']?></h5>
                    <p class="text-warning fw-bold fs-4"><?=$product['gia']?> đ</p>
                    <p class="mt-3"><?=$product['MoTaNgan']?></p>
                    <hr>
                    <strong class="me-4">Màu:</strong>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input bg-dark"  type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1"></label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input bg-warning" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2"></label>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <div class="input-group quantity" style="width: 120px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-md btn-warning btn-minus" id="decrease" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm  border  text-center" name="productQuantity" id="productQuantity" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-md btn-warning btn-plus" id="increase">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3" ><a href="<?=$base_url?>index.php?mod=product&act=addtocart&id=<?=$product['MaSP']?>&quantity=" id="addToCartBtn" class="btn btn-warning">Thêm giỏ hàng</a></div>
                        <div class="mt-5">
                            <?php if (isset($_SESSION['ThongBao'])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_SESSION['ThongBao'] ?>
                                </div>
                                <?php endif; unset($_SESSION['ThongBao']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 description-product">
            <h3>Mô tả chi tiết</h3>
            <hr>
            <p><?=$product['MoTaChiTiet']?></p>
            <input type="checkbox" class="expand-btn-description text-end w-100">
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="mb-4">Sản phẩm tương tự</h1>
            <div class="row category-featured">
                <?php
                foreach ($list as $item):
                ?>
                    <div class="col-sm-3 mb-3 mx-4">
                    <div class="card" >
                        <img src="<?=$base_url?>/upload/product/<?=$item['HinhAnh']?>" class="card-img-top" alt="...">
                            <div class="">
                                <h5 class="card-title product-hidden-text"><?=$item['TenSP']?></h5>
                                <p class="card-text"><p class="text-warning fw-bold"><?=$item['gia']?> đ</p></p>
                                <div class="mb-2 text-end">
                                <a href="<?=$base_url?>index.php?mod=page&act=detail&id=<?=$item['MaSP']?>" class="text-black"><i class="fa-solid fa-circle-info fa-2xl"></i></a>
                                <i class="fa-solid fa-cart-shopping fa-xl mx-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h3>Đánh giá khách hàng</h3>
            <hr>
            <?php if(isset($_SESSION['user'])):?>
                <div class="row mb-5">
                    <div class="col-sm-3">
                        <img src="<?=$base_url?>upload/avatar/<?=$_SESSION['user']['HinhAnh']?>" class="rounded float-start" alt="..." style="width: 100%;">
                        <h5 class="fw-bold text-center"><?= $_SESSION['user']['HoTen']?></h5>
                    </div>
                    <div class="col-sm-9">
                        <form action="<?=$base_url?>index.php?mod=product&act=comment" method="post">
                            <textarea name="content" class="form-control" id="" rows=6 placeholder="Đánh giá của bạn ?"></textarea>
                            <div class="row">
                                <div class="rating col-sm-6">
                                    <span class="star" onclick="setRating(1)"><i class="fa-solid fa-star fa-sm"></i></i></span>
                                    <span class="star" onclick="setRating(2)"><i class="fa-solid fa-star fa-sm"></i></i></span>
                                    <span class="star" onclick="setRating(3)"><i class="fa-solid fa-star fa-sm"></i></i></span>
                                    <span class="star" onclick="setRating(4)"><i class="fa-solid fa-star fa-sm"></i></i></span>
                                    <span class="star" onclick="setRating(5)"><i class="fa-solid fa-star fa-sm"></i></i></span>
                                    <input type="hidden" name="TotalStar" id="TotalStar" value="1">
                                </div>
                                <div class="text-end mt-2 col-sm-6"><button class="btn btn-primary btn-lg mx-3" type="submit">Gửi</button></div>
                            </div>
                            <div><input type="hidden" name="MaSP" value="<?=$product['MaSP']?>"></div>
                        </form>
                    </div>
                </div>
            <?php endif;?>
            <?php foreach ($list_comment as $item):?>
                <hr>
                <div class="row my-3 rownded-3 customer-review-container">
                    <div class="col-md-2 text-center">
                            <img src="<?=$base_url?>upload/avatar/<?= $item['HinhAnh']?>" class="rounded" alt="..." style="width: 100%; height: 80%;">
                            <?php for ($i=0; $i < $item['SoSao']; $i++): ?>
                                <i class="fa-solid fa-star fa-sm" style="color: #F7C531;"></i>
                            <?php endfor;?>
                    </div>
                    <div class="col-md-10">
                        <div class="mb-2">
                            <h5 class="fw-bold"><?= $item['HoTen']?></h5>
                            <span>29/9/2023</span>
                        </div>
                        <p class=""><?=$item['NoiDung']?>
                        </p>
                        <input type="checkbox" class="expand-btn-review text-end w-100">
                    </div>
                </div>
            <?php endforeach;?>
            <hr>
        </div>
        <div class="col-sm-1"></div>
    </div>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes_description = document.querySelectorAll('.expand-btn-description');
            for (let i = 0; i < checkboxes_description.length; i++) {
                var paragraph = checkboxes_description[i].previousElementSibling;
                var lineCount = paragraph.clientHeight / parseFloat(getComputedStyle(paragraph).lineHeight);
                if (lineCount <= 2) {
                    checkboxes_description[i].classList.add('display-none');
                } else {
                    checkboxes_description[i].classList.remove('display-none');
                    paragraph.classList.add('description-product-p');
                }
                
            }
            var checkboxes = document.querySelectorAll('.expand-btn-review');
            for (let i = 0; i < checkboxes.length; i++) {
                var paragraph = checkboxes[i].previousElementSibling;
                var lineCount = paragraph.clientHeight / parseFloat(getComputedStyle(paragraph).lineHeight);
                if (lineCount <= 2) {
                    checkboxes[i].classList.add('display-none');
                } else {
                    checkboxes[i].classList.remove('display-none');
                    paragraph.classList.add('customer-review-detail');
                }
                
            }
    });
    $(document).ready(function(){
        $('.images').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            draggable: true,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                    slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 330,
                    settings: {
                    slidesToShow: 2,
                    }
                }
            ]
        });
    });
        var quantityInput = document.getElementById('productQuantity');
        var addToCartBtn = document.getElementById('addToCartBtn');
        addToCartBtn.addEventListener('click', function() {
            var quantity = quantityInput.value;
            addToCartBtn.href = addToCartBtn.href + quantity;
        });
        document.getElementById('increase').addEventListener('click', function () {
            increaseQuantity();
        });

        document.getElementById('decrease').addEventListener('click', function () {
            decreaseQuantity();
        });
        function increaseQuantity() {
            var quantityInput = document.getElementById('productQuantity');
            var currentQuantity = parseInt(quantityInput.value, 10);
            quantityInput.value = currentQuantity + 1;
        }
        function decreaseQuantity() {
            var quantityInput = document.getElementById('productQuantity');
            var currentQuantity = parseInt(quantityInput.value, 10);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }
        function setRating(rating) {
    // Loại bỏ lớp 'active' từ tất cả các sao
        var stars = document.getElementsByClassName("star");
        var total_stars =document.getElementById("TotalStar");
        for (var i = 0; i < stars.length; i++) {
            stars[i].classList.remove("active");
        }

        // Thêm lớp 'active' cho số lượng sao được chọn
        for (var i = 0; i < rating; i++) {
            stars[i].classList.add("active");
            total_stars.value = i+1;
        }
    }
</script>