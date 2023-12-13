<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>The BGV Luxury Hotel</h1>
            <h5>Hoá đơn của tôi</h5>
        </div>
    </div>
</div>

<div style="margin: 20px 100px;" class="mt-5 table-responsive">
    <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center;">Mã đặt phòng</th>
                <th style="text-align: center;">Tên loại phòng</th>
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Check in</th>
                <th style="text-align: center;">Check out</th>
                <th style="text-align: center;">Ngày đặt</th>
                <th style="text-align: center;">PTTT</th>
                <th style="text-align: center;">Tình trạng</th>
                <th style="text-align: center;">Tổng tiền</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            if (is_array($listBill)) : ?>
                <?php foreach ($listBill as $bill) : ?>
                    <?php
                    extract($bill);
                    $delMyBill = "index.php?act=delmy-bill&id=" . $bill['id'];
                    $modalId = "exampleModal" . $bill['id'];
                    $ttdh = get_ttdh1($bill['trangthai']);
                    $total += $bill['thanhtien'];
                    ?>
                    <tr>
                        <td>Hotel - <?= $bill['id'] ?></td>
                        <td><?= $bill['name'] ?> </td>
                        <td><?= $bill['soluong'] ?> </td>
                        <td><?= $bill['checkin'] ?> </td>
                        <td><?= $bill['checkout'] ?> </td>
                        <td><?= $bill['daybook'] ?> </td>
                        <td><?= $bill['pttt'] ?> </td>
                        <td class="bold"><?= $ttdh ?> </td>
                        <td class="bold text-danger"><?= number_format($bill['thanhtien'], 0, ',', '.')  ?> Đ</td>
                        <td>
                            <?php if ($bill['trangthai'] == 0) : ?>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                                    Huỷ đặt phòng
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Huỷ đơn đặt</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có muốn huỷ đơn đặt?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                                <a href="<?= $delMyBill ?>"><button type="button" class="btn btn-danger">Huỷ</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>

                    <?php elseif ($bill['trangthai'] == 1) : ?>
                        Vui lòng đợi!
                    <?php else : ?>
                        <button type="button" class="btn btn-primary">
                            Đã thanh toán!
                        </button>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <label style="font-size: 24px;" class="block text-sm leading-6 text-gray-900 mb-3">Tổng số tiền là: <label class="text-danger bold"><?= number_format($total, 0, ',', '.') ?> Đ</label></label>
        </tbody>
    </table>
</div>