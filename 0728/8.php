<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

$data = array(
    array('name' => 'wangwu', 'ye' => 1000),
    array('name' => 'zhaoliu', 'ye' => 1000)
);
// PDO中的预处理 
try {
    // 开启事务
    $pdo->beginTransaction();
    $sql = "insert into zh values(null,:name,:ye)";
    $stmt = $pdo->prepare($sql);

    // 2.用数组进行绑定
    $m = 0;
    foreach ($data as $single) {
        $stmt->execute($single);
        $m += $stmt->rowCount();
    }
    // 提交事务
    $pdo->commit();
    echo "成功添加${m}条";
} catch (PDOException $e) {
    // 进行事务回滚
    $pdo->rollBack();
    echo $e->getMessage();
}
