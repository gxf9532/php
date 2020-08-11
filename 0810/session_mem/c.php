<?php
header('Content-Type:text/html;Charset=UTF-8');
// include "session.php";
include "./MemSession.class.php";
// session_start();

// 判断用户是否登陆
if (!$_SESSION['isLogin']) {
    header('Location:index.html');
    exit;
}

echo session_id();

echo "<br />";
echo "尊敬的会员:<font color='#F00'><b>{$_SESSION['username']}</b>,您好</font><br>";

echo "<a href=\"./logout.php\">点击退出登陆</a>";
