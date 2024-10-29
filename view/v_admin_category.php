
<div class="container mt-3">
    <h3 class="text-center">Quản lý danh mục</h3>
    <div class="float-end">
        <a href="<?=$base_url?>index.php?mod=admin&act=category_add" class="btn-1 me-5 fa-xl">Thêm danh mục</a>
    </div>
    <table class="table table-hover me-5" style="border: 1px solid #F2B705">
        <thead>
            <th class="text-center" style="border-right:1px solid #F2B705">Mã danh mục</th>
            <th class="text-center" style="border-right:1px solid #F2B705">Tên danh mục</th>
            <th class="text-center" style="border-right:1px solid #F2B705">Trạng thái</th>
            <th class="text-center">Hành động</th>
        </thead>
        <tbody>
            <?php foreach ($dsdm as $dm) : ?>
                <tr>
                    <td style="border-right:1px solid #F2B705"><?= $dm['MaDM'] ?></td>
                    <td style="border-right:1px solid #F2B705"><?= $dm['TenDM'] ?></td>
                    <td style="border-right:1px solid #F2B705"><?= $dm['trangthai'] ?></td>
                    <td class="d-flex justify-content-center">
                        <a href="<?=$base_url?>index.php?mod=admin&act=category_edit&id=<?= $dm['MaDM'] ?>"><i class="fa-solid fa-pen" style="color:#000000"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>