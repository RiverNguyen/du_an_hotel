<?php

function insert_binhluan($noidung, $iduser, $idroom, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung, iduser, idroom, ngaybinhluan) values('$noidung', '$iduser', '$idroom', '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($idroom)
{

    $sql = "select * from binhluan where 1";
    if ($idroom > 0) {
        $sql .= " and idroom = '" . $idroom . "'";
    } else {
        $sql .= " order by id desc";
    }

    return $listbinhluan = pdo_query($sql);
}
function loadall_binhluan_taikhoan($idroom)
{

    $sql = "select bl.id, bl.*, tk.name from binhluan bl join taikhoan tk on bl.iduser = tk.id where 1";
    if ($idroom > 0) {
        $sql .= " and idroom = '" . $idroom . "'";
    } else {
        $sql .= " order by tk.id desc";
    }

    return $listbinhluan = pdo_query($sql);
}

function delete_binhluan($id)
{
    $sql = "delete from binhluan where id = " . $id;
    pdo_query($sql);
}

function loadall_binhluan_bieudo($idroom)
{

    $sql = "select *, count(bl.id) 'soBinhLuan' from sanpham sp
    join binhluan bl on bl.idroom = sp.id
    where 1
    group by sp.id
    order by sp.id desc    
    ";
    return pdo_query($sql);
}
// Hello