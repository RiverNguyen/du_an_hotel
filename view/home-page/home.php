<!-- Slider -->
<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        <div class="text-center item bg-img" data-overlay-dark="2" data-background="img/slider/2.jpg">
            <div class="v-middle caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <span>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                            </span>
                            <h4>Luxury Hotel & Best Resort</h4>
                            <h1>Tận hưởng trải nghiệm sang trọng</h1>
                            <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>Phòng & Căn
                                        hộ</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center item bg-img" data-overlay-dark="2" data-background="img/slider/3.jpg">
            <div class="v-middle caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <span>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                            </span>
                            <h4>Luxury Hotel & Best Resort</h4>
                            <h1>Nền tảng hoàn <br> hảo cho bạn</h1>
                            <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>Phòng & Căn
                                        hộ</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center item bg-img" data-overlay-dark="3" data-background="img/slider/1.jpg">
            <div class="v-middle caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <span>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                            </span>
                            <h4>Luxury Hotel & Best Resort</h4>
                            <h1>Tận hưởng <br> khoảnh khắc đẹp đẽ</h1>
                            <div class="butn-light mt-30 mb-30"> <a href="#" data-scroll-nav="1"><span>Phòng & Căn
                                        hộ</span></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider reservation -->
    <div class="reservation">
        <a href="tel:8551004444">
            <div class="icon d-flex justify-content-center align-items-center">
                <i class="flaticon-call"></i>
            </div>
            <div class="call"><span>0345 6130 90</span> <br>Liên hệ</div>
        </a>
    </div>
</header>
<!-- Booking Search -->
<div style="left: 10%;" class="booking-wrapper">
    <div class="container">
        <div class="booking-inner clearfix">
            <form onsubmit="return validateForm()" method="post" action="index.php?act=search" class="form1 clearfix">
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
                    <input type="submit" name="search" style="height: 62px;" class="btn-form1-submit" value="Tìm Ngay"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- About -->
<section class="about section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                </span>
                <div class="section-subtitle">The BGV Luxury Hotel</div>
                <div class="section-title">Tận hưởng trải nghiệm <br> sang trọng</div>
                <p style="text-align: justify; width: 460px;">Chào mừng bạn đến khách sạn năm sao sang trọng nhất ở Việt Nam. Khách sạn BGV tọa lạc tại
                    trung tâm thành phố lịch sử, nằm ngay bên cạnh những điểm du lịch nổi tiếng và trung tâm mua sắm
                    sầm uất. Với hệ thống phòng nghỉ sang trọng được thiết kế độc đáo, chúng tôi cam kết mang đến
                    cho khách hàng một trải nghiệm lưu trú tuyệt vời và thoải mái nhất.</p>
                <p style="text-align: justify; width: 460px;">Khách sạn BGV cung cấp đa dạng các tiện nghi và dịch vụ cao cấp như nhà hàng phục vụ các món
                    ăn đặc sắc, phòng tập gym hiện đại, spa thư giãn, và trung tâm hội nghị tiện nghi. Đội ngũ nhân
                    viên chuyên nghiệp và thân thiện của chúng tôi luôn sẵn sàng phục vụ và đáp ứng mọi yêu cầu của
                    khách hàng, từ du lịch đến công việc.</p>
                <!-- call -->
                <div class="reservations">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p>Liên hệ</p> <a href="tel:855-100-4444">0345 6130 90</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                <img src="img/rooms/8.jpg" alt="" class="mt-90 mb-30">
            </div>
            <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                <img src="img/type-of-room/2.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Rooms -->
