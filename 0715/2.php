<?php

// $str = 'hi,this is a good idea 1';

// // \b \b会匹配出纯单词
// // $patt = '/\bis\b/';
// $patt = '/\Bhi\B/';

// preg_match_all($patt, $str, $res);
// var_dump($res);

$str = 'what is the fuck tlp';

$patt = '/\bfuck\b/';

preg_match_all($patt, $str, $res);

print_r($res);



