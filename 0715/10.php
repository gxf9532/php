<?php

// $str = "hello world zoo beautiful";

// // $patt = "/\b[a-zA-Z]{5}\b/"; // 5个字母的单词
// // $patt = "/\b[a-zA-Z]{3,5}\b/"; // 3-5个 
// $patt = "/\b[a-zA-Z]{6,}\b/"; // 6个以上

// preg_match_all($patt, $str, $res);

// print_r($res);

$str = 'iPad iPhone iMac iWatch thinkPad mi';

$patt = '/\bi(pad|phone|mac|watch)\b/i';

preg_match_all($patt, $str, $res);

echo "<pre>";
print_r($res[0]);






