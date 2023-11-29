<?php
include "../model/pdo.php";
include "../model/loaiphong.php";
include "../model/phong.php";
include "../model/dichvu.php";
include "../model/tienich.php";
include "../model/giaca.php";
include "../model/user.php";
include "header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "listlp":
            $dsloaiphong = loadall_loaiphong();
            include "loaiphong/list.php";
            break;

        case "addlp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $idnl = $_POST['idnl'];
                $idte = $_POST['idte'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/type-of-room/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                insert_loaiphong($name, $img, $price, $idnl, $idte);
                $thongbao = "Thêm thành công";
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
                $name = $_POST['name'];
                $id = $_POST['id'];
                $price = $_POST['price'];
                $idnl = $_POST['idnl'];
                $idte = $_POST['idte'];
                $img = $_FILES['img']['name'];
                $target_dir = "../img/type-of-room/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                update_loaiphong($id, $name, $img, $price, $idnl, $idte);
                $thongbao = "cap nhat thanh cong";
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
                $img = $_FILES['img']['name'];
                $target_dir = "../img/rooms/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                insert_phong($name, $img, $idlp, $mota);
                $thongbao = "Thêm thành công";
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
                $img = $_FILES['img']['name'];
                $target_dir = "../img/rooms/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // File moved successfully.
                } else {
                    echo "Error: File could not be moved.";
                }
                update_phong($id, $name, $img, $idlp, $mota);
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

        case "xoagc";
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_giaca($_GET['id']);
            }
            $listgiaca = loadall_giaca();
            include "giaca/list.php";
            break;

        case "suagc";
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $gc = loadone_giaca($_GET['id']);
            }
            include "giaca/update.php";
            break;

        case "updategc";
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

        case "del-account";
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listAccount = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