<section class="rooms1 section-padding bg-cream" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">The BGV Luxury Hotel</div>
                <div class="section-title">Phòng & Căn hộ</div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($loaiphong as $lp) :
            ?>
                <?php
                extract($lp);
                $hinh = $img_lp . $img;
                $linklp = "index.php?act=room&idlp=" . $id;
                ?>
                <?php
                if ($i == 0 || $i == 1 || $i == 2) {
                    $col = "col-md-4";
                } else {
                    $col = "col-md-6";
                }
                ?>
                <div class="<?= $col ?>">
                    <div class="item">
                        <div class="position-re o-hidden"><a href="<?= $linklp ?>"><img src="<?= $hinh ?>" alt=""></div></a>
                        <div class="con">
                            <h6><a href="<?= $linklp ?>"><?= number_format($price, 0, ',', '.') ?>/ Đêm</a></h6>
                            <h5><a href="<?= $linklp ?>"><?= $name ?></a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-7">
                                    <ul>
                                        <li><i class="flaticon-bed"></i></li>
                                        <li><i class="flaticon-bath"></i></li>
                                        <li><i class="flaticon-breakfast"></i></li>
                                        <li><i class="flaticon-towel"></i></li>
                                    </ul>
                                </div>
                                <div class="col col-md-5 text-end">
                                    <div class="permalink"><a href="<?= $linklp ?>">Chi tiết <i class="ti-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Pricing -->
<section class="pricing section-padding bg-blck">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-subtitle"><span>Giá tốt nhất</span></div>
                <div class="section-title"><span>Dịch vụ</span></div>
                <p class="color-2">Giá tốt nhất cho kỳ nghỉ thư giãn của bạn. Chúng tôi tận tâm cung cấp một loạt
                    các dịch vụ chất lượng cao, đảm bảo mang lại trải nghiệm lưu trú tuyệt vời và tiện ích đa dạng
                    cho khách hàng.</p>
                <p class="color-2">Với tâm huyết và am hiểu sâu sắc về nhu cầu của khách hàng, chúng tôi cam kết
                    cung cấp dịch vụ tận tâm và chuyên nghiệp từ đội ngũ nhân viên của chúng tôi.</p>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p class="color-2">Thông tin chi tiết:</p> <a href="tel:855-100-4444">0345 6130 90</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($listgiaca as $giaca) : ?>
                        <?php
                        extract($giaca);
                        $hinh = $img_gc . $img;
                        ?>
                        <div class="pricing-card">
                            <img src="<?= $hinh ?>" alt="">
                            <div class="desc">
                                <div class="name"><?= $name ?></div>
                                <div class="amount"><?= number_format($price, 0, ',', '.') ?>Đ<span>/ lần</span></div>
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i> Dịch vụ đánh giá tốt ở khách sạn</li>
                                    <li><i class="ti-check"></i> Nhân viên tốt nhất</li>
                                    <li><i class="ti-check"></i>Khiến khách hàng hài lòng!</li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- <div class="pricing-card">
                        <img src="img/pricing/1.jpg" alt="">
                        <div class="desc">
                            <div class="name">Dọn phòng</div>
                            <div class="amount">200.000Đ<span>/ lần</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Dịch vụ đánh giá tốt ở khách sạn</li>
                                <li><i class="ti-check"></i> Nhân viên tốt nhất</li>
                                <li><i class="ti-check"></i>Khiến khách hàng hài lòng!</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/2.jpg" alt="">
                        <div class="desc">
                            <div class="name">Đồ uống</div>
                            <div class="amount">300.000Đ<span>/ ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Dịch vụ đánh giá tốt ở khách sạn</li>
                                <li><i class="ti-check"></i> Nhân viên tốt nhất</li>
                                <li><i class="ti-check"></i>Khiến khách hàng hài lòng !</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/3.jpg" alt="">
                        <div class="desc">
                            <div class="name">Đồ ăn sáng</div>
                            <div class="amount">50.000Đ<span>/ ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Dịch vụ đánh giá tốt ở khách sạn</li>
                                <li><i class="ti-check"></i> Nhân viên tốt nhất</li>
                                <li><i class="ti-check"></i>Khiến khách hàng hài lòng !</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/4.jpg" alt="">
                        <div class="desc">
                            <div class="name">An toàn & Bảo mật</div>
                            <div class="amount">100.000Đ<span>/ ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Dịch vụ đánh giá tốt ở khách sạn</li>
                                <li><i class="ti-check"></i> Nhân viên tốt nhất</li>
                                <li><i class="ti-check"></i>Khiến khách hàng hài lòng !</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promo Video -->
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="img/slider/2.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                <div class="section-subtitle"><span>The BGV Luxury Hotel</span></div>
                <div class="section-title"><span>Video Giới Thiệu</span></div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-md-12">
                <a class="vid" href="https://youtu.be/7BGNAGahig8">
                    <div class="vid-butn">
                        <span class="icon">
                            <i style="margin-left: 8px; margin-top: 4px;" class="ti-control-play"></i>
                        </span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
