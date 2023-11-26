<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>Cảm ơn quý khách</h1>
            <h5>Hihi</h5>
        </div>
    </div>
</div>
<?php
if (isset($bill) && is_array($bill)) {
    extract($bill);
}
?>
<div class="container my-5">
    <div class="space-y-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-full">
                <h3>Mã đơn hàng: <?= $bill['id']; ?></h3>
                <label>Ngày đặt lịch: <?= $bill['daybook'] ?></label>
            </div>
        </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-full">
                <label>Người đặt lịch: <?= $bill['bill_name']; ?></label>
            </div>

            <div class="sm:col-span-full">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Địa chỉ: <?= $bill['bill_address']; ?></label>
            </div>

            <div class="sm:col-span-full">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại: <?= $bill['bill_tel']; ?></label>

            </div>

            <div class="sm:col-span-full">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày nhận phòng: <?= date("d/m/Y", strtotime($bill['checkin'])); ?></label>

            </div>

            <div class="sm:col-span-full">
                <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày trả phòng: <?= date("d/m/Y", strtotime($bill['checkout'])) ?></label>

            </div>
        </div>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                show_booking_detail($bill_detail);
                ?>
            </div>
        </div>
    </div>
</section>