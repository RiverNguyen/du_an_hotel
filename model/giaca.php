<?php

function insert_giaca($name, $img, $price)
{
    $sql = "insert into giaca(name, img, price) values('$name', '$img', '$price')";
    pdo_execute($sql);
}
function delete_giaca($id)
{
    $sql = "delete from giaca where id= " . $id;
    pdo_execute($sql);
}
function loadall_giaca()
{
    $sql = "select * from giaca order by id desc";
    $listgiaca = pdo_query($sql);
    return $listgiaca;
}
function loadall_giaca_home()
{
    $sql = "select * from giaca where 1 order by id asc";
    $listgiaca = pdo_query($sql);
    return $listgiaca;
}
function loadone_giaca($id)
{
    $sql = "select * from giaca where id=" . $id;
    $gc = pdo_query_one($sql);
    return $gc;
}
function update_giaca($id, $name, $img, $price)
{
    if ($img != "") {
        $sql = "update giaca set name = '" . $name . "', img = '" . $img . "', price = '" . $price . "' where id =" . $id;
    } else {
        $sql = "update giaca set name = '" . $name . "', price = '" . $price . "' where id =" . $id;
    }
    pdo_execute($sql);
}
