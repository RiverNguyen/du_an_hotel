<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Quản lí phòng</h5>
        </div>
    </div>
</div>

<div class="container my-5">
    <form method="post" enctype="multipart/form-data" action="index.php?act=addp">
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Loại phòng:</label>
                    <div class="mt-2">
                        <select style="padding-left: 12px; padding-right: 12px; height: 36px;" name="idlp" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <?php foreach ($dsloaiphong as $loaiphong) : ?>
                                <?php extract($loaiphong); ?>
                                <option value="<?= $id ?>"><?= $name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tên phòng:</label>
                    <input style="padding-left: 12px;" type="text" name="name" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Ảnh:</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 justify-center flex text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <input style="padding-left: 12px;" id="file-upload" name="file-upload" type="file" class="sr-only">
                                    <input type="file" name="img" id="image" class="hidden">
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Giá:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px;" type="text" name="price" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Người lớn:</label>
                    <div class="mt-2">
                        <select style="padding-left: 12px; padding-right: 12px; height: 36px;" name="idnl" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <?php foreach ($listnguoilon as $nguoilon) : ?>
                                <?php extract($nguoilon); ?>
                                <option value="<?= $id ?>"><?= $soluong ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Trẻ em:</label>
                    <div class="mt-2">
                        <select style="padding-left: 12px; padding-right: 12px; height: 36px;" name="idte" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <?php foreach ($listtreem as $treem) : ?>
                                <?php extract($treem); ?>
                                <option value="<?= $id ?>"><?= $soluong ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Check In:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px; padding-right: 12px;" type="date" name="checkin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Check Out:</label>
                    <div class="mt-2">
                        <input style="padding-left: 12px; padding-right: 12px;" name="checkout" type="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" pattern="\d{1,2}/\d{1,2}/\d{4}">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Mô tả:</label>
                    <div class="mt-2">
                        <textarea style="padding: 12px;" id="about" name="mota" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
            <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Nhập lại</button>
            <a href="index.php?act=listp"><input class="text-sm font-semibold leading-6 text-gray-900" type="button" value="Danh sách"></a>
            <input type="submit" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0;" name="themmoi" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
        </div>
    </form>
</div>