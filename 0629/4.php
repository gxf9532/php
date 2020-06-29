<?php

/*
    三种错误级别
    1. notice  可以忽略 
    2. warning 警告级别  下面代码还可以正常运行 
    3. Fatal Error 致命错误 代码立即停止执行  
*/
error_reporting(E_ALL);


// 回调函数 
function callback($errno, $errstr, $errfile, $errline) {
    echo "错误级别:{$errno},错误信息:{$errstr},错误所在文件:${errfile},错误行号:{$errline}";
}

// 自定义错误回调
set_error_handler('callback');

echo $num;