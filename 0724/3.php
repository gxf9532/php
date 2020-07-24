<?php
include "Page.class.php";
include "config.php";
$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

$result = $mysqli->query("select * from shops");
$page = new Page($result->num_rows,2);
$sql = "select id,name,price,num,desn from shops {$page->limit}";
$result = $mysqli->query($sql);

// 返回结果集对象

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

echo "<tr><td colspan='5' align='center'>{$page->fPage()}</td></tr>";

echo "</table>";

