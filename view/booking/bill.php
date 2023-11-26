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
    <form method="post" action="index.php?act=billconfirm">
        <?php
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

        if(isset($_SESSION['my-booking'])) {
            $checkin = $_SESSION['my-booking'][0][4];
            $checkout = $_SESSION['my-booking'][0][5];
            $idp = $_SESSION['my-booking'][0][0];
        }
        ?>
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Người đặt phòng:</label>
                    <input style="padding-left: 12px;" value="<?= $name ?>" type="text" name="name" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
            
                    <input style="padding-left: 12px;" value="<?= $idp ?>" type="hidden" name="idp" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Email:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" value="<?= $email ?>" name="email" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Địa chỉ:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" value="<?= $address ?>" name="address" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" value="<?= $tel ?>" name="tel" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày nhận phòng:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" value="<?= $checkin ?>" name="checkin" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày trả phòng:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" value="<?= $checkout ?>" name="checkout" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            

        </div>
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php view_booking(0); ?>
                    </div>
                </div>
            </div>
        </section>
        <input type="submit" name="confirm" value="Thanh toán" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0; margin-top: -100px;" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
    </form>
</div>