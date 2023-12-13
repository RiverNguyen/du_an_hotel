<?php

function insert_loaiphong($name, $img, $price, $idnl, $idte)
{
    $sql = "insert into loaiphong(name, img, price, idnl, idte) values('" . $name . "', '" . $img . "', '" . $price . "', '" . $idnl . "', '" . $idte . "')";
    pdo_execute($sql);
}

function check_loaiphong($name)
{
    $sql = "select * from loaiphong where name = '" . $name . "'";
    $dm = pdo_query_one($sql);
    return $dm;
}
function delete_loaiphong($id)
{
    $sql = "delete from loaiphong where id= " . $id;
    pdo_execute($sql);
}
function loadall_loaiphong()
{
    $sql = "select * from loaiphong order by id desc";
    $dsloaiphong = pdo_query($sql);
    return $dsloaiphong;
}
function loadall_loaiphong_home()
{
    $sql = "select * from loaiphong where 1 order by id asc limit 0,5";
    $dsloaiphong = pdo_query($sql);
    return $dsloaiphong;
}
function loadone_loaiphong($id)
{
    $sql = "select * from loaiphong where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_loaiphong($id, $name, $img, $price, $idnl, $idte)
{
    if($img != "") {
        $sql = "update loaiphong set name = '" . $name . "', img = '" . $img . "', price = '" . $price . "', idnl = '" . $idnl . "', idte = '" . $idte . "' where id =" . $id;
    } else {
        $sql = "update loaiphong set name = '" . $name . "', price = '" . $price . "', idnl = '" . $idnl . "', idte = '" . $idte . "' where id =" . $id;
    }
    pdo_execute($sql);
}
