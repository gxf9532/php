<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

try {
    $sql = "delete from shops where id=11";
    $pdo->exec($sql);
} catch (PDOException $e) {
    exit("数据库操作失败: 原因:" . $e->getMessage());
}

echo "OK!";
