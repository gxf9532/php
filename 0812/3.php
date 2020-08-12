<?php
$redis = new Redis();
$redis->connect('localhost', 6379);

$redis->select(4); //选择数据库