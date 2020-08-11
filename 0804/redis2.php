<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$redis->hmset('hash1', ['uname' => 'zhangsan', 'age' => 20]);

$data = $redis->hget('hash1', 'uname');

var_dump($data);

