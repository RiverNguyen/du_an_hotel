<html>

<head>
    <style>
        .chart-container {
            display: inline-block;
            margin-right: 20px;
        }

        .chart-wrapper {
            text-align: center;
        }
    </style>

    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
        <div class="container">
            <div class="row">
                <h1>ADMIN</h1>
                <h5>Biểu đồ thống kê</h5>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart", "bar"]
        });
        google.charts.setOnLoadCallback(draw1);
        google.charts.setOnLoadCallback(draw2);
        google.charts.setOnLoadCallback(draw3);
        google.charts.setOnLoadCallback(draw4);

        function draw1() {
            var data = google.visualization.arrayToDataTable([
                ['Loại phòng', 'Số lượng'],
                <?php foreach ($dsthongke as $thongke) : ?>
                    <?php extract($thongke); ?>['<?= $name ?>', <?= $soluong ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'BIỂU ĐỒ SỐ LƯỢNG PHÒNG THEO LOẠI PHÒNG',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_1'));
            chart.draw(data, options);
        }

        function draw2() {
            var data2 = google.visualization.arrayToDataTable([
                ['Loại phòng', 'Số lượng phòng', 'Số lượng đặt'],
                <?php foreach ($dsthongke2 as $tk) : ?>
                    <?php extract($tk); ?>['<?= $loaiphong ?>', <?= $soluong ?>, <?= $dadat ?>],
                <?php endforeach; ?>
            ]);

            var options2 = {
                title: 'Biểu đồ về phòng',
                vAxis: {
                    title: 'Số lượng'
                },
                hAxis: {
                    title: 'Phòng'
                },
                seriesType: 'bars',
                series: {
                    0: {
                        type: 'bars'
                    },
                    1: {
                        type: 'bars'
                    },
                    2: {
                        type: 'bars'
                    },
                    3: {
                        type: 'line'
                    }
                }
            };

            var chart2 = new google.visualization.ComboChart(document.getElementById('chart_div_2'));
            chart2.draw(data2, options2);
        }

        function draw3() {
            var data3 = google.visualization.arrayToDataTable([
                ['Loại phòng', 'Tiền phòng', 'Tổng tiền phòng kiếm được'],
                <?php foreach ($dsthongke3 as $tk1) : ?>
                    <?php extract($tk1); ?>['<?= $name ?>', <?= $price ?>, <?= $tongtien ?>],
                <?php endforeach; ?>
            ]);

            var options3 = {
                chart: {
                    title: 'Tổng tiền kiếm được theo loại phòng'
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart3 = new google.charts.Bar(document.getElementById('barchart_material'));
            chart3.draw(data3, google.charts.Bar.convertOptions(options3));
        }

        function draw4() {
            var data = google.visualization.arrayToDataTable([
                ['Tên phòng', 'Số bình luận'],
                <?php foreach ($dsthongke4 as $thongke4) : ?>
                    <?php extract($thongke4); ?>['<?= $name ?>', <?= $soluong ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'BIỂU ĐỒ SỐ LƯỢNG BÌNH LUẬN',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="chart-wrapper">
        <div class="chart-container" id="piechart_3d_1" style="width: 600px; height: 400px;"></div>
        <div class="chart-container" id="chart_div_2" style="width: 600px; height: 400px;"></div>
        <div class="chart-container" id="barchart_material" style="width: 600px; height: 400px;"></div>
        <div class="chart-container" id="piechart_3d_2" style="width: 600px; height: 400px;"></div>
    </div>
</body>

</html>