<?php

// 递归函数
function fun( $num ) 
{       
    $num++;
    echo "$num ";
    if ($num < 10)
    {
        fun($num);
    } 
    echo "$num ";
}
// fun(10);// 11 11
fun(0);//  



