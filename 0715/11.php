<?php

$str = 'http://www.baidu.com';

$patt = '/\./';  // 注意 有特殊语法含义的字符需要先转义再匹配 

preg_match_all($patt, $str, $res);
print_r($res);

    





