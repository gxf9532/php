<?php
/*
    mysql  纯粹的面向过程的数据库操作 
    mysqli  半面向对象半面向过程的数据库操作  
    PDO     纯粹的的面向对象   
    为什么用PDO  1.跨数据库 2.预处理(防止注入) 3.支持事务处理
*/
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=yuesheng", "root", "root");
    
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

$sql = "select * from shops";
$stmt = $pdo->query($sql); // 返回一个PDOStatement对象

$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($list);

