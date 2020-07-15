<?php

// 字母 数字 下划线
$str = 'abc123DEF_';
// $patt = '/[a-z0-9A-Z]+/';
// $patt = '/[A-z]+/'; // [a-zA-Z]+
$patt = '/[a-zA-Z0-9_]+/';
preg_match_all($patt, $str, $res);
print_r($res);


