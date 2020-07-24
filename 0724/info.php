<?php
// phpinfo();

$mysqli = new mysqli("127.0.0.1", "root", "root", "yuesheng");

if (mysqli_connect_errno()) {
    echo "数据库连接失败" . mysqli_connect_error();
    $mysqi = null;
    exit;
}

echo $mysqli->character_set_name();// utf8
echo $mysqli->get_client_info();
echo $mysqli->host_info;
echo $mysqli->server_info;
echo $mysqli->server_version;

