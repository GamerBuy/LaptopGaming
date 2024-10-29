
<!-- sa-app__body -->
<form action="" method="post" enctype="multipart/form-data">
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <h1 class="h3 m-0">Sản phẩm mới</h1>
                                </div>
                                <div class="col-auto d-flex">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit" >Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin cơ bản</h2>
                                            </div>
                                            <div class="mb-4">
                                                <input type="hidden" name="id"  value="<?=$_GET['id']?>">
                                                <label for="form-product/name" class="form-label">Tên sản phẩm</label><input
                                                    type="text" class="form-control" id="form-product/name"
                                                    value="<?=$product['TenSP']?>" name="name" />
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/description"
                                                    class="form-label">Mô tả ngắn</label>
                                                <textarea id="form-product/description" name="mtngan"
                                                    class="sa-quill-control form-control" rows="5"><?=$product['MoTaNgan']?></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="form-product/description"
                                                    class="form-label">Mô tả chi tiết</label>
                                                <textarea id="form-product/description" name="mtchitiet"
                                                    class="sa-quill-control form-control" rows="8"><?=$product['MoTaChiTiet']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Giá</h2>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col">
                                                    <label for="form-product/price"
                                                        class="form-label">Giá</label><input type="number"
                                                        class="form-control" id="form-product/price" name="price" value="<?=$product['gia']?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Kho</h2>
                                            </div>
                                            <div>
                                                <label for="form-product/quantity" class="form-label">Số lượng</label>
                                                <input type="number" class="form-control" id="form-product/quantity"
                                                    value="<?=$product['SoLuong']?>" name="mount" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Hình ảnh</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                        <div class="sa-divider"></div>
                                            <div class="img-edit">
                                                <img src="<?=$base_url?>/upload/product/<?=$product['HinhAnh']?>"
                                                    width="320" height="320" alt=""/>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2">
                                                <!-- <a href="#">Upload new image</a> -->
                                                <input type="file" name="image" class = "space">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Danh mục</h2>
                                            </div>
                                            <select class="sa-select2 form-select" name="category">
                                                <?php
                                                foreach ($category_list as $dm) :
                                                ?>
                                                <option value="<?=$dm['MaDM']?>" <?=($product['MaDM'] == $dm['MaDM'])?'selected':''?>><?=$dm['TenDM']?></option>
                                                <?php endforeach;?>
                                                
                                            </select>
                                        </div>
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Trạng Thái</h2>
                                            </div>
                                            <select class="sa-select2 form-select" name="trangthai">
                                                <option value="con-hang" <?=($product['TrangThai'] == "con-hang")?'selected':''?>>Đang hoạt động</option>
                                                <option value="het-hang" <?=($product['TrangThai'] == "het-hang")?'selected':''?>>Ngưng hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- sa-app__body / end -->