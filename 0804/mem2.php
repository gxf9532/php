<?php

$mem = new Memcache();

$mem->connect('127.0.0.1', 11211);

$mem->add('array', ['name' => 'lisi', 'age' => 20, 'sex' => '男'], 0, 1200);

$res = $mem->get('array');

var_dump($res);