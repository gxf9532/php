<?php

require_once('config.php');

$mysqli = @new mysqli(HOST,USER,PASS,DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

// select 语句(结果集) 
$sql = "insert into shops(name,price,num,desn) values('hello2','25.82','23','肥皂真好用')";
$result = $mysqli->query($sql);
var_dump($result);

if (!$result) {
    echo "sql语句出错!";
    echo "ERROR:" . $msyqli->errno . ':' . $msyqli->error;
    exit;
}

// 成功则输出影响的行数 
// echo $mysqli->affected_rows;

if ($msyqli->affected_rows > 0) {

}

// 获取最后自动增长的id
echo $mysqli->insert_id;

// 关闭资源
$mysqli->close();
