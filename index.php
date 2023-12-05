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
include "model/mail/index.php";
include "global.php";
$mail = new Mailer();

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

        case 'search':
            $_SESSION['date'] = [];

            if (isset($_POST['idlp']) && $_POST['idlp']) {
                $idlp = $_POST['idlp'];
                $checkin = $_POST['checkin'];
                $checkin = date("Y-m-d", strtotime(urldecode($checkin)));
                $checkout = $_POST['checkout'];
                $checkout = date("Y-m-d", strtotime(urldecode($checkout)));
                $add = [$checkin, $checkout];
                array_push($_SESSION['date'], $add);
            } else {
                $checkin = $_POST['checkin'];
                $checkin = date("Y-m-d", strtotime(urldecode($checkin)));
                $checkout = $_POST['checkout'];
                $checkout = date("Y-m-d", strtotime(urldecode($checkout)));
                $add = [$checkin, $checkout];
                array_push($_SESSION['date'], $add);
                $idlp = 0;
            }

            $dsroom = search_empty_room($checkin, $checkout, $idlp);
            $namelp = load_ten_lp($idlp);
            include "view/list-room/search-room.php";
            break;

        case 'room-detail':
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
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

        case 'edit-account':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $id = $_POST['id'];

                update_account($id, $user, $name, $email, $pass, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                header("Location: index.php?act=edit-account");
            }
            include "view/user/edit-account.php";
            break;

        case 'sign-in':

            if (isset($_POST['dangnhap']) && !empty($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $return_to = isset($_SESSION['return_to']) ? $_SESSION['return_to'] : 'index.php';
                    header('Location: ' . $return_to);
                    exit();
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại!";
                }
            }
            // Include the sign-in view
            include "view/user/sign-in.php";
            break;


        case 'forgot-pass':
            if (isset($_POST['forgot']) && ($_POST['forgot'])) {
                $error = array();
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Quên mật khẩu";
                    $content = "Mã xác nhận của bạn là: <span style='color: red; font-weight: bold;'>" . $code . "</span>";
                    $mail->sendMail($title, $content, $email);
                    $_SESSION['mail'] = $email;
                    $_SESSION['code'] = $code;
                    header("Location: index.php?act=verification");
                } else {
                    $error['fail'] = "Email không tồn tại. Vui lòng kiểm tra lại!";
                }
            }
            include "view/user/forgot-pass.php";
            break;

        case 'verification':
            if (isset($_POST['verify']) && ($_POST['verify'])) {
                $error = array();
                if ($_POST['text'] != $_SESSION['code']) {
                    $error['fail'] = "Mã xác nhận không đúng. Vui lòng kiểm tra lại!";
                } else {
                    header("Location: index.php?act=change-pass");
                }
            }
            include "view/user/verification.php";
            break;

        case 'change-pass':
            if (isset($_POST['submit'])) {
                $error = array();
                if ($_POST['repass'] != $_POST['newpass']) {
                    $error['fail'] = "Mật khẩu không trùng khớp. Vui lòng kiểm tra lại!";
                } else {
                    $error['success'] = "Đổi mật khẩu thành công!";
                    $email = $_SESSION['mail'];
                    $pass = $_POST['newpass'];
                    forgot_pass($email, $pass);
                    header("Location: index.php?act=sign-in");
                }
            }
            include "view/user/change-pass.php";
            break;

        case 'booking-room':
            if (isset($_POST['book']) && ($_POST['book'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $checkin = $_SESSION['date'][0][0];
                $checkout = $_SESSION['date'][0][1];
                $days = floor((strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24));
                $money = $days * $price * $soluong;
                $room_add = [$id, $name, $img, $price, $soluong, $checkin, $checkout, $days, $money];
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
                if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                else $id = 0;
                $name = $_POST['name'];
                $iduser = $_SESSION['user']['id'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = 'Thanh toán khi nhận phòng';
                $total = tongcong();
                $daybook = date('h:i:sa d/m/Y');
                foreach ($_SESSION['my-booking'] as $booking) {
                    $id_isbook = insert_bill($iduser, $name, $address, $email, $tel, $daybook);
                    insert_booking($_SESSION['user']['id'], $booking[0], $booking[2], $booking[1], $booking[3], $booking[4], $booking[5], $booking[6], $booking[8], $pttt, $id_isbook);
                    get_current_dadat_value($booking[0]);
                    update_emtyroom_number($booking[0], $booking[4]);
                }
                $_SESSION['my-booking'] = [];
            } else if (isset($_POST['redirect'])) {
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "  http://localhost/test/index.php?act=thanks";
                $vnp_TmnCode = "XB4CM42C"; //Mã website tại VNPAY 
                $vnp_HashSecret = "EOGJTBUVKSBPPWDWRBMCBLGMQDVDQKUU"; //Chuỗi bí mật

                $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Noi dung thanh toan';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = tongcong() * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                // $vnp_Bill_Email = $_POST['txt_billing_email'];
                // $fullName = trim($_POST['txt_billing_fullname']);
                // if (isset($fullName) && trim($fullName) != '') {
                //     $name = explode(' ', $fullName);
                //     $vnp_Bill_FirstName = array_shift($name);
                //     $vnp_Bill_LastName = array_pop($name);
                // }
                // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
                // $vnp_Bill_City = $_POST['txt_bill_city'];
                // $vnp_Bill_Country = $_POST['txt_bill_country'];
                // $vnp_Bill_State = $_POST['txt_bill_state'];
                // // Invoice
                // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
                // $vnp_Inv_Email = $_POST['txt_inv_email'];
                // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
                // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
                // $vnp_Inv_Company = $_POST['txt_inv_company'];
                // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
                // $vnp_Inv_Type = $_POST['cbo_inv_type'];
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef

                    // "vnp_ExpireDate" => $vnp_ExpireDate,
                    // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                    // "vnp_Bill_Email" => $vnp_Bill_Email,
                    // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                    // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                    // "vnp_Bill_Address" => $vnp_Bill_Address,
                    // "vnp_Bill_City" => $vnp_Bill_City,
                    // "vnp_Bill_Country" => $vnp_Bill_Country,
                    // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                    // "vnp_Inv_Email" => $vnp_Inv_Email,
                    // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                    // "vnp_Inv_Address" => $vnp_Inv_Address,
                    // "vnp_Inv_Company" => $vnp_Inv_Company,
                    // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                    // "vnp_Inv_Type" => $vnp_Inv_Type
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                // }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                    else $id = 0;
                    $name = $_POST['name'];
                    $idp = $_POST['idp'];
                    $iduser = $_SESSION['user']['id'];
                    $soluong = $_POST['soluong'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];
                    $pttt = 'Thanh toán online';
                    if (isset($_GET['vnp_Amount'])) {
                        $vnp_Amount = $_GET['vnp_Amount'];
                        $vnp_BankCode = $_GET['vnp_BankCode'];
                        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                        $vnp_CardType = $_GET['vnp_CardType'];
                        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                        $vnp_PayDate = $_GET['vnp_PayDate'];
                        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
                        $vnp_TmnCode = $_GET['vnp_TmnCode'];
                        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                        $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
                        $vnp_TxnRef = $_GET['vnp_TxnRef'];
                        $vnp_SecureHash = $_GET['vnp_SecureHash'];
                        vn_pay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash);
                    }
                    $daybook = date('h:i:sa d/m/Y');
                    foreach ($_SESSION['my-booking'] as $booking) {
                        $id_isbook = insert_bill($iduser, $name, $address, $email, $tel, $daybook);
                        insert_booking($_SESSION['user']['id'], $booking[0], $booking[2], $booking[1], $booking[3], $booking[4], $booking[5], $booking[6], $booking[8], $pttt, $id_isbook);
                        get_current_dadat_value($booking[0]);
                        update_emtyroom_number($booking[0], $booking[4]);
                    }
                    $_SESSION['my-booking'] = [];
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }

            $bill = loadone_bill($daybook);
            $bill_detail = loadall_booking($daybook);
            include "view/booking/billconfirm.php";
            break;

        case 'thanks':
            if (isset($_POST['redirect'])) {
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/test/index.php?act=thanks";
                $vnp_TmnCode = "XB4CM42C"; //Mã website tại VNPAY 
                $vnp_HashSecret = "EOGJTBUVKSBPPWDWRBMCBLGMQDVDQKUU"; //Chuỗi bí mật

                $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Noi dung thanh toan';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = tongcong() * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                //Add Params of 2.0.1 Version
                // $vnp_ExpireDate = $_POST['txtexpire'];
                //Billing
                // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                // $vnp_Bill_Email = $_POST['txt_billing_email'];
                // $fullName = trim($_POST['txt_billing_fullname']);
                // if (isset($fullName) && trim($fullName) != '') {
                //     $name = explode(' ', $fullName);
                //     $vnp_Bill_FirstName = array_shift($name);
                //     $vnp_Bill_LastName = array_pop($name);
                // }
                // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
                // $vnp_Bill_City = $_POST['txt_bill_city'];
                // $vnp_Bill_Country = $_POST['txt_bill_country'];
                // $vnp_Bill_State = $_POST['txt_bill_state'];
                // // Invoice
                // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
                // $vnp_Inv_Email = $_POST['txt_inv_email'];
                // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
                // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
                // $vnp_Inv_Company = $_POST['txt_inv_company'];
                // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
                // $vnp_Inv_Type = $_POST['cbo_inv_type'];
                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef

                    // "vnp_ExpireDate" => $vnp_ExpireDate,
                    // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                    // "vnp_Bill_Email" => $vnp_Bill_Email,
                    // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                    // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                    // "vnp_Bill_Address" => $vnp_Bill_Address,
                    // "vnp_Bill_City" => $vnp_Bill_City,
                    // "vnp_Bill_Country" => $vnp_Bill_Country,
                    // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                    // "vnp_Inv_Email" => $vnp_Inv_Email,
                    // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                    // "vnp_Inv_Address" => $vnp_Inv_Address,
                    // "vnp_Inv_Company" => $vnp_Inv_Company,
                    // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                    // "vnp_Inv_Type" => $vnp_Inv_Type
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                // }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }

        case 'thanks-web':
            if (isset($_GET['vnp_Amount'])) {
                $vnp_Amount = $_GET['vnp_Amount'];
                $vnp_BankCode = $_GET['vnp_BankCode'];
                $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                $vnp_CardType = $_GET['vnp_CardType'];
                $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                $vnp_PayDate = $_GET['vnp_PayDate'];
                $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
                $vnp_TmnCode = $_GET['vnp_TmnCode'];
                $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
                $vnp_TxnRef = $_GET['vnp_TxnRef'];
                $vnp_SecureHash = $_GET['vnp_SecureHash'];
                vn_pay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash);
            }
            include 'view/booking/thanks.php';
            break;

        case 'my-bill':

            $listBill = loadall_bill("", $_SESSION['user']['id']);
            include "view/booking/mybill.php";
            break;

        case 'delmy-bill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $listBill = loadall_bill("", $_SESSION['user']['id']);
            include "view/booking/mybill.php";
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
