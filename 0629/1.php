<?php

// 错误处理  时间模块  

// echo 123;

// 软模式设定错误级别 
error_reporting(E_ALL); // 开启所有的错误报告  
// error_reporting(E_ALL &~ E_NOTICE); // 除了注意级别错误

// php配置文件设定
// ini_set('display_errors', 'off');// 屏蔽所有错误

// 为声明就直接使用php变量   注意级别错误 注意级别的错误一般选择忽略
// php是一种弱类型语言 变量可以不声明就使用 而且在php中推荐这么做

// Notice: Undefined variable: num in C:\phpstudy_pro\WWW\php\0629\1.php on line 10
// $num = null;

echo $num;

echo 123;
