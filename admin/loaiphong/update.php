<?php
if (isset($lp) && is_array($lp)) {
  extract($lp);
}

$imgpath = "../img/type-of-room/" . $img;
if (is_file($imgpath)) {
  $hinh = "<img src='" . $imgpath . "' style='height: 160px; width: 120px; margin: auto;'>";
} else {
  $hinh = "no photo";
}
?>
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
  <div class="container">
    <div class="row">
      <h1>ADMIN</h1>
      <h5>Cập nhật loại phòng</h5>
    </div>
  </div>
</div>

<div class="container my-5">
  <form action="index.php?act=updatelp" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <input type="hidden" name="current_img" value="<?= $img ?>">
    <div class="space-y-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-full">
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Tên loại phòng:</label>
          <input value="<?= $name ?>" style="padding-left: 12px;" type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nhập tên loại phòng...">
        </div>
      </div>
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
              <?= $hinh ?>
            </label>
          </div>

        </div>
      </div>
    </div>
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-full">
          <label for="" class="block text-sm font-medium leading-6 text-gray-900">Giá:</label>
          <div class="mt-2">
            <input style="padding-left: 12px;" value="<?= $price ?>" type="text" name="price" id="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Người lớn:</label>
          <div class="mt-2">
            <select style="padding-left: 12px; padding-right: 12px; height: 36px;" name="idnl" id="idnl" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php foreach ($listnguoilon as $nguoilon) : ?>
                <?php if ($idnl == $nguoilon['id']) $s = "selected";
                else $s = ""; ?>
                <option value="<?= $nguoilon['id'] ?>" <?= $s ?>><?= $nguoilon['soluong'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Trẻ em:</label>
          <div class="mt-2">
            <select style="padding-left: 12px; padding-right: 12px; height: 36px;" name="idte" id="idte" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php foreach ($listtreem as $treem) : ?>
                <?php if ($idte == $treem['id']) $s = "selected";
                else $s = ""; ?>
                <option value="<?= $treem['id'] ?>" <?= $s ?>><?= $treem['soluong'] ?></option>
              <?php endforeach ?>
            </select>
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

<script>
  function validateForm() {
    var name = document.getElementById('name').value;
    var price = document.getElementById('price').value;
    var idnl = document.getElementById('idnl').value;
    var idte = document.getElementById('idte').value;

    if (name.trim() === '' || price.trim() === '' || idnl.trim() === '' || idte.trim() === '') {
      alert('Vui lòng nhập đầy đủ thông tin trước khi lưu.');
      return false;
    }

    return true;
  }
</script>