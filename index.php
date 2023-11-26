<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/loaiphong.php";
include "model/dichvu.php";
include "model/phong.php";
include "model/tienich.php";
include "model/giaca.php";
include "model/user.php";
include "model/booking.php";
include "global.php";

if (!isset($_SESSION['my-booking'])) {
    $_SESSION['my-booking'] = [];
}

$loaiphong = loadall_loaiphong_home();
$dichvu = loadall_dvphong_home();
$listphong = loadall_phong_page();
$listtienich = loadall_tienich_home();
$listgiaca = loadall_giaca_home();
$listloaiphong = loadall_loaiphong();

include "view/home-page/header.php";

if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "view/home-page/home.php";
            break;

        case 'room':
            if (isset($_GET['idlp']) && $_GET['idlp']) {
                $idlp = $_GET['idlp'];
                $dslp = loadall_phong_type("", $idlp);
                $namelp = load_ten_lp($idlp);
                include "view/list-room/type-of-list-room.php";
            } else {
                include "view/404/404.php";
            }
            break;

            // case 'room':
            //     if (isset($_POST['idlp']) && $_POST['idlp']) {
            //         $idlp = $_POST['idlp'];
            //     } else {
            //         $idlp = 0;
            //     }
            //     if (isset($_GET['idlp']) && $_GET['idlp']) {
            //         $idlp = $_GET['idlp'];
            //     }
            //     $dslp = search_empty_room("", "", $idlp);
            //     $namelp = load_ten_lp($idlp);
            //     include "view/list-room/type-of-list-room.php";
            //     break;

        case 'search':
            if (isset($_POST['idlp']) && $_POST['idlp']) {
                $idlp = $_POST['idlp'];
                $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];

                $checkin = date("Y-m-d", strtotime(urldecode($checkin)));
                $checkout = date("Y-m-d", strtotime(urldecode($checkout)));
            } else {
                $checkin = "";
                $checkout = "";
                $idlp = 0;
            }
            $dsroom = search_empty_room($checkin, $checkout, $idlp);
            $namelp = load_ten_lp($idlp);
            include "view/list-room/search-room.php";
            break;


        case 'room-detail':
            if (isset($_GET['idroom']) && $_GET['idroom']) {
                $id = $_GET['idroom'];
                $room = loadone_phong($id);
                extract($room);
                $room_cungloai = load_phong_cungloai($id, $idlp);
                $namelp = load_ten_lp($idlp);
                include "view/room-detail/room-detail.php";
            } else {
                include "view/404/404.php";
            }
            break;

        case 'sign-up':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                insert_user($user, $email, $name, $pass, $address, $tel);
                $thongbao = "Đăng kí thành công! Vui lòng đăng nhập để thao tác!";
            }
            include "view/user/sign-up.php";
            break;

        case 'sign-in':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại!";
                }
            }
            include "view/user/sign-in.php";
            break;

        case 'booking-room':
            if (isset($_POST['book']) && ($_POST['book'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];
                $days = floor((strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24));
                $money = $days * $price;
                $room_add = [$id, $name, $img, $price, $checkin, $checkout, $days, $money];
                array_push($_SESSION['my-booking'], $room_add);
            }
            include "view/booking/list-booking.php";
            break;

        case 'del-room':
            if (isset($_GET['idbook'])) {
                array_splice($_SESSION['my-booking'], $_GET['idbook'], 1);
            } else {
                $_SESSION['my-booking'] = [];
            }
            header("Location: index.php?act=booking-room");
            break;

        case 'bill':
            include "view/booking/bill.php";
            break;

        case 'billconfirm':
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if (isset($_POST['confirm']) && ($_POST['confirm'])) {
                $name = $_POST['name'];
                $idp = $_POST['idp'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];
                $daybook= date('h:i:sa d/m/Y');

                $id_isbook = insert_bill($idp, $name, $address, $email, $tel, $checkin, $checkout, $daybook);
                foreach ($_SESSION['my-booking'] as $booking) {
                    insert_booking($_SESSION['user']['id'], $booking[0], $booking[2], $booking[1], $booking[3], $booking[4], $booking[5], $booking[7], $id_isbook);
                }

                $_SESSION['my-booking'] = [];
            }
            $bill = loadone_bill($id_isbook);
            $bill_detail = loadall_booking($id_isbook);
            include "view/booking/billconfirm.php";
            break;

        case 'about':
            include "view/about/about.php";
            break;

        case 'careers':
            include "view/careers/careers.php";
            break;

        case '404':
            include "view/404/404.php";
            break;

        case "coming-soon":
            include "view/coming-soon/coming-soon.php";
            break;

        case "contact":
            include "view/contact/contact.php";
            break;

        case "facilities":
            include "view/facilities/facilities.php";
            break;

        case "services":
            include "view/services/services.php";
            break;

        case "spa":
            include "view/spa/spa.php";
            break;

        case "team":
            include "view/team/team.php";
            break;

        case "faq":
            include "view/faq/faq.php";
            break;

        case "gallery":
            include "view/gallery/gallery.php";
            break;

        case "news":
            include "view/news/news.php";
            break;

        case "pricing":
            include "view/pricing/pricing.php";
            break;

        case "restaurant":
            include "view/restaurant/restaurant.php";
            break;

        case "list-room":
            include "view/list-room/list-room.php";
            break;

        case 'log-out':
            session_unset();
            header('Location: index.php');
            break;

        default:
            include "view/home-page/home.php";
            break;
    }
} else {
    include "view/home-page/home.php";
}

include "view/home-page/footer.php";
