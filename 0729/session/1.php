<?php

// session会话控制 

// 1.开启session  
session_start();

// 向session中存储信息
// $_SESSION['username'] = 'admin';

$_SESSION['cart'] = array(
    array("id" => 1, "name" => '肥皂', "num" => 10),
    array("id" => 1, "name" => '肥皂', "num" => 10),
    array("id" => 1, "name" => '肥皂', "num" => 10),
);

echo session_name() . ":" . session_id();









