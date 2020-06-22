<?php

// php 基础 

// 写一个函数  能够计算3个数的最大值  
//   3 4 5 =5  334 = 4  

function getMaxValue($n1, $n2, $n3) 
{
    // 两两比较  
    if ($n1 >= $n2 && $n1 >= $n3) {
        return $n1;
    } 
    elseif ($n2 >= $n1 && $n2 >= $n3) {
        return $n2;
    } else {
        return $n3;
    }
}

echo getMaxValue(100,100,200);