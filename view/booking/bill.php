<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>The BGV Luxury Hotel</h1>
            <h5>Thanh toán hoá đơn</h5>
        </div>
    </div>
</div>

<div class="container my-5">
    <form onsubmit="return validateForm()" method="post" action="index.php?act=billconfirm">
        <?php
        $tong = 0;
        $soluong = 0;
        if (isset($_SESSION['user'])) {
            $name = $_SESSION['user']['name'];
            $email = $_SESSION['user']['email'];
            $address = $_SESSION['user']['address'];
            $tel = $_SESSION['user']['tel'];
        } else {
            $name = "";
            $email = "";
            $address = "";
            $tel = "";
        }

        if (isset($_SESSION['my-booking']) && is_array($_SESSION['my-booking']) && count($_SESSION['my-booking']) > 0) {
            $checkin = $_SESSION['my-booking'][0][4];
            $checkout = $_SESSION['my-booking'][0][5];
            $tongtien = $_SESSION['my-booking'][0][8];
            $idp = $_SESSION['my-booking'][0][0];
            foreach ($_SESSION['my-booking'] as $book) {
                $id = $book[0];
                $ci = $book[4];
                $co = $book[5];
                if (isset($book[8])) {
                    $tong += (floor((strtotime($co) - strtotime($ci)) / (60 * 60 * 24)) * $book[3] * $_SESSION['soluong'][$id]);
                }
                if (isset($_SESSION['soluong'][$id])) {
                    $soluong += $_SESSION['soluong'][$id];
                }
            }
        } else {
            $thongbao = "Mời bạn đặt phòng trước";
            $so = "";
            $checkin = "";
            $checkout = "";
            $tongtien = "";
            $idp = "";
        }
        ?>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <input style="padding-left: 12px;" value="<?= $idp ?>" type="hidden" name="idp" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Họ và tên:</label>
                        <div class="mt-2">
                            <input style="padding-left: 12px;" type="text" value="<?= $name ?>" name="name" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Email:</label>
                        <div class="mt-2">
                            <input style="padding-left: 12px;" type="text" value="<?= $email ?>" name="email" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Địa chỉ:</label>
                        <div class="mt-2">
                            <input style="padding-left: 12px;" type="text" value="<?= $address ?>" name="address" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại:</label>
                        <div class="mt-2">
                            <input style="padding-left: 12px;" type="text" value="<?= $tel ?>" name="tel" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <br>

                <?php if ($tong > 0 && $soluong > 0) : ?>
                    <h1 class="text-danger" style="font-size: 24px;">Tổng số tiền: <?= number_format($tong, 0, ',', '.') ?> Đ</h1>
                    <h1 class="text-danger" style="font-size: 24px;">Tổng số phòng: <?= number_format($soluong, 0, ',', '.') ?></h1>
                <?php endif; ?>
                <br>
                <br>
                <div class="d-flex justify-content-between">
                    <div style="display: inline-block; text-align: left;">
                        <a style="" href="index.php?act=list-room"><input type="button" name="" value="Tiếp tục đặt phòng" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0; margin-top: -100px;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input></a>
                        <input type="submit" name="update" value="Cập nhật" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0; margin-top: -100px;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input></a>
                    </div>
                    <div style="display: inline-block; text-align: right;">
                        <input type="submit" name="confirm" value="Thanh toán" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0; margin-top: -100px;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <input type="submit" name="redirect" value="VNPay" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0; margin-top: -100px;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    </div>
                </div>
                <h1><?php (isset($thongbao)) ? $thongbao : "" ?></h1>
            </div>
        </div>
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php view_booking(1); ?>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <br>
</div>
</div>

<script>
    function validateForm() {
        // Check if there are booked rooms
        var hasBookedRooms = <?php echo isset($_SESSION['my-booking']) && is_array($_SESSION['my-booking']) && count($_SESSION['my-booking']) > 0 ? 'true' : 'false'; ?>;

        if (!hasBookedRooms) {
            alert('Vui lòng đặt phòng trước khi thanh toán.');
            return false;
        }

        // Additional validation logic if needed

        return true;
    }
</script>