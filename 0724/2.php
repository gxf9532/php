<?php

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

// select 语句(结果集) 
$sql = "select * from shops";
$result = $mysqli->query($sql);

// $rows = $result->num_rows;
// $count = $result->field_count;

// echo "表中{$rows}行,{$count}列";



if (!$result) {
    echo "sql语句出错!";
    echo "ERROR:" . $msyqli->errno . ':' . $msyqli->error;
    exit;
}

// $res = $result->fetch_row(); // 以索引数组的形式返回数据
// $res = $result->fetch_row(); // 以索引数组的形式返回数据
// $res = $result->fetch_row(); // 以索引数组的形式返回数据

// $res = $result->fetch_assoc(); // 以关联数组的形式返回数据 

// $res = $result->fetch_array(); // 两种数组都返回 

// $res = $result->fetch_object();// 以对象的形式返回


// echo "<pre>";
// print_r($res);

// 获取所有数据 
// while ($row = $result->fetch_row()) {
//     echo "<pre>";
//     print_r($row);
// }

// while ($row = $result->fetch_assoc()) {
//     echo "<pre>";
//     print_r($row);
// }

// while($field = $result->fetch_field()) {
//     echo $result->current_field . '_['.$field->orgname.']'.$field->name."<br/>";
// }

echo "<table border=1 align='center' width='800'>";

echo "<tr>";
while($field = $result->fetch_field()) {
    echo "<th>".$result->current_field.'_['.$field->orgname.']'.$field->name."</th>";

}
echo "</tr>";


while($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach($row as $col) {
        echo "<td>{$col}</td>";
    }
    echo "</tr>";
}

echo "</table>";






// 关闭资源
$result->free();
$mysqli->close();
