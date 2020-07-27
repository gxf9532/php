<?php

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

$sql ="update shops set name=?,price=?,num=?,desn=? where id=?";

// $sql = "select name,price,num,desn from shops where id=?";

$stmt = $mysqli->prepare($sql);

// 绑定
$stmt->bind_param("sdisi", $name, $price,$num,$desn,$id);

$name = "abc";
$price = 20.35;
$num = 100;
$desn = "haha";
$id = 11;

// 执行
$stmt->execute(); 
