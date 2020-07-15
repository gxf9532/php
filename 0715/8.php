<?php

// $str = 'hello world';

// $patt = '/\s+/';  // \s标识匹配空白符号

// $str = 'helloA';
// $patt = '/A/';

// $str = 'I fuck tlp';
// $patt = '/\bfuck\b/';
// // 正则替换
// $res = preg_replace($patt, 'f**k', $str);

// echo $res;

// $str = '  admin    ';
// $patt = '/\s{1,}/';

// echo strlen($str); // 

// $res = preg_replace($patt, '', $str);

// echo strlen($res);

// echo $_POST['username'];

// 模拟用户注册
// $username = $_POST['username'];
// $patt = '/\s{1,}/';
// $username = preg_replace($patt, '', $username);
// // 插入数据库

// $data = array();

// array_push($data, $username);

// echo strlen($data[0]);


$username = $_POST['username'];

$username = trim($username);

// 插入数据库

$data = array();

array_push($data, $username);

echo strlen($data[0]);
