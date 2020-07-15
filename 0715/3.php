<?php

$str = 'hello';

// $patt = '/[a-z]/'; // 范围是从a到z 
// $patt = '/[a-z][a-z]/'; // 匹配两个a-z
// $patt = '/[a-z][a-z][a-z]/';

// $patt = '/[a-z]{3}/'; // 只有三次
// $patt = '/[a-z]{3,}/'; //出现三次以上
// $patt = '/[a-z]{1,3}/'; //出现1次到3次之间

$patt = '/[a-z]+/'; // +号代表出现一次以上(最少匹配一次)


preg_match($patt, $str, $res);
print_r($res);// 