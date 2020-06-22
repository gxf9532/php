<?php

// 函数返回指定的任意两个数字之间的随机整数  

function getRandomNum($n1, $n2)
{   
    if ($n1 > $n2) 
    {
        $max = $n1;
        $min = $n2;    
    } else
    {
        $max = $n2;
        $min = $n1;
    }
    return mt_rand($min, $max);
}

echo getRandomNum(10,20);