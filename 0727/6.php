<?php

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

$stmt = $mysqli->prepare("select id,name,price,num,desn from shops where id>?");

$stmt->bind_param("i", $id);

$stmt->bind_result($id, $name, $price, $num, $desn);

$id=2;

// 执行
$stmt->execute();

$stmt->store_result(); // 一次性将所有的结果取出来 

// 字段信息
$result = $stmt->result_metadata();

while($res = $result->fetch_field()) {
    echo $res->name."--";
}
echo "<br>";
// 取数据
while($stmt->fetch()) {
    echo "{$id}--{$name}--{$price}--{$desn} <br>";
}

echo "总数:".$stmt->num_rows;

// 释放资源
$stmt->free_result();
$stmt->close();

// $db = new DB(array('db'=> DB,...));














