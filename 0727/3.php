<?php

//  mysqli中的事务处理

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

// 修改自动提交的方式 
$mysqli->autocommit(0);
$error = true;
$price = 500;

$sql = "update zh set ye=ye-{$price} where name='zhangsan'";

// 执行sql语句
$result = $mysqli->query($sql);

if (!$result) {
    $error = false;
    echo "从张三转出失败!";
} else {
    if ($mysqli->affected_rows == 0) {
        $error = false;
        echo "张三的钱没有发生变化";
    } else {
        echo "从张三转出{$price}成功!";
    }
}

$sql = "update zh set ye=ye+{$price} where name='lisi'";

$result = $mysqli->query($sql);

if (!$result) {
    $error = false;
    echo "李四转入失败";
} else {
    if ($mysqli->affected_rows == 0) {
        $error = false;
        echo "李四的钱没有发生变化";
    } else {
        echo "李四转入{$price}成功!";
    }
}

if ($error) {
    echo "交易完成!";
    $mysqli->commit();
} else {
    echo "转账失败!";
    $mysqli->rollback();
}
// 务必将autocommit再次开启 不然后面所有的数据库操作都不是真正执行!
$mysqli->autocommit(1);
$mysqli->close();
