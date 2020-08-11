<?php

// phpinfo();

$redis = new Redis();

$redis->connect('localhost', 6379);
// var_dump($redis);
$redis->set('name', '王五');

