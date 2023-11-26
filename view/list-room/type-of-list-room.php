 <!-- Header Banner -->
 <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/3.jpg">
     <div class="container">
         <div class="row">
             <div class="col-md-12 text-right caption mt-90">
                 <span>
                     <i class="star-rating"></i>
                     <i class="star-rating"></i>
                     <i class="star-rating"></i>
                     <i class="star-rating"></i>
                     <i class="star-rating"></i>
                 </span>
                 <h5>The BGV Luxury Hotel</h5>

                 <h1><?= $namelp ?></h1>

             </div>
         </div>
     </div>
 </div>
 <!-- Booking Search -->
 <section style="padding: 40px 0;" class="section-padding bg-cream" data-scroll-index="1">
     <div class="container">
         <div class="section-subtitle">Khả dụng</div>
         <div class="section-title">Tìm phòng</div>
         <div class="booking-inner clearfix">
             <form method="post" action="index.php?act=search" class="form1 clearfix">
                 <div class="col3 c1">
                     <div class="input1_wrapper">
                         <label>Nhận phòng</label>
                         <div class="input1_inner">
                             <input type="text" name="checkin" class="form-control input datepicker" placeholder="Nhận phòng">
                         </div>
                     </div>
                 </div>
                 <div class="col3 c2">
                     <div class="input1_wrapper">
                         <label>Trả phòng</label>
                         <div class="input1_inner">
                             <input type="text" name="checkout" class="form-control input datepicker" placeholder="Trả phòng">
                         </div>
                     </div>
                 </div>

                 <div class="col3 c5">
                     <div class="select1_wrapper">
                         <label>Phòng</label>
                         <div class="select1_inner">
                             <select name="idlp" class="select2 select" style="width: 100%">
                                 <option value="0">Tất cả</option>
                                 <?php foreach ($listloaiphong as $phong) : ?>
                                     <?php extract($phong); ?>
                                     <option value="<?= $id ?>"><?= $name ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col3 c6">
                     <button type="submit" class="btn-form1-submit" name="search">Tìm ngay</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- Rooms 3 -->
 <div style="padding: 80px 0;" class="rooms3 section-padding">
     <div class="container">
         <div class="row">
             <?php foreach ($dslp as $lp) : ?>
                 <?php
                    extract($lp);
                    $linkroom = "index.php?act=room-detail&idroom=" . $idp;
                    $hinh = $img_p . $img;
                    ?>
                 <div class="col-md-4">
                     <div class="square-flip">
                         <div class="square bg-img" data-background="<?= $hinh ?>">
                             <span class="category"><a href="<?= $linkroom ?>">Đặt phòng</a></span>
                             <div class="square-container d-flex align-items-end justify-content-end">
                                 <div class="box-title">

                                     <h6><?= number_format($price, 0, ',', '.') ?>VND / Đêm</h6>

                                     <h4><?= $nameroom ?></h4>
                                 </div>
                             </div>
                             <div class="flip-overlay"></div>
                         </div>
                         <div class="square2">
                             <div class="square-container2">

                                 <h6><?= number_format($price, 0, ',', '.') ?>VND / Đêm</h6>
                                 <h4><?= $name ?></h4>
                                 <p><?= $mota ?>.</p>
                                 <div class="row room-facilities mb-30">
                                     <div class="col-md-6">
                                         <ul>
                                             <li><i class="flaticon-group"></i> 1-2 người</li>
                                             <li><i class="flaticon-wifi"></i> Wifi miễn phí</li>

                                         </ul>
                                     </div>
                                     <div class="col-md-6">
                                         <ul>

                                             <li><i class="flaticon-bed"></i> Giường đơn</li>
                                             <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="btn-line"><a href="<?= $linkroom ?>">Chi tiết</a></div>

                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>

 </div>

 <!-- Clients -->
 <section class="clients">
     <div class="container">
         <div class="row">
             <div class="col-md-7">
                 <div class="owl-carousel owl-theme">
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/1.png" alt=""></a>
                     </div>
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/2.png" alt=""></a>
                     </div>
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/3.png" alt=""></a>
                     </div>
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/4.png" alt=""></a>
                     </div>
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/5.png" alt=""></a>
                     </div>
                     <div class="clients-logo">
                         <a href="#0"><img src="img/clients/6.png" alt=""></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>