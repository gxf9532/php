<?php
// phpinfo();

$redis = new Redis();

//链接redis
$redis->connect('localhost', 6379);

// 字符串类型
// $redis->set('uname', 'lisi');
// $res = $redis->get('uname');
// var_dump($res);

// $redis->setex('age', 10, '20');

// $redis->mset(['age1'=>'20', 'age2'=>'21','age3'=>'22']);

// $redis->setnx('age4','23');

// 修改 
// $redis->set('age4', '28');
// 自增
// $redis->incr('total1');

// 指定步进递增
// $redis->incrBy('total1', 3);

// 递减 
// $redis->decr('total1');

// 指定步进递减
// $redis->decrBy('total1', 3);

// 删除
$redis->delete('total1');
// 多个删除
$redis->delete(['age1', 'age2', 'age3', 'age4']);

echo mt_rand(1000, 9999) . time();
