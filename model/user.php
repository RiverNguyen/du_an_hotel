<?php
function insert_user($user, $email, $name, $pass, $address, $tel)
{
    $sql = "insert into taikhoan(user, email, name, pass, address, tel) values('$user', '$email', '$name', '$pass', '$address', '$tel')";
    pdo_execute($sql);
}

function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where user = '" . $user . "' and pass = '" . $pass . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}

function checkemail($email)
{
    $sql = "select * from taikhoan where email='" . $email . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}

function update_account($id, $user, $name, $email, $pass, $address, $tel)
{
    $sql = "update taikhoan set user = '" . $user . "', name = '" . $name . "', pass = '" . $pass . "', email = '" . $email . "', address = '" . $address . "', tel = '" . $tel . "' where id =" . $id;

    pdo_execute($sql);
}
function update_matkhau($id, $user, $email, $pass)
{
    $sql = "update taikhoan set user = '" . $user . "', pass = '" . $pass . "', email = '" . $email . "' where id =" . $id;

    pdo_execute($sql);
}

function forgot_pass($email, $pass)
{
    $sql = "update taikhoan set pass = '" . $pass . "' where email = '" . $email . "'";
    pdo_execute($sql);
}

function loadall_taikhoan()
{
    $sql = "select * from taikhoan order by id desc";
    return $listtaikhoan = pdo_query($sql);
}

function loadone_taikhoan($id)
{
    $sql = "select * from taikhoan where id = " . $id;
    return $tk = pdo_query_one($sql);
}

function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id = " . $id;
    pdo_query($sql);
}
