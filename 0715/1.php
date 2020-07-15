<?php

$str = 'this is a good boy this is a man';
// 定义正则表达式 
$patt = '/this/';

//返回值
// 返回 pattern 的匹配次数。 它的值将是 0 次（不匹配）或 1 次，因为 preg_match() 在第一次匹配后 将会停止搜索。preg_match_all() 不同于此，它会一直搜索subject 直到到达结尾。 如果发生错误preg_match()返回 FALSE。
preg_match($patt, $str, $res);
preg_match_all($patt, $str, $res2);

echo "<pre>";
print_r($res);
print_r($res2);



