<?php
// 清除session 

session_start();

$_SESSION = array();

// 删除局部信息
// unset($_SESSION['username']);

// 将cookie存放的session信息也删除 
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-100, '/');
}

// 销毁session  
session_destroy();





