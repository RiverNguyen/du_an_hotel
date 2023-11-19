<?php
if (is_array($dv)) {
    extract($dv);
}
?>
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Cập nhật dịch vụ</h5>
        </div>
    </div>
</div>

<div class="container my-5">
    <form action="index.php?act=updatedv" method="POST">
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tên dịch vụ:</label>
                    <input value="<?php if (isset($name) && ($name != "")) echo $name ?>" style="padding-left: 12px;" type="text" name="name" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên loại phòng...">
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Giá:</label>
                    <div class="mt-2">
                        <input value="<?php if (isset($gia) && ($gia != "")) echo $gia ?>" style="padding-left: 12px;" type="text" name="gia" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập giá...">
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Mô tả:</label>
                    <div class="mt-2">
                        <textarea style="padding: 12px;" placeholder="Nhập mô tả..." name="mota" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $mota ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div class="text-danger bold">
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </div>
            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id ?>">
            <input type="submit" value="Lưu" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0;" name="capnhat" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
        </div>

    </form>
</div>