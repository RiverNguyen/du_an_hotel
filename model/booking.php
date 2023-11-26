<?php
function view_booking($del)
{
    $i = 0;
    foreach ($_SESSION['my-booking'] as $room) {
        $hinh = $room[2];
        $money = $room[3] * $room[6];
        $linkroom = 'index.php?act=room-detail&id=' . $room[0];
        $delroom = '';
        $accept = '';

        if ($del == 1) {
            $delroom = '<a href="index.php?act=del-room&idbook=' . $i . '" class="link-btn"><input type="button" value="Xoá"></a>';
            $accept = '<a style="" href="index.php?act=bill"><input style="font-weight: 400;
            font-family: \'Barlow Condensed\', sans-serif;
            text-transform: uppercase;
            background: #ab8a62;
            color: #fff;
            margin: 0;
            position: relative;
            font-size: 15px;
            letter-spacing: 3px;" class="butn-dark btn-submit" type="button" value="Thanh toán">
        </a>';
        } else {
            $delroom = '';
            $accept = '';
        }
?>
        <div class="rooms2 mb-90 animate-box" data-animate-effect="fadeInUp">
            <figure><img src="<?= $hinh ?>" alt="" class="img-fluid"></figure>
            <div class="caption">
                <h3><?= number_format($room[3], 0, ',', '.') ?>Đ <span>/ ĐÊM</span></h3>
                <h4><a href="<?= $linkroom ?>"><?= $room[1] ?></a></h4>
                <p>Ngày nhận phòng: <?= $room[4] ?> &emsp; &emsp; Ngày trả phòng: <?= $room[5] ?></p>

                <p>Giá tiền: <?= number_format($money, 0, ',', '.') ?>Đ</p>
                <div class="row room-facilities">
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-group"></i> 1-2 Persons</li>
                            <li><i class="flaticon-wifi"></i> Free Wifi</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-bed"></i> Twin Bed</li>
                            <li><i class="flaticon-breakfast"></i> Breakfast</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-clock-1"></i> 200 sqft room</li>
                            <li><i class="flaticon-swimming"></i> Swimming Pool</li>
                        </ul>
                    </div>
                </div>
                <hr class="border-2">
                <div class="info-wrapper">
                    <div class="more"><?= $delroom ?></div>
                    <div class="butn-dark"><?= $accept ?></div>
                </div>
            </div>
        </div>
<?php
        $i += 1;
    }
}

function show_booking_detail($listbill)
{
    $i = 0;
    foreach ($listbill as $room) {
        $hinh = $room['img'];
        $money = $room['thanhtien'];
?>
        <div class="rooms2 mb-90 animate-box" data-animate-effect="fadeInUp">
            <figure><img src="<?= $hinh ?>" alt="" class="img-fluid"></figure>
            <div class="caption">
                <h3><?= number_format($room['price'], 0, ',', '.') ?>Đ <span>/ Night</span></h3>
                <h4><a href="room-details.html"><?= $room['name'] ?></a></h4>
                <p>Ngày nhận phòng: <?= $room['checkin'] ?> &emsp; &emsp; Ngày trả phòng: <?= $room['checkout'] ?></p>

                <p>Giá tiền: <?= number_format($room['thanhtien'], 0, ',', '.') ?>Đ</p>
                <div class="row room-facilities">
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-group"></i> 1-2 Persons</li>
                            <li><i class="flaticon-wifi"></i> Free Wifi</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-bed"></i> Twin Bed</li>
                            <li><i class="flaticon-breakfast"></i> Breakfast</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li><i class="flaticon-clock-1"></i> 200 sqft room</li>
                            <li><i class="flaticon-swimming"></i> Swimming Pool</li>
                        </ul>
                    </div>
                </div>
                <hr class="border-2">
            </div>
        </div>
<?php
        $i += 1;
    }
}

function insert_bill($idp, $name, $address, $email, $tel, $checkin, $checkout, $daybook) {
    $sql = "INSERT INTO bill(idp, bill_name, bill_address, bill_email, bill_tel, checkin, checkout, daybook) VALUES ('$idp', '$name', '$address', '$email', '$tel', '$checkin', '$checkout', '$daybook')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_booking($iduser, $idp, $img, $name, $price, $checkin, $checkout, $thanhtien, $idbill) {
    $sql = "INSERT INTO book(iduser, idp, img, name, price, checkin, checkout, thanhtien, idbill) VALUES ('$iduser', '$idp', '$img', '$name', '$price', '$checkin', '$checkout', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql="select * from bill where id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadall_booking($id){
    $sql="select * from book where idbill=".$id;
    $bill=pdo_query($sql);
    return $bill;
}

?>


