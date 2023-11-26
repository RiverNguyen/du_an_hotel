<?php
extract($room);
$img = $img_p . $img;
$modalId = "exampleModal" . $id;
?>
<!-- Room Page Slider -->
<header class="header slider">
    <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= $img ?>"></div>
        <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= $img ?>"></div>
        <div class="text-center item bg-img" data-overlay-dark="3" data-background="<?= $img ?>"></div>
    </div>
    <!-- arrow down -->
    <div class="arrow bounce text-center">
        <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
    </div>
</header>
<!-- Room Content -->
<section class="rooms-page section-padding" data-scroll-index="1">
    <div class="container">

        <!-- project content -->
        <div class="row">
            <div class="col-md-12">
                <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                </span>
                <div class="section-subtitle"><?= $namelp ?></div>
                <div class="section-title"><?= $nameroom ?></div>
            </div>
            <div class="col-md-8">
                <p class="mb-30"><?= $nameroom ?> là sự kết hợp tuyệt vời giữa không gian thoải mái và tiện nghi tại khách sạn chúng tôi. Được thiết kế đặc biệt để mang lại trải nghiệm đáng nhớ cho khách hàng, <?= $name ?> cung cấp một không gian lý tưởng để thư giãn và nghỉ ngơi. Với diện tích rộng rãi, phòng này bao gồm một phòng ngủ riêng biệt và một phòng khách tiện nghi, cung cấp không gian riêng tư và thoải mái cho quý khách.</p>
                <p class="mb-30"><?= $nameroom ?> được trang bị đồ nội thất sang trọng và tiện ích hiện đại, bao gồm một giường lớn và thoải mái, khu vực làm việc, phòng tắm riêng với các tiện nghi cao cấp, và các cửa sổ lớn tạo nên ánh sáng tự nhiên và tầm nhìn tuyệt đẹp. Khách hàng có thể thư giãn trên ghế sofa thoải mái và tận hưởng các tiện ích như truyền hình cáp, truy cập internet nhanh chóng và minibar đầy đủ.</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Nhận phòng</h6>
                        <ul class="list-unstyled page-list mb-30">
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Nhận phòng từ 9:00 AM - mọi thời gian trong ngày</p>
                                </div>
                            </li>
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Nhận phòng sớm tùy vào hoàn cảnh</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>Trả phòng</h6>
                        <ul class="list-unstyled page-list mb-30">
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Trả phòng trước buổi trưa</p>
                                </div>
                            </li>
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Trả phòng cấp tốc</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h6>Giá phòng: <?= number_format($price, 0, ',', '.') ?>đ</h6>
                    </div>

                    <!-- Button trigger modal -->
                    <div class="col-md-12">
                        <button class="btn-booking" type="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
                            Đặt phòng ngay
                        </button>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-lg modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" style="font-size: 28px;" id="exampleModalLabel">Đặt Phòng:</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php?act=booking-room" method="post">
                                        <div class="sm:col-span-full">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="hidden" name="name" value="<?= $nameroom ?>">
                                            <input type="hidden" name="img" value="<?= $img ?>">
                                            <input type="hidden" name="price" value="<?= $price ?>">
                                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày nhận phòng:</label>
                                            <input style="padding-left: 12px;" type="date" name="checkin" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 me-5">
                                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Ngày trả phòng:</label>
                                            <input style="padding-left: 12px;" type="date" name="checkout" id="" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="button" style="background-color: #ccc;" value="Quay lại" class="btn-booking me-3" data-bs-dismiss="modal"></input>
                                    <input type="submit" class="btn-booking" name="book" value="Đồng ý đặt"></input>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
                <h6>Tiện nghi</h6>
                <ul class="list-unstyled page-list mb-30">
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-group"></span> </div>
                        <div class="page-list-text">
                            <p>1-2 Người</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-wifi"></span> </div>
                        <div class="page-list-text">
                            <p>Wifi miễn phí</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-clock-1"></span> </div>
                        <div class="page-list-text">
                            <p>Phòng 200 sqft</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-breakfast"></span> </div>
                        <div class="page-list-text">
                            <p>Bữa sáng</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-towel"></span> </div>
                        <div class="page-list-text">
                            <p>Khăn tắm</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-swimming"></span> </div>
                        <div class="page-list-text">
                            <p>Bể bơi</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Similiar Room -->
