<?php

function insert_tienich($name, $icon, $mota){
    $sql = "insert into tienich(name, icon, mota) values('$name', '$icon', '$mota')";
    pdo_execute($sql);
}
function delete_tienich($id){
    $sql="delete from dichvu where id=".$id;
    pdo_execute($sql);
}
function loadall_tienich(){
    $sql="select * from dichvu order by id desc";
    $tienich=pdo_query($sql);
    return $tienich ;
}
function loadall_tienich_home(){
    $sql="select * from dichvu where 1 order by id asc";
    $tienich=pdo_query($sql);
    return $tienich ;
}
function loadone_tienich($id){
    $sql="select * from dichvu where id=".$id;
    $dv=pdo_query_one($sql);
    return $dv;
}
function update_tienich($id ,$name, $gia, $mota){
    $sql = "update dichvu set name='".$name."', mota='".$mota."', gia='".$gia."' where id=".$id;
    pdo_execute($sql);
}
?>