<?php


// 分布式memcache 
$mem = new Memcache();

$mem->addServer('localhost', 11211);
$mem->addServer('localhost', 8888);

$mem->get('name');
    