<?php

// $str = 'hello,goods,H2O';

// $patt = '/h2o/i'; // 在正则规则的后面添加一个小i 叫做模式修正符  i的功能是让匹配的字符串不区分大小写
// preg_match($patt, $str, $res);
// print_r($res);


$str = 'hello,h2o,95a27,world';

// $patt = '/[0123456789]/'; // [0-9]

// $patt = '/[13579]/';

// $patt = '/[0-9]+/'; // 最少匹配一次 
// $patt = '/[0-9]{1,}/'; // 最少匹配一次 
$patt = '/[0-9]{1,2}/';// [0-9]之间范围的数出现1-2次

preg_match_all($patt, $str, $res); 

print_r($res);


