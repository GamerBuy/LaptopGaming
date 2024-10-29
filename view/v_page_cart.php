<div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1>Giỏ hàng</h1>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <table class="table text-center cart">
                <thead class="">
                    <tr>
                        <th>Ảnh</th>
                        <th class="text-start w-35">Tên Sản phẩm</th>
                        <Th class="text-center">Giá tiền</Th>
                        <Th class="text-start">Số lượng</Th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-start"></th>
                </tr>
                </thead>
                <tbody class="">
                    <?php foreach ($_SESSION['cart'] as $item):?>
                        <tr class="bg-cart-body">
                            <td class="radius-left-top-bottom"><img src="<?=$base_url?>/upload/product/<?=$item['HinhAnh']?>" alt="" class="rounded-3" style="width:50px">
                            </td>
                            <td>
                                <small class="cart-hidden-text text-start"><?=$item['TenSP']?></small>
                            </td>
                            <td class=""><span class="" id="price"><?=$item['gia']?></span> đ</td>
                            <td >
                                <div class="">
                                    <input type="number" min="1" value ="<?=$item['SoSanPham']?>" onkeydown="return false" class="form-control quantity-input" id="<?=$item['MaSP']?>" name="quantity" style="width: 10vh; height: 5vh;">
                                </div>
                            </td>
                            <td><span class="thanh-tien"><?=$item['gia'] * $item['SoSanPham']?></span> đ</td>
                            <td class="radius-right-top-bottom"><a href="<?=$base_url?>index.php?mod=page&act=deleteItemCart&id=<?=$item['MaSP']?>" class="fa-solid fa-trash fa-lg text-decoration-none text-danger"></a></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            <?php
                $tongTien = 0;
                foreach ($list as $item) {
                    $tongTien += $item['SoSanPham'] * $item['gia'];
                }
            ?>
            <div class="row">
                <strong class="col text-start" id="tong-tien">Tổng tiền: <span class="thanh-tien"><?=$tongTien?></span><span> đ</span></strong>
                <div class="col text-end"><Strong class="">Số lượng: <?=count($list)?></Strong></div>
            </div>
            <div class="row my-5">
                <div class="col-sm-1"></div>
                <div class="col-sm-11 text-end"><a href="<?=$base_url?>index.php?mod=page&act=home" class="btn btn-warning me-3">Tiếp tục mua hàng</a>
                    <a href="<?=$base_url?>index.php?mod=page&act=billInfo"  class="btn btn-warning">Đặt hàng</a>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
<script defer>
/*         var quantityInput = '';
        var updateBtn = "";
    function sendQuantity(id){
        quantityInput = document.getElementById('itemcart'+id);
        updateBtn = document.getElementById('btnCart'+id);
        var quantity = quantityInput.value;
        updateBtn.href = updateBtn.href +quantity;
    } */
    var quantityInputs = document.querySelectorAll(".quantity-input");
    function inputValuechange(){
        for (let index = 0; index < quantityInputs.length; index++) {
            var quantity = quantityInputs[index].value;
            var id =quantityInputs[index].id;
            $.ajax({
                type: "POST",
                url: "view/cart.php",
                data: {
                    quantity: quantity, id: id
                    // Add more key-value pairs as needed
                },
                success: function(response) {
                    // Handle the successful response here
                    console.log(response);
                },
                error: function(error) {
                    // Handle the error here
                    console.log(error);
                }
            });
        }
    }
    quantityInputs.forEach(function (input) {
    input.addEventListener("input", inputValuechange);
    });
    var thanhTien = document.querySelectorAll(".thanh-tien");
    var prices = document.querySelectorAll("#price");
    var TongTien = document.getElementById("tong-tien");
    TongTien.innerText = TongTien.innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    for (let index = 0; index < thanhTien.length; index++) {
        prices[index].innerText = prices[index].innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        thanhTien[index].innerText = thanhTien[index].innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        
    }
    function tinhthanhtien(event){
    var prices = document.querySelectorAll("#price");
    var quantitys = document.querySelectorAll(".quantity-input");
    console.log(prices);
    console.log(quantitys);
    for (let index = 0; index < prices.length; index++) {
        var priceString = prices[index].innerText;
        var priceWithoutCurrency = priceString.replace(/[đ.]/g, '');
        var priceAsNumber = parseInt(priceWithoutCurrency);
        var quantityAsNumber = parseInt(quantitys[index].value);
        console.log(priceAsNumber);
        console.log( quantityAsNumber);
        thanhTien[index].innerText = priceAsNumber *  quantityAsNumber;
        thanhTien[index].innerText = thanhTien[index].innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        console.log(thanhTien.innerText);
    }
    }
    quantityInputs.forEach(function (input) {
    input.addEventListener("input", tinhthanhtien);
    });
</script>