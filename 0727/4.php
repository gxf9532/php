<?php

// sql注入 黑客攻击 delete from user where id=105 or 1=1
require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}
// 修改数据库连接字符集为 utf8
// mysqli_set_charset($con,"utf8");
// $stmt = $mysqli->stmt_init();

// 准备一条sql语句
$sql = "insert into shops(name,price,num,desn) values(?,?,?,?)";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sdis", $name, $price,$num,$desn);

// $name = "zhangsan";
// $price = 23.56;
// $num = 100;
// $desn = "good good";
// // 执行
// $stmt->execute();

$name = "zhangsan222";
$price = 20;
$num = 50;
$desn = "good";
// 执行
$stmt->execute();

echo "last_id:".$stmt->insert_id;
echo "影响了:".$stmt->affected_rows."行";

$stmt->close();








