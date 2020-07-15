<?php

$str = 'hello123_-';

// $patt = '/\w/'; // \w 等同于 [a-zA-Z0-9_] 
// $patt = '/\w+/'; // \w 等同于 [a-zA-Z0-9_]+ 

$patt = '/\W{1,}/'; // 是\w的补集

preg_match_all($patt, $str, $res);

print_r($res);