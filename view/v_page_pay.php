<div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="mt-5 mb-4">Thanh toán</h1>
            <form action="stripe_payment.php" method="POST" name="cardpayment" id="payment-form">
            <div class="row">
                <div class="col-sm-5 mt-2">
                    <div class="row  border border-warning border-1 shadow-right-bottom">
                        <h3 class="text-center">Thông tin đơn hàng</h3>
                        <strong>Mã đơn hàng:</strong>
                        <p><?=$hoaDon['MaHD']?></p>
                        <strong>Mô tả:</strong>
                        <p>Thanh toán hóa đơn: 0<?=$hoaDon['MaHD']?></p>
                        <strong>Số tiền:</strong>
                        <div class="mb-2"><span id="bill-tt"><?=$hoaDon['TongTien']?></span><span> đ</span></div>
                    </div>
                    <div class="row border mt-2 bg-yellow-light" style="width: 80%; margin-left: 10%; margin-right: 10%;">
                        <h5 class="text-center fw-bold" style="color: #D9A507;">Đơn hàng sẽ hết hạn sau:</h5>
                        <div class="d-flex justify-content-center mt-2">
                            <div class="me-2 mb-4 px-3 py-3" style="border: 2px solid #F2B705; border-radius: 10px;"><span id="minutes">20</span> <span>phút</span></div>
                            <div class="me-2 mb-4 px-3 py-3" style="border: 2px solid #F2B705; border-radius: 10px;"><span id="seconds">00</span> <span>giây</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6 mt-2">
                    <div class="row border border-warning border-1 shadow-right-bottom">
                        <h3 class="text-center mb-4">Nhập thông tin để thanh toán</h3>
                        <div class="row mb-2">
                            <div class="border border-secondary rounded mx-2 active-pay" style="width:70px"><img src="<?=$base_url?>/upload/icon/napas.png" alt="" class="rounded-3" style="width:100%"></div>
                            <div class="border border-secondary rounded mx-2" style="width:70px"><img src="<?=$base_url?>/upload/icon/visa.png" alt="" class="rounded-3" style="width:100%"></div>
                            <div class="border border-secondary rounded mx-2" style="width:70px"><img src="<?=$base_url?>/upload/icon/masterremovebg-preview.png" alt="" class="rounded-3 pt-2" style="width:100%"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Số thẻ:</label>
                                <input type="text" class="form-control" name="card_number" id="card_number" placeholder="Mã thẻ" autocomplete="cc-number" maxlength="16" data-stripe="number" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Tên chủ thẻ:</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên chủ thẻ">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-3">
                                <label for="cardExpiry"><span class="">Tháng:</span></label>
                                <select name="card_exp_month" id="card_exp_month" class="form-control mt-2" data-stripe="exp_month" required>
                                    <option>Tháng</option>
                                    <option value="01">01 ( JAN )</option>
                                    <option value="02">02 ( FEB )</option>
                                    <option value="03">03 ( MAR )</option>
                                    <option value="04">04 ( APR )</option>
                                    <option value="05">05 ( MAY )</option>
                                    <option value="06">06 ( JUN )</option>
                                    <option value="07">07 ( JUL )</option>
                                    <option value="08">08 ( AUG )</option>
                                    <option value="09">09 ( SEP )</option>
                                    <option value="10">10 ( OCT )</option>
                                    <option value="11">11 ( NOV )</option>
                                    <option value="12">12 ( DEC )</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="cardExpiry"><span class="">Năm:</span></label>
                                <select name="card_exp_year" id="card_exp_year" class="form-control mt-2" data-stripe="exp_year" required>
                                    <option>Năm</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                    <option value="22">2022</option>
                                    <option value="23">2023</option>
                                    <option value="24">2024</option>
                                    <option value="25">2025</option>
                                    <option value="26">2026</option>
                                    <option value="27">2027</option>
                                    <option value="28">2028</option>
                                    <option value="29">2029</option>
                                    <option value="30">2030</option>
                                    <option value="31">2031</option>
                                    <option value="32">2032</option>
                                    <option value="33">2033</option>
                                    <option value="34">2034</option>
                                    <option value="35">2035</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="cardCVC">CCV:</label>
                                <input type="password" class="form-control mt-2" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-4 px-4 py-2 fw-medium" type="submit" id="payBtn">Thanh toán</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <script src="https://js.stripe.com/v2/"></script>
    <script src="js/jquery.min.js"></script>
<script>
            // Set your publishable key
            Stripe.setPublishableKey('pk_test_51ODiIaIgCYKblydjGVSsE430jL6AETNnd0QZOxC0OcmS3UFLfU91fZQrTuIajTq2Hc6t0rvTnavSNTq1fmDKl3oP00aKccaKre');
        // Callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // Enable the submit button
                $('#payBtn').removeAttr("disabled");
                // Display the errors on the form
                $(".payment-status").html('<p>'+response.error.message+'</p>');
            } else {
                var form$ = $("#payment-form");
                // Get token id
                var token = response.id;
                // Insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // Submit form to the server
                form$.get(0).submit();
            }
        }

        $(document).ready(function() {
            // On form submit
            console.log('OK');
            $("#payment-form").submit(function() {
                // Disable the submit button to prevent repeated clicks
                $('#payBtn').attr("disabled", "disabled");
                
                // Create single-use token to charge the user
                Stripe.createToken({
                    number: $('#card_number').val(),
                    exp_month: $('#card_exp_month').val(),
                    exp_year: $('#card_exp_year').val(),
                    cvc: $('#card_cvc').val()
                }, stripeResponseHandler);
                
                // Submit from callback
                return false;
            });
        });
    var billTotal = document.getElementById("bill-tt");
    var countdownMinutes = 20;
    var countdownSeconds = 0;

    var minutesElement = document.getElementById('minutes');
    var secondsElement = document.getElementById('seconds');
    billTotal.innerText = billTotal.innerText.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    function updateCountdown() {
        minutesElement.innerHTML = formatTime(countdownMinutes);
        secondsElement.innerHTML = formatTime(countdownSeconds);

        if (countdownSeconds > 0) {
            countdownSeconds--;
        } else if (countdownMinutes > 0) {
            countdownMinutes--;
            countdownSeconds = 59;
        } else {
            clearInterval(timer);
            minutesElement.innerHTML = '00';
            secondsElement.innerHTML = '00';
        }
    }

    function formatTime(time) {
        return time < 10 ? '0' + time : time;
    }

    var timer = setInterval(updateCountdown, 1000);

    updateCountdown();
    function chuyentrang() {
            // Thực hiện chuyển trang ở đây
            alert("Hết thời gian thanh toán");
            window.location.href = 'index.php?mod=page&act=act';
        }

        // Lập lịch chạy hàm chuyentrang() sau 20 phút
        setTimeout(chuyentrang, 20 * 60 * 1000);
</script>