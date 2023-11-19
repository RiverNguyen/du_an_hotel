<?php
function insert_phong($name, $price, $img, $idnl, $idte, $idlp, $checkin, $checkout, $mota)
{
    $sql = "insert into phong(name, price, img, idnl, idte, idlp, checkin, checkout, mota) values('" . $name . "', '" . $price . "', '" . $img . "', '" . $idnl . "', '" . $idte . "', '" . $idlp . "', '" . $checkin . "', '" . $checkout . "', '" . $mota . "')";
    pdo_execute($sql);
}

function delete_phong($id)
{
    $sql = "delete from phong where id = " . $id;
    pdo_query($sql);
}

function loadname_loaiphong() {
    $sql = "select lp.name from loaiphong lp join phong p on lp.id = p.idlp";
    return $listname = pdo_query($sql);
}

function loadall_phong($idlp = 0)
{
    $sql = "select * from phong where 1";
    if ($idlp > 0) {
        $sql .= " and idlp = '" . $idlp . "'";
    }
    $sql .= " order by id desc";
    return $listphong = pdo_query($sql);
}

function loadall_phong_page()
{
    $sql = "select * from phong where 1 order by id asc";
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
function loadall_phong_top10()
{
    $sql = "select * from phong where 1 order by luotxem desc limit 0,10";

    return $listphong = pdo_query($sql);
}
function loadall_phong_home()
{
    $sql = "select * from phong where 1 order by id desc limit 0, 15";

    return $listphong = pdo_query($sql);
}

function loadone_phong($id)
{
    $sql = "select * from phong where id = " . $id;
    return $sp = pdo_query_one($sql);
}

function load_phong_cungloai($id, $iddm)
{
    $sql = "select * from phong where iddm = " . $iddm . " and id <> " . $id;
    return $listphong = pdo_query($sql);
}

function update_phong($id, $name, $price, $img, $idnl, $idte, $idlp, $checkin, $checkout, $mota)
{
    if ($img != "") {
        $sql = "update phong set name = '" . $name . "', price = '" . $price . "', img = '" . $img . "', idnl = '" . $idnl . "', idte = '" . $idte . "', idlp = '" . $idlp . "', checkin = '" . $checkin . "', checkout = '" . $checkout . "', mota = '" . $mota . "' where id =" . $id;
    } else {
        $sql = "update phong set name = '" . $name . "', price = '" . $price . "', idnl = '" . $idnl . "', idte = '" . $idte . "', idlp = '" . $idlp . "', checkin = '" . $checkin . "', checkout = '" . $checkout . "', mota = '" . $mota . "' where id =" . $id;
    }

    pdo_execute($sql);
}
