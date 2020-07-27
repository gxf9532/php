<?php

require_once('config.php');

$mysqli = @new mysqli(HOST, USER, PASS, DB);

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

$sqls = "desc shops;";
$sqls .= "select * from shops";

if ($mysqli->multi_query($sqls)) {
    echo "<success!>";
    do {

        $result = $mysqli->store_result();
  
        echo "<table align='center' border='1' width='500'>";

        // echo "<tr>";
        // while($field = $result->fetch_field()) {
        //     echo "<th>".$filed->name."</th>";
        // }
        // echo "</tr>";

        while($row = $result->fetch_assoc()) {

            echo "<tr>";
            foreach($row as $col) {
                echo "<td>{$col}</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        if ($mysqli->more_results()) {
            echo "-----------";
        }

    } while(@$mysqli->next_result());  
}