<!-- Facilties -->
<section class="facilties section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Dịch vụ của chúng tôi</div>
                <div class="section-title">Các tiện ích của khách sạn</div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($listtienich as $tienich) : ?>
                <?php extract($tienich); ?>
                <div class="col-md-4">
                    <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                        <span class="<?= $icon ?>"></span>
                        <h5><?= $name ?></h5>
                        <p><?= $mota ?></p>
                        <div class="facility-shape"> <span class="<?= $icon ?>"></span> </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-world"></span>
                    <h5>Đón & Phục Vụ</h5>
                    <p>Chúng tôi cam kết mang đến trải nghiệm đón tiếp và phục vụ tốt nhất, với dịch vụ chuyên
                        nghiệp từ đội ngũ nhân viên giàu kinh nghiệm.</p>
                    <div class="facility-shape"> <span class="flaticon-world"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-car"></span>
                    <h5>Chỗ Đậu Xe</h5>
                    <p>
                        Chúng tôi cam kết cung cấp một dịch vụ chỗ đỗ xe an toàn, thuận tiện và bảo mật để đảm bảo sự
                        thoải mái và yên tâm cho quý khách.
                    </p>
                    <div class="facility-shape"> <span class="flaticon-car"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-bed"></span>
                    <h5>Dịch Vụ Phòng</h5>
                    <p>Chúng tôi cam kết mang đến cho bạn trải nghiệm lưu trú tối ưu với các dịch vụ phòng chất
                        lượng cao và tiện nghi hiện đại.</p>
                    <div class="facility-shape"> <span class="flaticon-bed"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-swimming"></span>
                    <h5>Bể Bơi</h5>
                    <p>Hòa mình vào không gian thư giãn và tận hưởng những khoảnh khắc đáng nhớ tại bể bơi của chúng
                        tôi tại BGV Hotel.</p>
                    <div class="facility-shape"> <span class="flaticon-swimming"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-wifi"></span>
                    <h5>Wifi - Internet</h5>
                    <p>Hãy tận hưởng sự tiện lợi của dịch vụ WiFi và Internet tại BGV Hotel để đảm bảo bạn luôn kết
                        nối với thế giới bên ngoài!</p>
                    <div class="facility-shape"> <span class="flaticon-wifi"></span> </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                    <span class="flaticon-breakfast"></span>
                    <h5>Bữa Sáng</h5>
                    <p>Hãy đến và thưởng thức bữa sáng đầy đủ năng lượng, và bắt đầu một ngày đầy năng lượng và hứng
                        khởi tại BGV Hotel!</p>
                    <div class="facility-shape"> <span class="flaticon-breakfast"></span> </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- Testiominals -->
