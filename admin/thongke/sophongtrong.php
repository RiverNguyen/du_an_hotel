<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Danh sách book khách sạn</h5>
        </div>
    </div>
</div>
<div style="margin: 20px 100px;" class="mt-5 table-responsive">
    <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center;">Tên loại phòng</th>
                <th style="text-align: center;">Giá</th>
                <th style="text-align: center;">Số lượng còn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phongtrong as $room) : ?>
                <?php
                extract($room);
                ?>
                <tr>
                    <td><?= $name ?></td>
                    <td><?= number_format($price, 0, ',', '.') ?>Đ</td>
                    <td><?= $soluong ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container my-5">
    <div>
    </div>
</div>
</div>
</div>
</div>