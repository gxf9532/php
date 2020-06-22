<?php

// 计算5的阶乘  

/**
 * 阶乘: 一个数n的阶乘= n-1的阶乘 * n  
 * 
 */

// 自定义函数实现计算任意正整数的阶乘 

function foo($num)
{
    if ($num && is_numeric($num)) {
        $num = (int)$num;
        if ($num == 1) {
            return 1;
        }
        return $num * foo($num - 1);
    } else {
        return false;
    }
 
}

echo foo(10);

