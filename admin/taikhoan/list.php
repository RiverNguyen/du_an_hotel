<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
    <div class="container">
        <div class="row">
            <h1>ADMIN</h1>
            <h5>Danh sách tài khoản</h5>
        </div>
    </div>
</div>
<div class="container mt-5 table-responsive">
    <table id="example" class="display table table-bordered text-center align-middle" style="width:100%">
        <thead>
            <tr>
                <th style="text-align: center;">Id tài khoản</th>
                <th style="text-align: center;">Tên người dùng</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Địa chỉ</th>
                <th style="text-align: center;">Số điện thoại</th>
                <th style="text-align: center;">Quyền</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listAccount as $account) : ?>
                <?php
                extract($account);
                $updateAcc = "index.php?act=sua-account&id=" . $id;
                $delAcc = "index.php?act=del-account&id=" . $id;
                $modalId = "exampleModal" . $id;
                $role = get_role($role);
                ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $name ?> </td>
                    <td><?= $email ?> </td>
                    <td><?= $address ?> </td>
                    <td><?= $tel ?> </td>
                    <td><?= $role ?> </td>
                    <td>
                        <a href="<?= $updateAcc?>"><input style="color: #fff; background-color: #0d6efd" type="button" value="Sửa" class="btn btn-primary"></a>
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
                                        <a href="<?= $delAcc ?>"><button type="button" class="btn btn-primary">Xoá</button></a>
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