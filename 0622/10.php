<?php

// 计算斐波那契数列第n项的值  

/** 
    自然中的斐波那契数列
    这个数列从第3项开始，每一项都等于前两项之和。
*/

function foo( $num ) {
    if ($num > 2) 
    {
        $res = foo($num - 1) + foo($num - 2);
        return $res;
    }
    return 1;
}
echo foo(1);
echo foo(2);
echo foo(3);
echo foo(4);











