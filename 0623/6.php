<?php

// 取出文件后缀名的几种方法
// $url = 'www.sina.com.cn';
// $fileName  = 'abc.jpg';
include_once('./func.php');

$fileName = 'abc.jpg';

//第一种方法
// $fileArr = explode('.', $fileName);

// $ext = $fileArr[1];
// echo $ext;

// 第二种方法 将数组的最后一个单元弹出
// $ext = array_pop($fileArr);
// echo $ext;

// 第三种方法
// echo strpos($fileName, '.');
// echo substr($fileName, strpos($fileName, '.') + 1);

// 第四种方法
// $ext = pathinfo($fileName);
// my_print($ext);
// echo $ext['extension'];

$ext = pathinfo($fileName, PATHINFO_EXTENSION);
echo $ext;





