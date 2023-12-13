<?php
if (is_array($acc)) {
    extract($acc);
}

?>
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Cập nhật tài khoản</h5>
        </div>
    </div>
</div>

<div class="container my-5">
    <form method="post" action="index.php?act=update-account">
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tài khoản:</label>
                    <input style="padding-left: 12px;" value="<?= $user ?>" type="text" name="user" id="user" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu:</label>
                    <input style="padding-left: 12px;" value="<?= $pass ?>" type="text" name="pass" id="pass" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Số điện thoại:</label>
                    <input style="padding-left: 12px;" value="<?= $tel ?>" type="text" name="tel" id="tel" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        <div style="padding: 0;" class="border-gray-900/10 pb-12">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Họ tên:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" value="<?= $name ?>" type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Email:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" value="<?= $email ?>" type="text" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>

        <div style="padding: 0;" class="border-gray-900/10 pb-12">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Địa chỉ:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" value="<?= $address ?>" type="text" name="address" id="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Cấp quyền:</label>
                    <div class="mt-2">
                        <select style="padding-left: 12px; padding-right: 12px; height: 42px;" name="role" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="0" <?= ($role == 0) ? 'selected' : '' ?>>User</option>
                            <option value="1" <?= ($role == 1) ? 'selected' : '' ?>>Admin</option>
                            <option value="2" <?= ($role == 2) ? 'selected' : '' ?>>Kế Toán</option>
                            <option value="3" <?= ($role == 3) ? 'selected' : '' ?>>Nhân viên</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Nhập lại</button>
            <a href="index.php?act=listp"><input class="text-sm font-semibold leading-6 text-gray-900" type="button" value="Danh sách"></a>
            <input type="submit" value="Lưu" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0;" name="capnhat" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
        </div>
    </form>
</div>