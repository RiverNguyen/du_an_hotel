<?php

function insert_tienich($name, $icon, $mota)
{
    $sql = "insert into tienich(name, icon, mota) values('$name', '$icon', '$mota')";
    pdo_execute($sql);
}
function delete_tienich($id)
{
    $sql = "delete from tienich where id=" . $id;
    pdo_execute($sql);
}
function loadall_tienich()
{
    $sql = "select * from tienich order by id desc";
    $tienich = pdo_query($sql);
    return $tienich;
}
function loadall_tienich_home()
{
    $sql = "select * from tienich where 1 order by id asc";
    $tienich = pdo_query($sql);
    return $tienich;
}
function loadone_tienich($id)
{
    $sql = "select * from tienich where id=" . $id;
    $dv = pdo_query_one($sql);
    return $dv;
}
function update_tienich($id, $name, $icon, $mota)
{
    $sql = "update tienich set name='" . $name . "', mota='" . $mota . "', icon='" . $icon . "' where id=" . $id;
    pdo_execute($sql);
}
