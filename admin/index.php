<?php
ob_start();
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 0) {
    header('Location: ../index.php');
}
include "../model/pdo.php";
include "../model/loaiphong.php";
include "../model/phong.php";
include "../model/dichvu.php";
include "../model/tienich.php";
include "../model/giaca.php";
include "../model/user.php";
include "../model/comment.php";
include "../model/booking.php";
include "../model/thongke.php";
include "header.php";
$phongdat = load_sophongdat();
$phongtrong = load_sophongtrong();
$taikhoan = load_sotaikhoan();
$tien = load_tien();
$binhluan = load_binhluan();
$bill = load_bill_count();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sophongdat':
            $phongdat = loadall_sophongdat();
            include "thongke/sophongdat.php";
            break;

        case 'sophongtrong':
            $phongtrong = loadall_soluongphongdat();
            include "thongke/sophongtrong.php";
            break;

        case "listlp":
            $dsloaiphong = loadall_loaiphong();
            include "loaiphong/list.php";
            break;

        case "home":
            $phongdat = load_sophongdat();
            $phongtrong = load_sophongtrong();
            $taikhoan = load_sotaikhoan();
            $tien = load_tien();
            $binhluan = load_binhluan();
            $bill = load_bill_count();
            include "home.php";
            break;

        case "addlp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $idnl = $_POST['idnl'];
                $idte = $_POST['idte'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                if (is_array(check_loaiphong($name))) {
                    $thongbao = "Loại phòng đã tồn tại";
                } else if (empty($idnl) || empty($idte) || empty($name) || empty($price)) {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin";
                } else {
                    $img = $_FILES['img']['name'];
                    $target_dir = "../img/type-of-room/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);

                    if (!empty($img)) {
                        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                            insert_loaiphong($name, $img, $price, $idnl, $idte);
                            $thongbao = "Thêm thành công";
                        } else {
                            $thongbao = "Error: File could not be moved.";
                        }
                    } else {
                        $thongbao = "Vui lòng chọn một hình ảnh";
                    }
                }
            }
            $listnguoilon = loadall_nguoilon();
            $listtreem = loadall_treem();
            include "loaiphong/add.php";
            break;

        case "xoalp";
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_loaiphong($_GET['id']);
            }
            $dsloaiphong = loadall_loaiphong();
            include "loaiphong/list.php";
            break;

        case "sualp";
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $lp = loadone_loaiphong($_GET['id']);
            }
            $listnguoilon = loadall_nguoilon();
            $listtreem = loadall_treem();
            include "loaiphong/update.php";
            break;

        case "updatelp";
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $idnl = $_POST['idnl'];
                $idte = $_POST['idte'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/type-of-room/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                }
                update_loaiphong($id, $name, $img, $price, $idnl, $idte);
            }
            $dsloaiphong = loadall_loaiphong();
            $listnguoilon = loadall_nguoilon();
            $listtreem = loadall_treem();
            include "loaiphong/list.php";
            break;

        case "addp":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $idlp = $_POST['idlp'];
                $name = $_POST['name'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $img = $_FILES['img']['name'];

                // Kiểm tra rỗng
                if (empty($name) || empty($mota) || empty($soluong) || empty($img)) {
                    $thongbao = "Vui lòng điền đầy đủ thông tin.";
                } else if (is_array(check_phong($name))) {
                    $thongbao = "Phòng đã tồn tại";
                } else {
                    // Kiểm tra số lượng phòng là số nguyên dương
                    if (!is_numeric($soluong) || $soluong <= 0 || !filter_var($soluong, FILTER_VALIDATE_INT)) {
                        $thongbao = "Số lượng phòng phải là một số nguyên dương.";
                    } else {
                        // Kiểm tra hình ảnh
                        $target_dir = "../img/rooms/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        if (getimagesize($_FILES["img"]["tmp_name"]) === false || !in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
                            $thongbao = "Vui lòng chọn một tệp hình ảnh hợp lệ (jpg, jpeg, png, gif).";
                        } else {
                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                // File moved successfully.
                                insert_phong($name, $soluong, $img, $idlp, $mota);
                                $thongbao = "Thêm thành công";
                            } else {
                                $thongbao = "Error: File could not be moved.";
                            }
                        }
                    }
                }
            }
            $dsloaiphong = loadall_loaiphong();
            include "phong/add.php";
            break;


        case 'listp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $idlp = $_POST['idlp'];
            } else {
                $idlp = 0;
            }
            $listphong = loadall_phong($idlp);
            $dsloaiphong = loadall_loaiphong();
            include 'phong/list.php';
            break;

        case "xoap":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_phong($_GET['id']);
                delete_phong_with_comment($_GET['id']);
            }
            $listphong = loadall_phong();
            include "phong/list.php";
            break;

        case "suap":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $p = loadone_phong($_GET['id']);
            }
            $dsloaiphong = loadall_loaiphong();
            include "phong/update.php";
            break;

        case "updatep":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $idlp = $_POST['idlp'];
                $name = $_POST['name'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/rooms/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                }
                update_phong($id, $name, $soluong, $img, $idlp, $mota);
                $thongbao = "Thêm thành công";
            }
            $listphong = loadall_phong(0);
            $dsloaiphong = loadall_loaiphong();
            include "phong/list.php";
            break;

        case "adddv":
            if (isset($_POST['themdv']) && ($_POST['themdv'])) {
                $name = $_POST['name'];
                $url = $_POST['url'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/facilities/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                insert_dvphong($name, $url, $img, $gia, $mota);
                $thongbao = "Thêm thành công";
            }
            include "dichvu/add.php";
            break;

        case "listdv":
            $dsdichvu = loadall_dvphong();
            include "dichvu/list.php";
            break;

        case "xoadv":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_dvphong($_GET['id']);
            }
            $dsdichvu = loadall_dvphong();
            include "dichvu/list.php";
            break;

        case "suadv":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dv = loadone_dvphong($_GET['id']);
            }
            include "dichvu/update.php";
            break;

        case "updatedv":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                update_dvphong($id, $name, $gia, $mota);
                $thongbao = "Cập nhật thành công";
            }
            $dsdichvu = loadall_dvphong();
            include "dichvu/list.php";
            break;

        case "addti":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $icon = $_POST['icon'];
                $mota = $_POST['mota'];
                insert_tienich($name, $icon, $mota);
                $thongbao = "Thêm thành công";
            }
            include "tienich/add.php";
            break;

        case "listti":
            $listtienich = loadall_tienich();
            include "tienich/list.php";
            break;

        case "xoati":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_tienich($_GET['id']);
            }
            $listtienich = loadall_tienich();
            include "tienich/list.php";
            break;

        case "suati":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $ti = loadone_tienich($_GET['id']);
            }
            include "tienich/update.php";
            break;

        case "updateti":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $icon = $_POST['icon'];
                $mota = $_POST['mota'];
                update_tienich($id, $name, $icon, $mota);
                $thongbao = "Cập nhật thành công";
            }
            $listtienich = loadall_tienich();
            include "tienich/list.php";
            break;

        case "addgc":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/pricing/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                insert_giaca($name, $img, $price);
                $thongbao = "Thêm thành công";
            }
            include "giaca/add.php";
            break;

        case "listgc":
            $listgiaca = loadall_giaca();
            include "giaca/list.php";
            break;

        case "xoagc":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_giaca($_GET['id']);
            }
            $listgiaca = loadall_giaca();
            include "giaca/list.php";
            break;

        case "suagc":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $gc = loadone_giaca($_GET['id']);
            }
            include "giaca/update.php";
            break;

        case "updategc":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/pricing/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                $price = $_POST['price'];
                update_giaca($id, $name, $img, $price);
                $thongbao = "cap nhat thanh cong";
            }
            $listgiaca = loadall_giaca();
            include "giaca/list.php";
            break;

        case "list-account":
            $listAccount = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "sua-account":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $acc = loadone_taikhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;

        case "update-account":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_account_admin($id, $user, $name, $email, $pass, $address, $tel, $role);
                $thongbao = "Cập nhật thành công";
            }
            $listAccount = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "del-account":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
                delete_comment_user($_GET['id']);
            }
            $listAccount = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "list-comment":
            $listComment = loadall_binhluan_taikhoan(0);
            include "binhluan/list.php";
            break;

        case "del-comment":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listComment = loadall_binhluan_taikhoan(0);
            include "binhluan/list.php";
            break;

        case "list-bill":
            $listBill = loadall_bill_admin();
            include "bill/list.php";
            break;

        case "del-bill":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $listBill = loadall_bill_admin();
            include "bill/list.php";
            break;

            // case 'suabill':
            //     if (isset($_GET['id']) && $_GET['id'] > 0) {
            //         $book = loadone_book($_GET['id']);
            //     }
            //     include 'bill/update.php';
            //     break;

        case 'update-bill':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tinhtrang = $_POST['tinhtrang'];
                $soluong = $_POST['soluong'];
                $idp = $_POST['idp'];
                if ($tinhtrang == 3) {
                    update_soluong_down($idp, $soluong);
                    update_bill($id, $tinhtrang);
                } else {
                    // Kiểm tra trạng thái hiện tại trước khi cập nhật
                    $currentState = loadone_book($id); // Thay getCurrentState bằng hàm để lấy trạng thái hiện tại
                    if ($currentState['trangthai'] == 3) {
                        update_soluong_up($idp, $soluong);
                    }
                    update_bill($id, $tinhtrang);
                }
            }
            $listBill = loadall_bill_admin();
            include "bill/list.php";
            break;

        case 'thongke':
            $dsthongke = load_thongke_sophong();
            $dsthongke2 = load_thongke_all();
            $dsthongke3 = load_tien_thongke();
            $dsthongke4 = load_binhluan_thongke();
            include "thongke/bieudo.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
