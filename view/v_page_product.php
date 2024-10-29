<div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1>Sản phẩm</h1>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3" >
                    <i class="fa-solid fa-sliders fa-lg pointer" id="filterIcon"></i> <span>fillter</span>
                </div>
                <div class="col-sm-6 text-center" >
                </div>
                <div class="col-sm-3 d-flex flex-row-reverse" >
                <select class="form-select-sm" id="selectOption" aria-label="Default select example" onchange="redirectToSelectedOption()">
                    <option value="product_default" <?=($_SESSION['sort'] == 'default')?'selected':''?>>Mặc định</option>
                    <option value="product_purchases" <?=($_SESSION['sort'] == 'purchases')?'selected':''?>>Lượt mua</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <Strong class="mx-2">sắp xếp:</Strong>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row filter #filterIcon d-none">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    <form method="post" action="">
        <div class="row align-items-end">
            <div class="col-md-4">
                <label for="minPrice" class="form-label">Giá tối thiểu:</label>
                <input type="number" class="form-control" id="minPrice" name="minPrice">
            </div>
            <div class="col-md-4">
                <label for="maxPrice" class="form-label">Giá tối đa:</label>
                <input type="number" class="form-control" id="maxPrice" name="maxPrice">
            </div>
            <div class="col-md-4 mt-3 d-flex">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">tìm kiếm</button>
                <a  href="<?=$base_url?>index.php?mod=page&act=product&sort=default" class="btn btn-primary mx-2">Thiết lập lại</a>
            </div>
        </div>
    </form>
    </div>
    <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <?php
                foreach ($list as $item):
                ?>
                    <div class="col-sm-3 mb-3">
                        <div class="card card-animation" >
                            <img src="<?=$base_url?>/upload/product/<?=$item['HinhAnh']?>" class="card-img-top" alt="...">
                            <div class="">
                                <h5 class="card-title product-hidden-text"><?=$item['TenSP']?></h5>
                                <p class="card-text"><span class="text-warning fw-bold gia"><?=$item['gia']?><span> đ</span></span></p>
                                <div class="mb-2 text-end">
                                <i class="fa-solid fa-circle-info fa-2xl pointer"></i>
                                <i class="fa-solid fa-cart-shopping fa-xl mx-2 pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                <li class="page-item">
                <a class="page-link text-black <?=($page <= 1)?'disabled':''?>" href="<?=$base_url?>index.php?mod=page&act=product&page=<?=$page - 1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
                <?php
                for( $i = 1; $i <= $total_pages; $i++):
                ?>
                    <li class="page-item"><a class="page-link text-black <?=($page == $i)?'active-warning':''?> <?=($i > $page +2 || $i < $page - 2)?'display-none':''?>" href="<?=$base_url?>index.php?mod=page&act=product&page=<?=$i?>"><?=$i?></a></li>
                <?php endfor;?>
                <li class="page-item">
                <a class="page-link text-black <?=($page >= $total_pages)?'disabled':''?>" href="<?=$base_url?>index.php?mod=page&act=product&page=<?=$page + 1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
            </nav>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <script>
            var gia = document.querySelectorAll(".gia");
            for (let index = 0; index < gia.length; index++) {
                gia[index].innerText = gia[index].innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');   
            }
    </script>