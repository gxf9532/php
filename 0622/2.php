<?php

/*
    自定义函数  实现功能: 判断一个数字是否是一个素数(质数)
    return true / false 
    2. 输出2-200之间的所有素数  
    什么是素数: 能被1和他本身整除的数 (只有两个可以整除的数)
    
*/

function getleap($n)
{
    $count = 0; // 定义一个计数器 

    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            $count++;
        }
    }
    if ($count == 2) // 证明只有两个可以整除的数 
    {
        return true;
    }
    return false;
}
// 100以内的质数有：2、3、5、7、11、13、17、19、23、29、31、37、41、43、47、53、59、61、67、71、73、79、83、89、97共25个
echo getleap(6) ? '是素数' : '不是素数';
