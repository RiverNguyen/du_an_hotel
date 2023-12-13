<?php
function view_booking($del)
{
    $total = 0;
    $i = 0;
    $tongsl = 0;

    foreach ($_SESSION['my-booking'] as $room) {
        $hinh = $room[2];
        $money = $room[3] * $_SESSION['soluong'][$room[0]] * $room[8];
        $linkroom = 'index.php?act=room-detail&id=' . $room[0];
        $delroom = '';
        $accept = '';
        $total += $money;
        $tongsl += $_SESSION['soluong'][$room[0]];
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
            $tieptuc = '<a style="" href="index.php?act=list-room"><input style="font-weight: 400;
        font-family: \'Barlow Condensed\', sans-serif;
        text-transform: uppercase;
        background: #ab8a62;
        color: #fff;
        margin: 0;
        position: relative;
        font-size: 15px;
        letter-spacing: 3px;" class="butn-dark btn-submit" type="button" value="Tiếp tục đặt phòng">';
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
                <p>Ngày nhận phòng: <?= date("d/m/Y", strtotime($room[4])) ?> &emsp; &emsp; Ngày trả phòng: <?= date("d/m/Y", strtotime($room[5])) ?></p>
                <p>Số lượng phòng đặt: <input type="text" style="width: 20px; height: 10px; display: inline-block; padding-left: 6px; border: .5px solid #ccc;" name="soluong[<?= $room[0] ?>]" value="<?= $_SESSION['soluong'][$room[0]] ?>"> &emsp; &emsp; &emsp; &emsp; Thời gian đặt: <?= $room[6] ?></p>
                <br>
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
                    <div class="more mt-3"><?= $delroom ?></div>
                </div>
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
                <p>Số lượng phòng: <?= $room['soluong'] ?></p>
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

function insert_bill($iduser, $name, $address, $email, $tel, $daybook)
{
    $sql = "INSERT INTO bill(iduser, bill_name, bill_address, bill_email, bill_tel, daybook) VALUES ('$iduser', '$name', '$address', '$email', '$tel', '$daybook')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_booking($iduser, $idp, $img, $name, $price, $soluong, $checkin, $checkout, $time, $thanhtien, $pttt, $idbill)
{
    $sql = "INSERT INTO book(iduser, idp, img, name, price, soluong, checkin, checkout, time, thanhtien, pttt, idbill) VALUES ('$iduser', '$idp', '$img', '$name', '$price', '$soluong', '$checkin', '$checkout', '$time', '$thanhtien', '$pttt', '$idbill')";
    return pdo_execute($sql);
}

function tongcong()
{
    $total = 0;
    foreach ($_SESSION['my-booking'] as $book) {
        $id = $book[0];
        $ci = $book[4];
        $co = $book[5];
        $ttien = (floor((strtotime($co) - strtotime($ci)) / (60 * 60 * 24)) * $book[3] * $_SESSION['soluong'][$id]);
        $total += $ttien;
    }
    return $total;
}

function loadone_bill($daybook)
{
    $sql = "select bill.*, book.checkin, book.checkout, sum(book.soluong) 'soluong' from bill JOIN book on bill.id = book.idbill WHERE bill.daybook = '$daybook'";
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadone_book($id)
{
    $sql = "select trangthai from book where id=" . $id;
    $book = pdo_query_one($sql);
    return $book;
}
function loadall_booking($daybook)
{
    $sql = "select book.* from book join bill on bill.id = book.idbill where daybook = '$daybook'";
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($kyw = "", $iduser = 0)
{
    $sql = "select bk.*, b.daybook from bill b inner join book bk on bk.idbill = b.id where 1";
    if ($iduser > 0) {
        $sql .= " and b.iduser = " . $iduser;
    }
    if ($kyw != "") {
        $sql .= " and b.id like '%" . $kyw . "%'";
    }
    $sql .= " order by b.id desc";
    return pdo_query($sql);
}

function loadall_bill_admin()
{
    $sql = "select bk.*, b.bill_name, b.bill_tel, b.bill_address, b.daybook from bill b inner join book bk on bk.idbill = b.id order by b.id desc";
    return pdo_query($sql);
}

function update_room_availability($id, $idp, $soluong)
{
    $sqlUpdate = "update phong inner join book on phong.id = book.idp set dadat = dadat - " . $soluong . " where book.id = " . $id . " and phong.id = " . $idp . "";
    pdo_query($sqlUpdate);
}

function delete_bill($id)
{
    // Truy vấn thông tin cần thiết sử dụng $id được cung cấp
    $sql = "SELECT book.idp, book.id, book.soluong, book.idbill FROM book INNER JOIN phong ON phong.id = book.idp WHERE book.id = $id";
    $billInfo = pdo_query_one($sql);

    if ($billInfo) {
        $idp = $billInfo['idp'];
        $id = $billInfo['id'];
        $soluong = $billInfo['soluong'];
        $idbil = $billInfo['idbill'];

        // Cập nhật sự có sẵn của phòng
        update_room_availability($id, $idp, $soluong);

        // Xóa bản ghi từ bảng book và bill dựa trên $id được cung cấp
        $sqlDelete = "DELETE FROM book WHERE id = $id";
        $sqlDelete1 = "DELETE FROM bill WHERE id = $idbil";

        pdo_query($sqlDelete);
        pdo_query($sqlDelete1);
    }
}


// function delete_bill($id)
// {
//     $sql = "delete from book where id = " . $id;
//     pdo_query($sql);
// }

function load_book()
{
    $sql = "select * from book";
    return pdo_query($sql);
}

// function delete_bill_($id)
// {
//     $sql = "delete from book where id = " . $id;
//     pdo_query($sql);
// }

function update_bill($id, $tinhtrang)
{
    $sql = "update book set trangthai = '" . $tinhtrang . "' where id =" . $id;
    pdo_execute($sql);
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đặt phòng mới";
            break;
        case '1':
            $tt = "Đang xử lí";
            break;
        case '2':
            $tt = "Đặt thành công";
            break;
        case '3':
            $tt = "Đã trả phòng";
            break;
        default:
            $tt = "Đơn đặt mới";
            break;
    }
    return $tt;
}
function get_ttdh1($n)
{
    switch ($n) {
        case '0':
            $tt = '<span style="color: red;">Đặt phòng mới</span>';
            break;
        case '1':
            $tt = '<span style="color: orange;">Đang xử lí</span>';
            break;
        case '2':
            $tt = '<span style="color: green;">Đặt thành công</span>';
            break;
        default:
            $tt = "Đơn đặt mới";
            break;
    }
    return $tt;
}

function vn_pay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash)
{
    $sql = "insert into vnpay(vnp_Amount, vnp_BankCode, vnp_BankTranNo, vnp_CardType, vnp_OrderInfo, vnp_PayDate, vnp_ResponseCode, vnp_TmnCode, vnp_TransactionNo, vnp_TransactionStatus, vnp_TxnRef, vnp_SecureHash) values ('$vnp_Amount', '$vnp_BankCode', '$vnp_BankTranNo', '$vnp_CardType', '$vnp_OrderInfo', '$vnp_PayDate', '$vnp_ResponseCode', '$vnp_TmnCode', '$vnp_TransactionNo', '$vnp_TransactionStatus', '$vnp_TxnRef', '$vnp_SecureHash')";
    pdo_execute($sql);
}

function update_soluong_down($idp, $soluong)
{
    $sql = "update phong set dadat = dadat - " . $soluong . " where id = " . $idp;
    pdo_execute($sql);
}

function update_soluong_up($idp, $soluong)
{
    $sql = "update phong set dadat = dadat + " . $soluong . " where id = " . $idp;
    pdo_execute($sql);
}



?>