<?php
function load_thongke_sophong()
{
    $sql = "select p.id, p.name, p.soluong, lp.name from phong p inner join loaiphong lp on lp.id = p.idlp order by p.id desc";
    return pdo_query($sql);
}

function loadall_soluongphongdat()
{
    $sql = "select loaiphong.id, loaiphong.name, loaiphong.price, (phong.soluong - phong.dadat) 'soluong' from phong join loaiphong on phong.idlp = loaiphong.id GROUP BY loaiphong.name order by loaiphong.id asc";
    return pdo_query($sql);
}

function load_sophongdat()
{
    $sql = "select count(id) 'phongdat' from book where trangthai = 2";
    return pdo_query($sql);
}

function loadall_sophongdat()
{
    $sql = "select * from book join bill on book.idbill = bill.id where trangthai = 2";
    return pdo_query($sql);
}

function load_sophongtrong()
{
    $sql = "SELECT sum(soluong - dadat) 'phongtrong' FROM `phong`";
    return pdo_query($sql);
}

function load_sotaikhoan()
{
    $sql = "select count(id) 'sotaikhoan' from taikhoan";
    return pdo_query($sql);
}

function load_tien()
{
    $sql = "select sum(thanhtien) 'tongtien' from book where trangthai = 2";
    return pdo_query($sql);
}

function load_binhluan()
{
    $sql = "select count(id) 'binhluan' from binhluan";
    return pdo_query($sql);
}

function load_bill_count()
{
    $sql = "select count(id) 'bill' from book";
    return pdo_query($sql);
}

function load_thongke_all()
{
    $sql = "select p.name, lp.name 'loaiphong', p.soluong, p.dadat from phong p 
    JOIN loaiphong lp on lp.id = p.idlp";
    return pdo_query($sql);
}

function load_tien_thongke()
{
    $sql = "select *, SUM(thanhtien) 'tongtien' from book
    GROUP BY name";
    return pdo_query($sql);
}

function load_binhluan_thongke()
{
    $sql = "SELECT phong.name, noidung, COUNT(idroom) 'soluong' FROM `binhluan` INNER JOIN phong on phong.id = binhluan.idroom GROUP BY phong.name";
    return pdo_query($sql);
}
