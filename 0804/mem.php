<?php

$mem = new Memcache();

// var_dump($mem);

$mem->connect('127.0.0.1', 11211);

// // var_dump($res);
// $res = $mem->add('uname', 'lisi', 2, 120);

// // var_dump($res);

// $r = $mem->get('uname');

// var_dump($r);

$res = $mem->getStats();

var_dump($res);

