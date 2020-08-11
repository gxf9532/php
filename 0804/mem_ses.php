<?php
// 指定存储方式
ini_set('session.save_handler', 'file');

// 指定存储位置
ini_set('session.save_path','127.0.0.1:11211');


session_start();

$_SESSION['name'] = '李四';

echo session_id();
// var_dump($_SESSION);


