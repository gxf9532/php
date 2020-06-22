<?php

include_once('./func.php');

// 定义一个函数可以求出指定的若干个数据中奇数的和  

// 1~100 奇数 ++  
function demo() 
{
    // 将所有传入的实参一次性拿出 
    $allArgs = func_get_args();
    // my_print($allArgs);
    $sum = 0;
    // 遍历 
    for($i = 0; $i < count($allArgs); $i++) 
    {
         if ($allArgs[$i] % 2 == 1) 
         {
            $sum += $allArgs[$i];
         }
    }
    return $sum;

}

$res1 = demo(1,3,5,6,8,10,11,20);
echo $res1;// 20 

