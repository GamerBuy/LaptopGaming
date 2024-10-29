<div class="p-3 vh-100">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="">
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="<?=$dm['TenDM']?>">
                </div>
                <div class="">
                    <label for="">Trạng thái</label>
                    <select name="status" id="" class="form-select">
                        <option value="Đang hoạt động"<?php if($dm['trangthai']=='Đang hoạt động') echo 'selected';?>>Đang hoạt động</option>
                        <option value="Ngưng hoạt động" <?php if($dm['trangthai']=='Ngưng hoạt động') echo 'selected';?>>Ngưng hoạt động</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-danger m-5" name="submit_edit" value="Sửa">
                </div>
            </div>
        </div>
    </form>
</div>