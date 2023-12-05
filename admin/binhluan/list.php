<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Danh sách bình luận</h5>
        </div>
    </div>
</div>
<div class="container mt-5 table-responsive">
    <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center;">Id bình luận</th>
                <th style="text-align: center;">Id tài khoản</th>
                <th style="text-align: center;">Id phòng</th>
                <th style="text-align: center;">Tên người dùng</th>
                <th style="text-align: center;">Nội dung</th>
                <th style="text-align: center;">Ngày bình luận</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listComment as $comment) : ?>
                <?php
                extract($comment);
                $delCom = "index.php?act=del-comment&id=" . $id;
                $modalId = "exampleModal" . $id;
                ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $iduser ?> </td>
                    <td><?= $idroom ?> </td>
                    <td><?= $name ?> </td>
                    <td><?= $noidung ?> </td>
                    <td><?= $ngaybinhluan ?> </td>
                    <td>
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
                                        <a href="<?= $delCom ?>"><button type="button" class="btn btn-primary">Xoá</button></a>
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

</div>
</div>
</div>
</div>