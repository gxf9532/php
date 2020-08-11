<?php
header('Content-Type:text/html;Charset=UTF-8');
include "session.php";
include "./MemSession.class.php";

// session_start();

// unset($_SESSION['username']);

$username = $_SESSION['username'];
$_SESSION = array();

// 删除对应的cookie值 
if (isset($_COOKIE[session_name()])) {
    setCookie(session_name(), '', time()-100, '/');
}

session_destroy();

// 提示用户
echo "欢迎大爷{$username}下次再来!";

echo '<a href="index.html">点击跳转回登陆界面</a>';
