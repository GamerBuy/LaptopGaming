<div class="container mt-3">
<h3 class="text-center">Quản lý sản phẩm</h3>



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus fa-xl"></i></button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nhập thông tin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="themsp">
      <form action="<?=$base_url?>index.php?mod=admin&act=product" method="POST" enctype="multipart/form-data" >
      <div class="row">
     <div class="col">
     <label for="">Tên Sản phẩm:</label>
    <input type="text" name="TenSP" class="form-control" aria-label="Last name" required>
      </div>
     </div>
     <div class="row">
       <div class="col">  
       <label for="">Giá:</label>
       <input type="text" name="gia" class="form-control"  aria-label="First name" required>     
      </div>
     <div class="col">
     <label for="">Số lượng:</label>
    <input type="number" name="SoLuong" class="form-control"  aria-label="Last name" required>
      </div>
      <div class="mb-3">
      <label for="">Mã danh mục:</label>
         <select id="inputState" class="form-select" name="danhmuc" >
            <?php foreach ($category_list as $item):?>
                <option value="<?=$item['MaDM']?>"><?=$item['TenDM']?></option>
            <?php endforeach;?>
        </select>
      </div>
     <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Mô tả ngắn</label>
  <textarea class="form-control" name="motangan" id="exampleFormControlTextarea1" rows="3" required></textarea>
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Mô tả chi tiết</label>
  <textarea class="form-control" name="motachitiet" id="exampleFormControlTextarea1" rows="3" required></textarea>
</div>
     </div>
        <div class="mb-3">
  <label for="formFile" class="form-label">Hình ảnh:</label>
  <input class="form-control" name="HinhAnh" type="file" id="formFile" value="" required>
        </div>
        <div class="mb-3">
  <label for="formFile" class="form-label">Hình ảnh khác:</label>
  <input class="form-control" name="anhbosung[]" type="file" id="formFile" value="" multiple>
        </div>

        <button type="submit" name="submit"  class="btn btn-primary float-end">Upload</button>


        </form>
</div>

      </div>
      
    </div>
  </div>
</div>
    <table class="table table-hover me-5" style="border: 1px solid #F2B705">
        <thead>
            <th class="text-center">STT</th>
            <th class="text-center">Ảnh</th>
            <th class="text-center w-33">Tên SP</th>
            <th class="text-center">danh mục</th>

            <th class="text-center">Giá</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Lượt mua</th>
            <th class="text-center">Trạng Thái</th>
           
            <th></th>
           
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($list as $item):
                $i++;
            ?>
                <tr>
                    <td class="text-center"><?=$i?></td>
                    <td><img src="<?=$base_url?>/upload/product/<?=$item['HinhAnh']?>" alt="" class="rounded-3" style="width:50px"></td>
                    <td><?=$item['TenSP']?></td>
                    <td class="text-center"><?=$item['TenDM']?></td>
                    <td class="text-center"><?=$item['gia']?></td>
                    <td class="text-center"><?=$item['SoLuong']?></td>
                    <td class="text-center"><?=$item['MaSP']?></td>
                    <td style="padding-left: 85px;" ><?php
                    switch ($item['TrangThai']) {
                        case 'con-hang':
                            echo "Đang hoạt động";
                            break;
                        case 'het-hang':
                            echo "Ngưng hoạt động";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    ?></td>
                    <td><a href="<?=$base_url?>index.php?mod=admin&act=product-add&id=<?=$item['MaSP']?>" class="fa-solid fa-pen-to-square fa-xl"></a></td>
                  </tr>
                <?php endforeach ?>
        </tbody>
    </table>
</div>
<script>

</script>
