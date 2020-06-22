<?php

date_default_timezone_set('PRC');

// echo date("Y-m-d H:i:s", time());

// echo "1970年1月1日到现在经历了多少秒：". time()."<br>";
// echo "1970年1月1日到现在经历了多少秒：". microtime(true)."<br>";

// 测试你的电脑性能 
// 1累加到10000000 

// 1.先获取没开始计数之前的系统时间 
$startTime = microtime(true);// 获取当前时间
$total = 0; 

for($i = 1; $i <= 10000000; $i++) 
{
    $total += $i;
}

// 再次获取当前时间 
$endTime = microtime(true);

//  获取时间差
$resTime = $endTime - $startTime;

echo "用时:".$resTime;
echo "累加结果:".$total;











