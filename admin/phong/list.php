<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Danh sách dịch vụ</h5>
        </div>
    </div>
</div>
<form action="index.php?act=listp" method="post" class="row g-3">
    <div style="margin-left: 350px; margin-top: 40px" class="col-lg-1">
        <select style="height: 40px" name="idlp" id="" class="form-control">
            <option value="0" selected>Tất Cả</option>
            <?php foreach ($dsloaiphong as $loaiphong) : ?>
                <?php extract($loaiphong); ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div style="margin-top: 40px;" class="col-lg-1">
        <input style="height: 40px; letter-spacing: 0px;" type="submit" name="listok" value="Go" class="btn btn-primary">
    </div>
</form>
<div class="container mt-3 table-responsive">
    <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center;">Mã phòng</th>
                <th style="text-align: center;">Tên loại phòng</th>
                <th style="text-align: center;">Tên phòng</th>
                <th style="text-align: center;">Giá</th>
                <th style="text-align: center;">Ảnh</th>
                <th style="text-align: center;">Số lượng</th>
                <th style="text-align: center;">Mô tả</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listphong as $phong) : ?>
                <?php
                extract($phong);
                $suap = "index.php?act=suap&id=" . $idp;
                $xoap = "index.php?act=xoap&id=" . $idp;
                $modalId = "exampleModal" . $idp;
                $imgpath = "../img/rooms/" . $img;
                if (is_file($imgpath)) {
                    $hinh = "<img src='" . $imgpath . "' style='height: 160px;'>";
                } else {
                    $hinh = "no photo";
                }
                ?>
                <tr>
                    <td><?= $idp ?></td>
                    <td><?= $nametype ?></td>
                    <td><?= $nameroom ?></td>
                    <td><?= number_format($price, 0, ',', '.') ?>Đ</td>
                    <td><?= $hinh ?></td>
                    <td><?= $soluong ?> </td>
                    <td><?= $mota ?> </td>
                    <td>
                        <a href="<?= $suap ?>"><input style="color: #fff; background-color: #0d6efd" type="button" value="Sửa" class="btn btn-primary"></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                            Xoá
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá dịch vụ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có muốn xoá dịch vụ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                        <a href="<?= $xoap ?>"><button type="button" class="btn btn-primary">Xoá</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container my-5">
    <div>
        <a href="index.php?act=addp"><input class="input-lp" style="letter-spacing: 0px;" type="submit" value="Nhập thêm" class="btn btn-primary"></a>
    </div>
</div>
</div>
</div>
</div>