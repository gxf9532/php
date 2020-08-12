<?php

// echo md5('admin').'<br>';
// echo hash('sha256','admin');

// echo substr(hash('sha256','admin'), 0, 32);

$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->select(5); //选择数据库
$redis -> flushdb();//清空当前数据库
// 添加  
// $redis->hset('hash3', 'uname', 'admin');
// $redis->hset('hash2','pass', substr(hash('sha256','admin'), 0, 32));

// echo $redis->hget('hash2', 'uname');

// $res = $redis->hmget('hash2', ['uname','pass']);
// var_dump($res);

