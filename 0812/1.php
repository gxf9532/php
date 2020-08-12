<?php

// 列表类型 

$redis = new Redis();   
$redis->connect('localhost', 6379);

// $arr = ['1.txt','2.html','2.js','3.css','5.php'];

// for($i = 0; $i < 5; $i++) {
//     $redis->lpush('list-3', $arr[$i]);
// }


// $arr = ['1.txt','2.html','2.js','3.css','5.php'];

// for($i = 0; $i < 5; $i++) {
//     $redis->rpush('list-4', $arr[$i]);
// }

// $redis->lset('list-4', 3, 'aaa');
// https://www.jianshu.com/p/e55e8b2011a9
// $arr = [1,2,3];
// array_pop($arr);
// array_push($arr,4);
