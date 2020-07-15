<?php

/*
    * 匹配前面的表达式0次或者多次
*/
// $str = 'zoo';

// $patt = '/zo*/';


// preg_match($patt, $str, $res);

// print_r($res);

$str = 'hello';

// $patt = '/he?llo/'; // 匹配0次或1次 相当于{0,1}
// $patt = '/(he)?llo/'; 

$patt = '/./'; // . 匹配除 “\n” 之外的任何单个字符
$patt = '/.*/'; // 匹配除 “\n” 之外的任何多个字符
preg_match($patt, $str, $res);
print_r($res);
