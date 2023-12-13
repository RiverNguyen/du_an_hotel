<?php
function insert_phong($name, $soluong, $img, $idlp, $mota)
{
    $sql = "insert into phong(name, soluong, img, idlp, mota) values ('" . $name . "', '" . $soluong . "', '" . $img . "', '" . $idlp . "', '" . $mota . "')";
    pdo_execute($sql);
}

function check_phong($name)
{
    $sql = "select * from phong where name = '" . $name . "'";
    $phong = pdo_query_one($sql);
    return $phong;
}

function delete_phong($id)
{
    $sql = "delete from phong where id = " . $id;
    pdo_query($sql);
}

function delete_phong_with_comment($id)
{
    $sql = "delete from binhluan where idroom = " . $id;
    pdo_query($sql);
}

function loadall_phong($idlp = 0)
{
    $sql = "select phong.idlp 'idlp', phong.id 'idp', phong.soluong, phong.name 'nameroom', phong.img 'img', loaiphong.price 'price', loaiphong.name 'nametype', phong.mota from phong inner join loaiphong on loaiphong.id = phong.idlp where 1";
    if ($idlp > 0) {
        $sql .= " and phong.idlp = '" . $idlp . "'";
    }
    $sql .= " order by phong.id desc";
    return $listphong = pdo_query($sql);
}

function loadall_phong_type($kyw = "", $idlp = 0)
{
    $sql = "select p.idlp 'idlp', p.id 'idp', p.name 'nameroom', p.img 'img', p.soluong 'soluong', p.dadat, lp.price 'price', lp.name 'nametype', p.mota from phong p inner join loaiphong lp on lp.id = p.idlp where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($idlp > 0) {
        $sql .= " and idlp = '" . $idlp . "'";
    }
    $sql .= " order by p.id asc";
    return $listphong = pdo_query($sql);
}

function loadall_phong_page()
{
    $sql = "select p.idlp 'idlp', p.id 'idp', p.name 'nameroom', p.soluong 'soluong', p.dadat 'dadat', p.img 'img', lp.price 'price', lp.name 'nametype', p.mota from phong p inner join loaiphong lp on lp.id = p.idlp order by p.id asc";
    return $listphong = pdo_query($sql);
}

function loadall_nguoilon()
{
    $sql = "select * from nguoilon";
    return $listnguoilon = pdo_query($sql);
}
function loadall_treem()
{
    $sql = "select * from treem";
    return $listtreem = pdo_query($sql);
}

function loadall_phong_bieudo($kyw = "", $iddm = 0)
{
    $sql = "select *, count(bl.id) 'soBinhLuan' from phong sp
    join binhluan bl on bl.idpro = sp.id
    where 1
    group by sp.id
    ;
    ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " order by sp.id desc";
    return $listphong = pdo_query($sql);
}
function loadall_phong_home()
{
    $sql = "select * from phong where 1 order by id desc limit 0, 15";

    return $listphong = pdo_query($sql);
}

function loadone_phong($id)
{
    $sql = "select p.idlp 'idlp', p.id 'idp', p.name 'nameroom', p.img 'img', p.soluong 'soluong', p.dadat 'dadat', lp.price 'price', lp.name 'nametype', p.mota from phong p inner join loaiphong lp on lp.id = p.idlp where p.id = " . $id;
    return $phong = pdo_query_one($sql);
}

function load_phong_cungloai($id, $idlp)
{
    $sql = "select p.idlp 'idlp', p.id 'idp', p.name 'nameroom', p.img 'img', lp.price 'price', lp.name 'nametype', p.mota from phong p inner join loaiphong lp on lp.id = p.idlp where p.idlp = " . $idlp . " and p.id <> " . $id;
    return $listphong = pdo_query($sql);
}

function update_phong($id, $name, $soluong, $img, $idlp, $mota)
{
    if ($img != "") {
        $sql = "update phong set name = '" . $name . "', soluong = '" . $soluong . "', img = '" . $img . "', idlp = '" . $idlp . "', mota = '" . $mota . "' where id = " . $id;
    } else {
        $sql = "update phong set name = '" . $name . "', soluong = '" . $soluong . "', idlp = '" . $idlp . "', mota = '" . $mota . "' where id = " . $id;
    }

    pdo_execute($sql);
}

function load_ten_lp($idlp)
{
    if ($idlp > 0) {
        $sql = "select * from loaiphong where id = " . $idlp;
        $lp = pdo_query_one($sql);
        extract($lp);
        return $name;
    } else {
        return "";
    }
}

function search_empty_room($checkin = "", $checkout = "", $idlp = 0)
{
    $sql = "SELECT p.id, p.name, p.img, p.mota, lp.price, p.soluong, p.dadat FROM phong p INNER JOIN loaiphong lp on lp.id = p.idlp";
    $searchInfor = pdo_query($sql);

    $availableRooms = [];

    foreach ($searchInfor as $room) {
        $soluong = $room['soluong'] - $room['dadat'];

        if ($soluong > 0) {
            $availableRooms[] = $room;
        }
    }

    if (!empty($availableRooms)) {
        $idList = array_column($availableRooms, 'id');
        $sql .= " AND p.id IN (" . implode(",", $idList) . ")";
    }

    if ($idlp > 0) {
        $sql .= " AND p.idlp = '" . $idlp . "'";
    }

    if ($checkin != "" && $checkout != "") {
        $sql .= " and p.soluong <> 0 or p.id NOT IN 
             (SELECT idp FROM book 
             WHERE ('$checkin' BETWEEN checkin AND checkout)
             OR ('$checkout' BETWEEN checkin and checkout)
             OR (checkin BETWEEN '$checkin' AND '$checkout')
             OR (checkout BETWEEN '$checkin' AND '$checkout')) group by p.id";
    }

    $sql .= " ORDER BY p.id ASC";
    return pdo_query($sql);
}


function get_current_dadat_value($id)
{
    $sql = "SELECT dadat FROM phong WHERE id = " . $id;
    $result = pdo_query_one($sql);
    return $result ? $result['dadat'] : 0;
}

function update_emtyroom_number($id, $soluongdadat)
{
    $currentDadat = get_current_dadat_value($id);
    $newDadat = $currentDadat + $soluongdadat;
    $sql = "update phong set dadat = " . $newDadat . " where id = " . $id;
    pdo_execute($sql);
}

// function search_empty_room($checkin = "", $checkout = "", $idlp = 0)
// {
//     $sql = "SELECT p.id 'id', p.name 'name', p.price 'price', p.img 'img', p.mota 'mota'  FROM phong p
//     INNER JOIN loaiphong lp on lp.id = p.idlp";
//     if ($idlp > 0) {
//         $sql .= " and p.idlp = '.$idlp.'";
//     }
//     if ($checkin != "" && $checkout != "") {
//         $sql .= " AND p.is_order = 0 AND p.id NOT IN 
//         (SELECT idp FROM bill 
//         WHERE ('.$checkin.' BETWEEN checkin AND checkout)
//         OR ('.$checkout.' BETWEEN checkin and checkout)
//         OR (checkin BETWEEN '.$checkin.' AND '.$checkout.')
//         OR (checkout BETWEEN '.$checkin.' AND '.$checkout.'))";
//     }
//     $sql .= " order by id desc";
//     return pdo_query($sql);
// }
