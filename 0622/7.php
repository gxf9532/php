<?php

// $num = 100;

// function foo()
// {
//     global $num;// 使用global关键字将num变量声明为全局变量 
//     $num++;
// }

// foo(); 
// echo $num;

$num = 10;

function demo() 
{
    // 使用超全局数组来获取全局变量
    echo $GLOBALS['num'];
}

demo();