<section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/2.jpg" data-overlay-dark="3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="testimonials-box">
                        <div class="head-box">
                            <h6>Lời chứng thực</h6>
                            <h4>Khách Hàng Nói Gì ?</h4>
                            <div class="line"></div>
                        </div>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>"Tôi đã có một trải nghiệm lưu trú tuyệt vời tại BGV Hotel! Dịch vụ tận tâm
                                    và chu đáo từ đội ngũ nhân viên đã khiến tôi cảm thấy như đang ở nhà. Phòng nghỉ
                                    tại đây rất sang trọng và thoải mái, với đầy đủ tiện nghi cần thiết. Bữa sáng đa
                                    dạng và ngon miệng, tôi đã có cơ hội thưởng thức nhiều món ăn đặc trưng địa
                                    phương tuyệt vời. Tôi chắc chắn sẽ quay trở lại và giới thiệu BGV Hotel
                                    cho bạn bè và gia đình của mình."</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/4.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Emily Brown</h6> <span>Đánh Giá Của Khách Hàng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>"Tôi đã có một trải nghiệm lưu trú tuyệt vời tại BGV Hotel! Dịch vụ tận tâm
                                    và chu đáo từ đội ngũ nhân viên đã khiến tôi cảm thấy như đang ở nhà. Phòng nghỉ
                                    tại đây rất sang trọng và thoải mái, với đầy đủ tiện nghi cần thiết. Bữa sáng đa
                                    dạng và ngon miệng, tôi đã có cơ hội thưởng thức nhiều món ăn đặc trưng địa
                                    phương tuyệt vời. Tôi chắc chắn sẽ quay trở lại và giới thiệu BGV Hotel
                                    cho bạn bè và gia đình của mình."</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/1.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Nolan White</h6> <span>Đánh Giá Của Khách Hàng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <span class="quote"><img src="img/quot.png" alt=""></span>
                                <p>"Tôi đã có một trải nghiệm lưu trú tuyệt vời tại BGV Hotel! Dịch vụ tận tâm
                                    và chu đáo từ đội ngũ nhân viên đã khiến tôi cảm thấy như đang ở nhà. Phòng nghỉ
                                    tại đây rất sang trọng và thoải mái, với đầy đủ tiện nghi cần thiết. Bữa sáng đa
                                    dạng và ngon miệng, tôi đã có cơ hội thưởng thức nhiều món ăn đặc trưng địa
                                    phương tuyệt vời. Tôi chắc chắn sẽ quay trở lại và giới thiệu BGV Hotel
                                    cho bạn bè và gia đình của mình."</p>
                                <div class="info">
                                    <div class="author-img"> <img src="img/team/5.jpg" alt=""> </div>
                                    <div class="cont"> <span><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></span>
                                        <h6>Olivia Martin</h6> <span>Đánh Giá Của Khách Hàng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section class="services section-padding">
    <div class="container">
        <?php
        $i = 0;
        foreach ($dichvu as $dv) :
        ?>
            <?php
            extract($dv);
            $hinh = $img_dv . $img;
            ?>
            <?php
            if ($i == 1 || $i == 3) {
                $item_right_animation = "fadeInRight";
                $item_left_animation = "fadeInLeft";
                $item_left = '<div class="col-md-6 bg-cream p-0 order2 valign animate-box" data-animate-effect="' . $item_left_animation . '">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>KINH NGHIỆM</h6>
                        </div>
                        <h4>' . $name . '</h4>
                        <p>' . $mota . '</p>
                        <div class="butn-dark"> <a href="index.php?act=spa"><span>Tìm hiểu thêm</span></a> </div>
                    </div>
                </div>
            </div>';
                $item_right = '<div class="col-md-6 p-0 order1 animate-box" data-animate-effect="' . $item_right_animation . '">
                <div class="img">
                    <a href="index.php?act=spa"><img src="' . $hinh . '" alt=""></a>
                </div>
            </div>';
            } else {
                $item_right_animation = "fadeInRight";
                $item_left_animation = "fadeInLeft";
                $item_right = '<div class="col-md-6 bg-cream p-0 order2 valign animate-box" data-animate-effect="' . $item_right_animation . '">
                <div class="content">
                    <div class="cont text-left">
                        <div class="info">
                            <h6>KINH NGHIỆM</h6>
                        </div>
                        <h4>' . $name . '</h4>
                        <p>' . $mota . '</p>
                        <div class="butn-dark"><a href="index.php?act=spa"><span>Tìm hiểu thêm</span></a> </div>
                    </div>
                </div>
            </div>';
                $item_left = '<div class="col-md-6 p-0 order1 animate-box" data-animate-effect="' . $item_left_animation . '">
                <div class="img">
                    <a href="index.php?act=spa"><img src="' . $hinh . '" alt=""></a>
                </div>
            </div>';
            }
            ?>
            <div class="row">
                <?= $item_left ?>
                <?= $item_right ?>
            </div>
            <?php $i++; ?>
        <?php endforeach ?>
    </div>
