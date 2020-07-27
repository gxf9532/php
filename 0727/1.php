<?php

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

// 没有结果集 insert update delete  
$sqls = "insert into shops(name,price,num,desn) values('abc','80','10000','This is very good');";
$sqls .= "update shops set name='NBA' where id=2;";
$sqls .= "delete from shops where id=1";

// echo $sqls;

// 同时执行多条语句
if ($mysqli->multi_query($sqls)) {
    echo "多条语句执行成功!<br/>";
    echo "最后插入的id:" . $mysqli->insert_id . "<br>";
} else {
    echo "ERROR:" . $mysqli->errno . ':' . $mysqli->error;
}

$mysqli->close();
