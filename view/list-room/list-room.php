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

                 <h1>Phòng & Suites</h1>

             </div>
         </div>
     </div>
 </div>
 <!-- Booking Search -->
 <section style="padding: 40px 0;" class="section-padding bg-cream" data-scroll-index="1">
     <div class="container">
         <div class="section-subtitle">Availabilitiy</div>
         <div class="section-title">Search Rooms</div>
         <div class="booking-inner clearfix">
             <form class="form1 clearfix">
                 <div class="col1 c1">
                     <div class="input1_wrapper">
                         <label>Check in</label>
                         <div class="input1_inner">
                             <input type="text" class="form-control input datepicker" placeholder="Check in">
                         </div>
                     </div>
                 </div>
                 <div class="col1 c2">
                     <div class="input1_wrapper">
                         <label>Check out</label>
                         <div class="input1_inner">
                             <input type="text" class="form-control input datepicker" placeholder="Check out">
                         </div>
                     </div>
                 </div>
                 <div class="col2 c3">
                     <div class="select1_wrapper">
                         <label>Adults</label>
                         <div class="select1_inner">
                             <select class="select2 select" style="width: 100%">
                                 <option value="1">1 Adult</option>
                                 <option value="2">2 Adults</option>
                                 <option value="3">3 Adults</option>
                                 <option value="4">4 Adults</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col2 c4">
                     <div class="select1_wrapper">
                         <label>Children</label>
                         <div class="select1_inner">
                             <select class="select2 select" style="width: 100%">
                                 <option value="1">Children</option>
                                 <option value="1">1 Child</option>
                                 <option value="2">2 Children</option>
                                 <option value="3">3 Children</option>
                                 <option value="4">4 Children</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col2 c5">
                     <div class="select1_wrapper">
                         <label>Rooms</label>
                         <div class="select1_inner">
                             <select class="select2 select" style="width: 100%">
                                 <option value="1">1 Room</option>
                                 <option value="2">2 Rooms</option>
                                 <option value="3">3 Rooms</option>
                                 <option value="4">4 Rooms</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col3 c6">
                     <button type="submit" class="btn-form1-submit">Check Now</button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- Rooms 3 -->
 <div style="padding: 80px 0;" class="rooms3 section-padding">
     <div class="container">
         <div class="row">
             <?php foreach ($listphong as $phong) : ?>
                 <?php
                    extract($phong);
                    $hinh = $img_p . $img;
                    ?>
                 <div class="col-md-4">
                     <div class="square-flip">
                         <div class="square bg-img" data-background="<?= $hinh ?>">
                             <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                             <div class="square-container d-flex align-items-end justify-content-end">
                                 <div class="box-title">

                                     <h6><?= number_format($price, 0, ',', '.') ?>VND / Đêm</h6>

                                     <h4><?= $name ?></h4>
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
                                 <div class="btn-line"><a href="index.php?act=room-detail">Chi tiết</a></div>

                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
             <!-- <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/1.jpg">
                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">

                                 <h6>4.000.000VND / Đêm</h6>

                                 <h4>Junior Suite</h4>
                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>4.000.000VND / Đêm</h6>
                             <h4>Junior Suite</h4>
                             <p>Junior Suite là một loại phòng tại khách sạn với không gian rộng rãi, bao gồm phòng
                                 ngủ và phòng khách riêng biệt.</p>
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
                             <div class="btn-line"><a href="room-details.html">Chi tiết</a></div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/2.jpg">

                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">
                                 <h6>5.000.000VND / Đêm</h6>
                                 <h4>Phòng gia đình</h4>

                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>5.000.000VND / Đêm</h6>
                             <h4>Phòng gia đình</h4>
                             <p>Phòng gia đình là loại phòng dành cho gia đình tại khách sạn của chúng tôi.</p>
                             <div class="row room-facilities mb-30">
                                 <div class="col-md-6">
                                     <ul>
                                         <li><i class="flaticon-group"></i> 3-4 người</li>
                                         <li><i class="flaticon-wifi"></i> Wifi miễn phí</li>

                                     </ul>
                                 </div>
                                 <div class="col-md-6">
                                     <ul>

                                         <li><i class="flaticon-bed"></i> Giường đôi</li>
                                         <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="btn-line"><a href="room-details.html">Chi tiết</a></div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/3.jpg">
                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">

                                 <h6>6.000.000VND / Đêm</h6>
                                 <h4>Phòng đôi</h4>

                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>6.000.000VND / Đêm</h6>
                             <h4>Phòng đôi</h4>
                             <p>Phòng đôi là một loại phòng tại khách sạn thích hợp cho hai người</p>
                             <div class="row room-facilities mb-30">
                                 <div class="col-md-6">
                                     <ul>
                                         <li><i class="flaticon-group"></i> 1-2 người</li>
                                         <li><i class="flaticon-wifi"></i> Wifi miễn phí</li>

                                     </ul>
                                 </div>
                                 <div class="col-md-6">
                                     <ul>

                                         <li><i class="flaticon-bed"></i> Giường đôi</li>
                                         <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="btn-line"><a href="room-details.html">chi tiết</a></div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/6.jpg">

                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">
                                 <h6>7.000.000VND / Đêm</h6>
                                 <h4> Phòng Deluxe</h4>

                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>7.000.000VND / Đêm</h6>
                             <h4>Phòng Deluxe</h4>
                             <p>Deluxe Room là một loại phòng tại khách sạn với không gian rộng rãi và tiện ích cao
                                 cấp.</p>
                             <div class="row room-facilities mb-30">
                                 <div class="col-md-6">
                                     <ul>
                                         <li><i class="flaticon-group"></i> 1-2 người</li>
                                         <li><i class="flaticon-wifi"></i>Wifi miẽn phí</li>

                                     </ul>
                                 </div>
                                 <div class="col-md-6">
                                     <ul>

                                         <li><i class="flaticon-bed"></i> Giường đôi</li>
                                         <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="btn-line"><a href="room-details.html">Chi tiết</a></div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/8.jpg">

                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">
                                 <h6>3.500.000VND / Đêm</h6>
                                 <h4>Phòng Superior</h4>

                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>3.500.000VND / Đêm</h6>
                             <h4>Phòng Superior</h4>
                             <p>Phòng Superior là một loại phòng tại khách sạn với không gian thoải mái và các tiện
                                 ích cơ bản</p>
                             <div class="row room-facilities mb-30">
                                 <div class="col-md-6">
                                     <ul>
                                         <li><i class="flaticon-group"></i> 1-2 người</li>
                                         <li><i class="flaticon-wifi"></i> Wifi miễn phí</li>

                                     </ul>
                                 </div>
                                 <div class="col-md-6">
                                     <ul>

                                         <li><i class="flaticon-bed"></i> Giường đôi</li>
                                         <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="btn-line"><a href="room-details.html">Chi tiết</a></div>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="square-flip">
                     <div class="square bg-img" data-background="img/rooms/9.jpg">
                         <span class="category"><a href="rooms2.html">Đặt phòng</a></span>
                         <div class="square-container d-flex align-items-end justify-content-end">
                             <div class="box-title">
                                 <h6>9.000.000VND / Đêm</h6>
                                 <h4>Phòng chăm sóc sức khỏe</h4>
                             </div>
                         </div>
                         <div class="flip-overlay"></div>
                     </div>
                     <div class="square2">
                         <div class="square-container2">

                             <h6>9.000.000VND / Đêm</h6>
                             <h4>Phòng chăm sóc sức khỏe</h4>
                             <p>Phòng chăm sóc sức khỏe là một loại phòng tại khách sạn được thiết kế đặc biệt để tạo
                                 điều kiện tốt nhất cho sức khỏe và sự thư giãn</p>
                             <div class="row room-facilities mb-30">
                                 <div class="col-md-6">
                                     <ul>
                                         <li><i class="flaticon-group"></i> 1-2 người</li>
                                         <li><i class="flaticon-wifi"></i> Wifi miễn phí</li>

                                     </ul>
                                 </div>
                                 <div class="col-md-6">
                                     <ul>

                                         <li><i class="flaticon-bed"></i> Giường đôi</li>
                                         <li><i class="flaticon-breakfast"></i> Bữa sáng</li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="btn-line"><a href="room-details.html">Chi tiết</a></div>
                         </div>
                     </div>
                 </div>
             </div> -->
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