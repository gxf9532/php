<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

// echo $pdo->getAttribute(PDO::ATTR_AUTOCOMMIT); // 1 -> true  
// echo $pdo->getAttribute(PDO::ATTR_ERRMODE); //
// echo $pdo->getAttribute(PDO::ATTR_SERVER_VERSION); //


