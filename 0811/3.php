<?php

$redis = new Redis();

//链接redis
$redis->connect('localhost', 6379);

// 添加
// $redis->sadd('s1', '1', '2', '3', '4');
// $redis->sadd('s2', '5');

// 修改
// $redis->smove('s1', 's2', '4');

// 获取
// 获取集合中所有的值
// $res = $redis->smembers('s1');
// var_dump($res);

// 获取集合中元素的个数 
// echo $redis->ssize('s1')."<br/>";

// 随机获取集合中的某一个元素 
// echo $redis->srandmember('s1');

// 获取交集
// $res = $redis->sinter('s1', 's2');
// var_dump($res);

// 获取并集
// $res = $redis->sunion('s1', 's2');
// var_dump($res);

// 获取差集
// $res = $redis->sdiff('s1', 's2');

// $res = $redis->sismember('s1', '5');

// echo !$res ? '他/她已经不是您的好友' : ''; 

// 删除 
// $res = $redis->srem('s2', 5); // 移除指定的值 

// $arr = ['征途', '大话西游','霸王别姬'];

// $redis->sadd('set3', $arr[0]);
// $redis->sadd('set3', $arr[1]);
// $redis->sadd('set3', $arr[2]);

// $res = $redis->sinter('set-1','set-2');

$arr = ['电影1','电影2','电影3','电影4','电影5'];

// $redis->zAdd('zset1', 10, $arr[0]);
// $redis->zAdd('zset1', 6, $arr[1]);
// $redis->zAdd('zset1', 9, $arr[2]);
// $redis->zAdd('zset1', 8.5, $arr[3]);
// $redis->zAdd('zset1', 3, $arr[4]);
$res = $redis->zrank('zset1',$arr[3]);//获取某个值的排名

var_dump($res);
echo "<br/>".mt_rand(1000, 9999) . time();

