<style>
    table {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid #F2B705;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
</style>

<div class="container mt-3">
    <h3 class="text-center">Tổng quan</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="card-text-primary">
                <div class="card-body" style="box-shadow: 3px 3px 3px 3px #F2B705">
                    <h5 class="card-title">
                        Tổng sản phẩm
                    </h5>
                    <p class="card-text fs-1 text-center"><?= $tongsp ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-text-primary">
                <div class="card-body" style="box-shadow: 3px 3px 3px 3px #F2B705">
                    <h5 class="card-title">
                        Tổng danh mục
                    </h5>
                    <p class="card-text fs-1 text-center"><?= $tongdm ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-text-primary">
                <div class="card-body" style="box-shadow: 3px 3px 3px 3px #F2B705">
                    <h5 class="card-title">
                        Tổng tài khoản
                    </h5>
                    <p class="card-text fs-1 text-center"><?= $tongtk ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-text-primary">
                <div class="card-body " style="box-shadow: 3px 3px 3px 3px #F2B705">
                    <h5 class="card-title">
                        Tổng đơn hàng
                    </h5>
                    <p class="card-text fs-1 text-center"><?= $tongbill ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top:30px">
    <div class="col-md-6">
        <div class="card">
            <div id="myChart" style="height:400px"></div>
        </div>
    </div>

</div>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Your Function
    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng'],
            <?php foreach ($tongthongke as $tk) {
                echo "['" . $tk['TenDM'] . "'," . $tk['SoLuong'] . "],";
            } ?>
        ]);

        // Set Options
        const options = {
            title: 'Thống kê số lượng sản phẩm trong danh mục'
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>