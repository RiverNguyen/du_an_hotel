<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
  <div class="container">
    <div class="row">
      <h1>ADMIN</h1>
      <h5>Danh sách loại phòng</h5>
    </div>
  </div>
</div>
<div class="container mt-5 table-responsive">
  <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
    <thead>
      <tr>
        <th style="text-align: center;">Mã phòng</th>
        <th style="text-align: center;">Tên loại phòng</th>
        <th style="text-align: center;">Ảnh</th>
        <th style="text-align: center;">Giá</th>
        <th style="text-align: center;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($dsloaiphong as $loaiphong) {
        extract($loaiphong);
        $sualp = "index.php?act=sualp&id=" . $id;
        $xoalp = "index.php?act=xoalp&id=" . $id;
        $modalId = "exampleModal" . $id;
        $imgpath = "../img/type-of-room/" . $img;
        if (is_file($imgpath)) {
          $hinh = "<img src='" . $imgpath . "' style='height: 160px; width: 120px; margin: auto;'>";
        } else {
          $hinh = "no photo";
        }
        echo '<tr>
                      <td>' . $id . '</td>
                      <td>' . $name . '</td>
                      <td>' . $hinh . '</td>
                      <td>' . number_format($gia, 0, ',', '.') . 'đ</td>
                      <td>
                        <a href="' . $sualp . '"><input type="button" style="color: #fff; background-color: #0d6efd"  class="btn btn-primary" value="Sửa"></a>   
                       <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
                        Xoá
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="' . $modalId . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá sản phẩm?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                    <a href="' . $xoalp . '"><button type="button" class="btn btn-primary">Xoá</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                      </td>
                      </tr>';
      }
      ?>
    </tbody>
  </table>
</div>
<div class="container my-5">
  <div>
    <a href="index.php?act=addlp"><input class="input-lp" style="letter-spacing: 0px;" type="submit" value="Nhập thêm" class="btn btn-primary"></a>
  </div>
</div>
</div>
</div>
</div>