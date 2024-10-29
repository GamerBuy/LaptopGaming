    <!-- start carousel -->
    <div id="carouselExampleRide" class="carousel slide mt-1" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="<?= $base_url ?>/upload/product/carousel2.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="<?= $base_url ?>/upload/product/carousel1.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="<?= $base_url ?>/upload/product/carousel3.webp" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- end carousel -->
    <!-- start content -->
    <h2 class="text-center mt-4 mb-4">Thương hiệu đề cử</h2>
    <div class="row" id="content">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row justify-content-center category-featured">
                <?php
                foreach ($list_category as $item):
                ?>
                <div class="col-lg-3 text-center align-self-center"><a href="index.php?mod=page&act=home&category=<?=$item['MaDM']?>" style="height: 4rem; width: 10rem ;" class="btn btn-white border shadow-sm rounded <?=($item['MaDM'] == $category)?'bg-warning':''?> text-black fs-5 pt-3"><?=$item['TenDM']?></a></div>
                <?php endforeach;?>
            </div>
            <div class="row my-5 category-featured">
                <?php
                foreach ($list as $product):
                ?>
                    <div class="col-sm-3"><div class="card mx-4">
                        <img src="<?= $base_url ?>/upload/product/<?=$product['HinhAnh']?>" class="card-img-top" alt="..." >
                        <div class="text-center">
                            <p class=" hidden-text-justify fs-6 fst-normal" style="height: 3rem;"><?=$product['TenSP']?></p>
                            <a href="<?=$base_url?>index.php?mod=page&act=detail&id=<?=$product['MaSP']?>" class="btn btn-outline-warning mb-2">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <h2 class="text-center mb-4">sản phẩm mua nhiều nhất</h2>
    
    <div class="row my-5">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row category-featured">
                <?php
                $i = 0;
                foreach ($list_purchases as $product):
                    $i++;
                ?>
                    <div class="col-sm-3 mx-3">
                        <div class="card position-relative">
                            <div class="position-absolute top-0 end-0"><i class="fa-solid fa-bookmark fa-2xl position-relative" style="color: #f2bc57;"><strong class="position-absolute top-50 start-50 translate-middle" style="font-size: 9px;font-weight: bolder; color: black;"><?=$i?>st</strong></i></div>
                            <img src="<?= $base_url ?>/upload/product/<?=$product['HinhAnh']?>" class="card-img-top" alt="..." >
                            <div class="text-center">
                            <p class=" hidden-text-justify fs-6 fst-normal" style="height: 3rem;"><?=$product['TenSP']?></p>
                            <a href="<?=$base_url?>index.php?mod=page&act=detail&id=<?=$product['MaSP']?>" class="btn btn-outline-warning mb-2">Xem ngay</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
                
            </div>
        </div>
        
        <div class="col-md-1"></div>
    </div>
    <!-- start banner -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row container-banner">
                <div class="col banner justify-content-center align-self-center"><img src="<?= $base_url ?>/upload/product/banner1.png" class="img-fluid mt-4" alt="..."></div>
                <div class="col banner text-center mb-2">
                    <h2 class="mt-5">Đừng bỏ lỡ cơ hội sở hữu những chiếc laptop bạn yêu thích</h2>
                    <p class="mt-3">Chúng tôi rất vui khi bạn ghé thăm cửa hàng của chúng tôi. Để trải nghiệm tốt hơn và nhận được nhiều ưu đãi hấp dẫn, chúng tôi muốn mời bạn đăng ký tài khoản tại cửa hàng của chúng tôi.</p>
                    <a href="<?=$base_url?>index.php?mod=user&act=signup" class="btn btn-light btn-banner">Đăng ký</a>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col banner justify-content-center align-self-center"><img src="<?= $base_url ?>/upload/product/banner2.png" class="img-fluid mt-4 ms-5" alt="..."></div>
                <div class="col banner2 text-center mb-2">
                    <h2 class="mt-5">Giao hàng bất cứ lúc nào bạn muốn, ở bất kỳ đâu bạn có mặt</h2>
                    <p class="mt-3">Chúng tôi rất vui khi bạn ghé thăm cửa hàng của chúng tôi. Để trải nghiệm tốt hơn và nhận được nhiều ưu đãi hấp dẫn, chúng tôi muốn mời bạn đăng ký tài khoản tại cửa hàng của chúng tôi.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <!-- end banner -->
    <h2 class="text-center mt-5 mb-4">Đánh giá khách hàng</h2>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <section class="mt-4">
                <div class="container py-5">
                <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                    <div class="card testimonial ">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4 position-absolute top-0 start-50 translate-middle">
                        <img src="<?= $base_url ?>/upload/avatar/review1.jpg"
                            class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold mt-4">Chị Đỗ Thị Hoài Anh</h5>
                        <ul class="list-unstyled d-flex justify-content-center mt-3">
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            </ul>
                        <p class="mb-2 review customer-review" >
                            Tôi đã mua nhiều sản phẩm từ cửa hàng laptop này và có một loạt kinh nghiệm tốt. Sản phẩm luôn đáp ứng hoặc vượt qua mong đợi của tôi, với hiệu suất ổn định và chất lượng cấu hình tốt
                        </p>
                        <input type="checkbox" class="expand-btn">
                    </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                    <div class="card testimonial ">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4 position-absolute top-0 start-50 translate-middle">
                        <img src="<?= $base_url ?>/upload/avatar/review2.jpg"
                            class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold mt-4">Anh Trần Võ Nam</h5>
                        <ul class="list-unstyled d-flex justify-content-center mt-3">
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            </ul>
                        <p class="mb-2 review customer-review" >
                            Khả năng tư vấn và hỗ trợ của đội ngũ bán hàng rất ấn tượng. Họ luôn sẵn sàng giúp đỡ, tận tâm và chuyên nghiệp. Tôi cảm thấy tự tin khi mua laptop tại cửa hàng này, biết rằng tôi có một đội ngũ hỗ trợ mạnh mẽ
                        </p>
                        <input type="checkbox" class="expand-btn">
                    </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                    <div class="card testimonial">
                    <div class="card-body py-4 mt-2">
                        <div class="d-flex justify-content-center mb-4 position-absolute top-0 start-50 translate-middle">
                        <img src="<?= $base_url ?>/upload/avatar/review3.jpg"
                            class="rounded-circle shadow-1-strong" width="100" height="100" />
                        </div>
                        <h5 class="font-weight-bold mt-4">Anh Nguyễn Duy Hải</h5>
                        <ul class="list-unstyled d-flex justify-content-center mt-3">
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            <li>
                                <i class="fa-solid fa-star fa-xl" style="color: #ffb90a;"></i>
                            </li>
                            </ul>
                        <p class="mb-2 review customer-review" >
                        Tôi đã mua nhiều sản phẩm từ cửa hàng laptop này và có một loạt kinh nghiệm tốt. Sản phẩm luôn đáp ứng hoặc vượt qua mong đợi của tôi, với hiệu suất ổn định và chất lượng cấu hình tốt
                        </p>
                        <input type="checkbox" class="expand-btn"  onchange="toggleInputVisibility()">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <hr>
    <!-- end content -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll('.expand-btn');
            for (let i = 0; i < checkboxes.length; i++) {
                var paragraph = checkboxes[i].previousElementSibling;
                var lineCount = paragraph.clientHeight / parseFloat(getComputedStyle(paragraph).lineHeight);
                console.log(lineCount);
                if (lineCount < 2) {
                    checkboxes[i].classList.add('display-none');
                } else {
                    checkboxes[i].classList.remove('display-none');
                }
                
            }
        });
    </script>