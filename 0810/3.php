<?php

header('Content-Type:text/html;Charset=UTF-8');

include './Memcache.php';

$mem = new Memcached();

// $mem->mflush();exit;

$sql = "SELECT * FROM `shops`";
// $key = 'data';
$key = md5($sql);
$data = $mem->mget($key);


if (empty($data)) {

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=yuesheng", 'root', 'root');
    } catch (PDOException $e) {
        echo "数据库链接失败" . $e->getMessage();
    }

    //操作数据库
    $stmt = $pdo->prepare($sql); // 预处理  
    $stmt->execute();

    // 获取数据
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 向memcache中再写入一份数据
    $mem->mset($key, $data, 0, time() + 60 * 60 * 24 * 31);

    echo "从数据库中取出的数据";
    echo '<pre>';
    print_r($data);
    $mem->close();
} else {
    echo "从memcache中取出的数据";
    echo '<pre>';
    print_r($data);
    
}