<section class="rooms1 section-padding bg-blck">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><span>KHÁCH SẠN SANG TRỌNG</span></div>
                <div class="section-title"><span>Phòng tương tự</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($room_cungloai as $room_cungloai) : ?>
                        <?php
                        extract($room_cungloai);
                        $linkroom = "index.php?act=room-detail&idroom=" . $id;
                        $hinh = $img_p . $img;
                        ?>
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="<?= $hinh ?>" alt=""> </div> <span class="category"><a href="<?= $linkroom ?>">Đặt</a></span>
                            <div class="con">
                                <h6><a href="<?= $linkroom ?>"><?= number_format($price, 0, ',', '.') ?>VND / Đêm</a></h6>
                                <h5><a href="<?= $linkroom ?>"><?= $name ?></a> </h5>
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
                                        <div class="permalink"><a href="<?= $linkroom ?>">Chi tiết <i class="ti-arrow-right"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing -->
<section class="pricing section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-subtitle"><span>GIÁ TỐT NHẤT</span></div>
                <div class="section-title">Dịch vụ bổ sung</div>
                <p>Giá tốt nhất cho kỳ nghỉ thư giãn của bạn. </p>
                <p>Nếu bạn đang tìm kiếm một trải nghiệm lưu trú đẳng cấp với mọi tiện ích cần thiết, hãy chọn khách sạn 5 sao của chúng tôi để biết thêm thông tin chi tiết và đặt phòng ngay hôm nay</p>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p>Để biết thêm thông tin</p> <a href="tel:855-100-4444">0345 613 090</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="owl-carousel owl-theme">
                    <div class="pricing-card">
                        <img src="img/pricing/1.jpg" alt="">
                        <div class="desc">
                            <div class="name">Làm sạch phòng</div>
                            <div class="amount">1.200.000VND<span>/ tháng</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Khách sạn có trách nhiệm</li>
                                <li><i class="ti-check"></i> Làm việc và phục vụ tận tình</li>
                                <li><i class="ti-close unavailable"></i>Làm sạch vết loét</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/2.jpg" alt="">
                        <div class="desc">
                            <div class="name">Bao gồm đồ uống</div>
                            <div class="amount">740.000VND<span>/ hằng ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Khách sạn có trách nhiệm</li>
                                <li><i class="ti-check"></i> Làm việc và phục vụ tận tình</li>
                                <li><i class="ti-close unavailable"></i>Làm sạch vết loét</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/3.jpg" alt="">
                        <div class="desc">
                            <div class="name">Phòng ăn sáng</div>
                            <div class="amount">740.000VND<span>/ hằng ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Khách sạn có trách nhiệm</li>
                                <li><i class="ti-check"></i> Làm việc và phục vụ tận tình</li>
                                <li><i class="ti-close unavailable"></i>Làm sạch vết loét</li>
                            </ul>
                        </div>
                    </div>
                    <div class="pricing-card">
                        <img src="img/pricing/4.jpg" alt="">
                        <div class="desc">
                            <div class="name">An toàn & Bảo mật</div>
                            <div class="amount">370.000VND<span>/ hằng ngày</span></div>
                            <ul class="list-unstyled list">
                                <li><i class="ti-check"></i> Khách sạn có trách nhiệm</li>
                                <li><i class="ti-check"></i> Làm việc và phục vụ tận tình</li>
                                <li><i class="ti-close unavailable"></i>Làm sạch vết loét</li>
                            </ul>
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
                    <h5>Mỗi phòng nghỉ tại đây đều có bồn tắm riêng, wi-fi, truyền hình cáp và bao gồm bữa sáng đầy đủ.</h5>
                    <div class="reservations mb-30">
                        <div class="icon color-1"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p class="color-1">Đặt chỗ</p> <a class="color-1" href="tel:855-100-4444">0345 613 090</a>
                        </div>
                    </div>
                    <p><i class="ti-check"></i><small>Gọi cho chúng tôi, nó miễn phí.</small></p>
                </div>
                <!-- Booking From -->
                <div class="col-md-5 offset-md-2">
                    <div class="booking-box">
                        <div class="head-box">
                            <h6>Phòng & Suites</h6>
                            <h4>Mẫu đặt phòng khách sạn</h4>
                        </div>
                        <div class="booking-inner clearfix">
                            <form action="https://duruthemes.com/demo/html/cappa/demo1-light/rooms2.html" class="form1 clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Nhận phòng</label>
                                            <div class="input1_inner">
                                                <input type="text" class="form-control input datepicker" placeholder="Nhận phòng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input1_wrapper">
                                            <label>Trả phòng</label>
                                            <div class="input1_inner">
                                                <input type="text" class="form-control input datepicker" placeholder="Trả phòng">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Người lớn</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Người lớn</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Trẻ em</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Trẻ em</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-form1-submit mt-15">Kiểm tra</button>
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
