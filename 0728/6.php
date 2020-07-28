<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

$sql = "insert into shops values(null,:n,:p,:nu,:d)";

$stmt = $pdo->prepare($sql);

// 绑定?变量
$stmt->bindParam("n", $name, PDO::PARAM_STR);
$stmt->bindParam("p", $price);
$stmt->bindParam("nu", $num);
$stmt->bindParam("d", $desn);

$name = "肥仔水";
$price = 25.5;
$num = 10;
$desn = "好喝的饮料";

// 执行
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "添加成功!";
}
