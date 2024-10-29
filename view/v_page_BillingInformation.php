<div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="mt-5 my-4">Thông tin thanh toán</h1>
            <form action="" id="myForm" method="post">
            <div class="row">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên người nhận:</label>
                        <input type="text" class="form-control border border-2 border-warning" id="exampleFormControlInput1" name="fullName" value="<?=$_SESSION['user']['HoTen']?>" placeholder="họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control  border border-2 border-warning" id="exampleFormControlInput1" name="phone" value="<?=$_SESSION['user']['SoDienThoai']?>" placeholder="Số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control  border border-2 border-warning" id="exampleFormControlInput1" name="email" value="<?=$_SESSION['user']['email']?>" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control  border border-2 border-warning" id="exampleFormControlInput1" name="diachi" value="<?=$_SESSION['user']['DiaChi']?>" placeholder="Địa chỉ">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Lưu thông tin cho lần thanh toán sau
                        </label>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <div class="overflow-auto" style="width: 100%; height: 110px;">
                    <?php $tongtien = 0; foreach ($list as $item):?>
                        <div class="row w-100">
                            <div class="col-sm-2">
                                <img src="<?=$base_url?>/upload/product/<?=$item['HinhAnh']?>" alt="" class="rounded-3" style="width:50px">
                            </div>
                            <div class="col-sm-6">
                                <small class="hidden-text-1-line text-start mt-2" style="height:20px;"><?=$item['TenSP']?></small>
                            </div>
                            <div class="col-sm-1 mt-1">
                            <small class="text-start" style="height:20px;">X<?=$item['SoSanPham']?></small>
                            </div>
                            <div class="col-sm-3">
                                <small class="hidden-text-1-line text-start text-end mt-2 bill-price-product" style="height:20px;"><?=$item['gia']?>đ</small>
                            </div>
                        </div>
                    <?php $tongtien += $item['gia']*$item['SoSanPham']; endforeach;?>
                    </div>
                    <div class="row mt-3" >
                        <div class="col-sm-3">Tổng tiền:</div>
                        <div class="col-sm-9 text-end"><span class="text-end" id="bill-tt"><?=$tongtien?></span><span class="text-end">đ</span></div>
                        <div><hr class="" style="width: 95%;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Shipping:</div>
                        <div class="col-sm-9 text-end"><span class="text-end" id="bill-ship">10000</span><span class="text-end">đ</span></div>
                        <div><hr class="" style="width: 95%;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">Thành tiền:</div>
                        <div class="col-sm-9 text-end"><span class="text-end" id="bill-thanhtien"><?=$tongtien + 10000?></span><span class="text-end">đ</span></div>
                        <div><hr class="" style="width: 95%;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Thanh toán bằng thẻ
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <img src="../upload/icon/visa.png" alt="" class="rounded-3" style="width:30px">
                            <img src="../upload/icon/master.png" alt="" class="rounded-3" style="width:30px">
                            <img src="../upload/icon/napas.png" alt="" class="rounded-3" style="width:30px">
                        </div>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                Thanh toán tiền mặt
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="dat_hang('<?=$base_url?>');" id="btn-DatHang" class="btn btn-warning mt-4 px-4 py-2 fw-medium">Đặt hàng</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <script>
        function dat_hang(url){
            document.getElementById("btn-DatHang").addEventListener('click', function() {
                console.log("ok");
                var flexRadioDefault1 =document.getElementById("flexRadioDefault1");
                var flexRadioDefault2 =document.getElementById("flexRadioDefault2");
                var myForm = document.getElementById("myForm");
                var url = "";
                if(flexRadioDefault1.checked == true){
                    url = "index.php?mod=page&act=pay";
                    myForm.action = url;
                    myForm.submit();
                }
            });
        }
        var billTotal = document.getElementById("bill-tt");
        var billShip = document.getElementById("bill-ship");
        var billThanhtien = document.getElementById("bill-thanhtien");
        var billPriceProduct = document.querySelectorAll(".bill-price-product");
        billTotal.innerText = billTotal.innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        billShip.innerText = billShip.innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        billThanhtien.innerText = billThanhtien.innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        for (let index = 0; index < billPriceProduct.length; index++) {
            console.log(billPriceProduct[index].innerText);
            billPriceProduct[index].innerText = billPriceProduct[index].innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            
        }
    </script>