</section>
<!-- News -->
<section class="news section-padding bg-blck">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><span>Blog Khách Sạn</span></div>
                <div class="section-title"><span>Tin Tức Của Chúng Tôi</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/1.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>02</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Nhà Hàng</a>
                            </span>
                            <h5><a href="post.html">Nhà Hàng Lịch Sử Được Tinh Chỉnh</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/2.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>04</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Spa</a>
                            </span>
                            <h5><a href="post.html">Lợi Ích Khi Sử Dụng Liệu Pháp Spa</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/3.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>06</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Phòng Tắm</a>
                            </span>
                            <h5><a href="post.html">Bộ Sưu Tập Phòng Tắm Khách Sạn</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/4.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con">
                            <span class="category">
                                <a href="news.html">Sức khỏe</a>
                            </span>
                            <h5><a href="post.html">Cải Thiện Cùng Fitness Health Club</a></h5>
                        </div>
                    </div>

                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/6.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Thiết Kế</a>
                            </span>
                            <h5><a href="post.html">Thiết Kế Ánh Sáng Cổ Điển Trong Khách Sạn</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="img/news/5.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>08</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="news.html">Sức Khoẻ</a>
                            </span>
                            <h5><a href="post.html">Lợi Ích Của Việc Bơi Liên Quan Đến Sức Khoẻ</a></h5>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Reservation & Booking Form -->
<section class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/2.jpg" data-overlay-dark="2">
        <div class="container">
            <div class="row">
                <!-- Reservation -->
                <div class="col-md-5 mb-30 mt-30">
                    <p><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                    <h5 style="text-align: justify;">Mỗi phòng nghỉ của chúng tôi đều có phòng tắm riêng, Wi-Fi,
                        truyền hình cáp và bao gồm bữa
                        sáng đầy đủ.</h5>
                    <div class="reservations mb-30">
                        <div class="icon color-1"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p class="color-1">Liên hệ:</p> <a class="color-1" href="tel:855-100-4444">0345 6130
                                90</a>
                        </div>
                    </div>
                    <p><i class="ti-check"></i><small>Gọi cho chúng tôi.</small></p>
                </div>
                <!-- Booking From -->
                <div class="col-md-5 offset-md-2">
                    <div class="booking-box">
                        <div class="head-box">
                            <h6>Phòng & Căn hộ</h6>
                            <h4>Đặt Phòng Khách Sạn</h4>
                        </div>
                        <div class="booking-inner clearfix">
                            <form method="post" action="index.php?act=search" class="form1 clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Nhận phòng</label>
                                            <div class="input1_inner">
                                                <input type="text" name="checkin" class="form-control input datepicker" placeholder="Nhận phòng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Trả phòng</label>
                                            <div class="input1_inner">
                                                <input type="text" name="checkout" class="form-control input datepicker" placeholder="Trả phòng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-form1-submit mt-15">Tìm ngay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd', // Định dạng ngày
            minDate: 0, // Ngày nhỏ nhất là ngày hiện tại
            onSelect: function(selectedDate) {
                var checkin = $(this).hasClass('checkin');
                var checkout = $(this).hasClass('checkout');

                if (checkin) {
                    // Nếu là ngày nhận phòng, set ngày trả phòng tối thiểu là ngày nhận phòng đã chọn
                    $('.checkout').datepicker('option', 'minDate', selectedDate);
                } else if (checkout) {
                    // Nếu là ngày trả phòng, set ngày nhận phòng tối đa là ngày trả phòng đã chọn
                    $('.checkin').datepicker('option', 'maxDate', selectedDate);
                }
            }
        });
    });

    function validateForm() {
        var checkinDate = new Date($('input[name="checkin"]').val());
        var checkoutDate = new Date($('input[name="checkout"]').val());

        if (checkinDate >= checkoutDate) {
            alert("Ngày nhận phòng phải trước ngày trả phòng.");
            return false;
        }

        return true;
    }
</script>