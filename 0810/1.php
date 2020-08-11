<?php


// php操作memcache 
$mem = new Memcache();
// var_dump($mem);

// 链接
$mem->connect('localhost', 11211);

// echo MEMCACHE_COMPRESSED; // 2 是否压缩
// 添加数据
// $res = $mem->add('username', 'lisi', MEMCACHE_COMPRESSED, 1200);

// var_dump($res); // (bool) true 

// 获取值
// $res = $mem->get('username');
// echo $res;

// 删除
$mem->delete('username');

// 删除所有
$mem->flush(); // 你最好不要这么干 




