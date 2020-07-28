<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

// 预处理中的批量添加
$data = array(
    array('name' => 'ccc', 'price' => 25.5, 'num' => 10, 'desn' => '很好用111'),
    array('name' => 'eee', 'price' => 20.2, 'num' => 1, 'desn' => '很好用222'),
    array('name' => 'fff', 'price' => 23.1, 'num' => 3, 'desn' => '很好用333'),
);

$sql = "insert into shops values(null,:name,:price,:num,:desn)";
$stmt = $pdo->prepare($sql);

$m = 0;
foreach($data as $shop) {
    $stmt->execute($shop);
    $m += $stmt->rowCount();
}
echo "成功添加${m}条";