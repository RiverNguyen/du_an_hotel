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
                <th style="text-align: center;">Tên phòng</th>
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Tên người đặt</th>
                <th style="text-align: center;">Địa chỉ</th>
                <th style="text-align: center;">Số điện thoại</th>
                <th style="text-align: center;">Check in</th>
                <th style="text-align: center;">Check out</th>
                <th style="text-align: center;">Ngày đặt</th>
                <th style="text-align: center;">Phương thức</th>
                <th style="text-align: center;">Tình trạng</th>
                <th style="text-align: center;">Tổng tiền</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listBill as $bill) : ?>
                <?php
                extract($bill);
                $modalId = "exampleModal" . $id;
                $ttdh = get_ttdh($bill['trangthai']);
                ?>
                <tr>
                    <td>Hotel - <?= $bill['id'] ?></td>
                    <td><?= $bill['name'] ?> </td>
                    <td><?= $bill['soluong'] ?> </td>
                    <td><?= $bill['bill_name'] ?> </td>
                    <td><?= $bill['bill_address'] ?> </td>
                    <td><?= $bill['bill_tel'] ?> </td>
                    <td><?= date("d/m/Y", strtotime($bill['checkin'])) ?> </td>
                    <td><?= date("d/m/Y", strtotime($bill['checkout'])) ?> </td>
                    <td><?= $bill['daybook'] ?> </td>
                    <td><?= $pttt ?> </td>
                    <form action="index.php?act=update-bill" method="post">
                        <td>
                            <input type="hidden" name="soluong" value="<?= $bill['soluong'] ?>">
                            <input type="hidden" name="idp" value="<?= $bill['idp'] ?>">
                            <input type="hidden" name="id" value="<?= $bill['id'] ?>">
                            <select class="custom-select bold <?= 'option-' . $bill['trangthai'] ?>" name="tinhtrang" id="">
                                <?php
                                $trangthai_options = ['0', '1', '2', '3'];
                                foreach ($trangthai_options as $option) :
                                    $ttdh = get_ttdh($option);
                                ?>
                                    <option class="bold" value="<?= $option ?>" <?= ($option == $bill['trangthai']) ? 'selected' : '' ?> class="<?= 'option-' . $option ?>">
                                        <?= $ttdh ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td class="bold text-danger"><?= number_format($bill['thanhtien'], 0, ',', '.') ?> Đ</td>
                        <td>
                            <input style="color: #fff; background-color: #0d6efd; letter-spacing: 0;" type="submit" value="Lưu" name="capnhat" class="btn btn-primary">
                        </td>
                    </form>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            order: [
                [0, 'desc']
            ]
        });
    });
</script>