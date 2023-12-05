<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="../img/slider/3.jpg">
  <div class="container">
    <div class="row">
      <h1>ADMIN</h1>
      <h5>Xin chào, những con <br> người có quyền lực tối cao</h5>
    </div>
  </div>
</div>

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="card col-lg-3 mx-3 my-5" style="width: 20rem;">
      <img src="../img/Yellow and White Home Shop Logo.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Số phòng đã đặt: <?= $phongdat[0]['phongdat'] ?></h1>
        <a href="index.php?act=sophongdat" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
    <div class="card col-lg-3 mx-3 my-5" style="width: 20rem;">
      <img src="../img/123.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Số phòng đã trống: <?= $phongtrong[0]['phongtrong'] ?></h1>
        <a href="index.php?act=sophongtrong" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
    <div class="card col-lg-3 mx-3 my-5" style="width: 20rem;">
      <img src="../img/admin.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Số lượng tài khoản: <?= $taikhoan[0]['sotaikhoan'] ?></h1>
        <a href="index.php?act=list-account" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
    <div class="card col-lg-3 mx-3 mb-5" style="width: 20rem;">
      <img src="../img/123123.svg" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Tiền kiếm được: <?= number_format($tien[0]['tongtien'], 0, ',', '.')  ?> Đ</h1>
        <a href="#" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
    <div class="card col-lg-3 mx-3 mb-5" style="width: 20rem;">
      <img src="../img/comment.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Số lượng bình luận: <?= $binhluan[0]['binhluan']   ?> </h1>
        <a href="index.php?act=list-comment" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
    <div class="card col-lg-3 mx-3 mb-5" style="width: 20rem;">
      <img src="../img/bill.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 20px;">Số lượng hoá đơn: <?= $bill[0]['bill']   ?> </h1>
        <a href="index.php?act=list-bill" class="btn btn-primary">Chi tiết</a>
      </div>
    </div>
  </div>
</div>
</div>