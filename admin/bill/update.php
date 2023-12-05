<?php
if (is_array($book)) {
    extract($book);
}
?>

<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Quản lí đơn đặt</h5>
        </div>
    </div>
</div>

<div class="container my-5">
    <form action="index.php?act=update-bill" method="POST">
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Mã đơn đặt</label>
                    <input style="padding-left: 12px;" type="text" name="id" id="" value="<?= $id ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên dịch vụ...">
                </div>
            </div>
        </div>

        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tình trạng:</label>
                    <input style="padding-left: 12px;" type="text" name="tinhtrang" value="<?= $trangthai ?>" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên dịch vụ...">
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <input type="hidden" name="id" value="<?= (isset($id) && $id > 0) ? $id : "" ?>">
            <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Nhập lại</button>
            <a href="index.php?act=list-bill"><input class="text-sm font-semibold leading-6 text-gray-900" type="button" value="Danh sách"></a>
            <input type="submit" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0;" name="capnhat" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
        </div>

    </form>
</div>