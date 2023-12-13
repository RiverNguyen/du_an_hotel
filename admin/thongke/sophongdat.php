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
                <th style="text-align: center;">Mã đơn hàng</th>
                <th style="text-align: center;">Mã phòng</th>
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Tên người đặt</th>
                <th style="text-align: center;">Địa chỉ</th>
                <th style="text-align: center;">Số điện thoại</th>
                <th style="text-align: center;">Check in</th>
                <th style="text-align: center;">Check out</th>
                <th style="text-align: center;">Ngày đặt</th>
                <th style="text-align: center;">Phương thức</th>
                <th style="text-align: center;">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalAmount = 0;

            foreach ($phongdat as $room) :
                extract($room);
                $modalId = "exampleModal" . $id;
                $ttdh = get_ttdh($room['trangthai']);

                $totalAmount += $room['thanhtien'];
            ?>
                <tr>
                    <td>Hotel - <?= $room['id'] ?></td>
                    <td><?= $room['idp'] ?> </td>
                    <td><?= $room['soluong'] ?> </td>
                    <td><?= $room['bill_name'] ?> </td>
                    <td><?= $room['bill_address'] ?> </td>
                    <td><?= $room['bill_tel'] ?> </td>
                    <td><?= $room['checkin'] ?> </td>
                    <td><?= $room['checkout'] ?> </td>
                    <td><?= $room['daybook'] ?> </td>
                    <td><?= $pttt ?> </td>
                    <td class="bold text-danger"><?= number_format($room['thanhtien'], 0, ',', '.') ?> Đ</td>
                </tr>
            <?php endforeach; ?>
            <label style="font-size: 24px;" class="text-danger bold block text-sm leading-6 text-gray-900 mb-3">Tổng số tiền là: <label class="bold"><?= number_format($totalAmount, 0, ',', '.') ?> Đ</label></label>
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