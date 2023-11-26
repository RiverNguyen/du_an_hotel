<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
  <div class="container">
    <div class="row">
      <h1>ADMIN</h1>
      <h5>Quản lí tiện ích</h5>
    </div>
  </div>
</div>

<div class="container my-5">
  <form action="index.php?act=addti" method="POST">
    <div class="space-y-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-full">
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tên tiện ích:</label>
          <input style="padding-left: 12px;" type="text" name="name" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên dịch vụ...">
        </div>
      </div>
    </div>

    <div class="space-y-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-full">
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Icon:</label>
          <input style="padding-left: 12px;" type="text" name="icon" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên dịch vụ...">
        </div>
      </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-full">
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Mô tả:</label>
          <div class="mt-2">
            <textarea style="padding: 12px;" placeholder="Nhập mô tả..." name="mota" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
      <a href="index.php?act=listti"><input class="text-sm font-semibold leading-6 text-gray-900" type="button" value="Danh sách"></a>
      <input type="submit" style="background-color: #aa8453; text-transform: none; font-family: inherit; letter-spacing: 0;" name="themmoi" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></input>
    </div>

  </form>
</div>