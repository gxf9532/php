<?php

// 时区  中国在东八区 
// date_default_timezone_set('PRC');

// 时间模块 
// echo time(); // 时间戳 单位秒  从1970年1月1日0时0秒0分到现在的秒数

// date()  格式化时间(戳)

// echo date("Y-m-d H:i:s", time());

// echo date("Y-m-d H:i:s");// 不传第二个参数默认使用当前时间戳

// echo date("Y年m月d日H时i分s秒");

// echo date("Y/m/d H:i:s");

$dirname = date('Y-m-d');

// 生成一个随机文件名
$readStr = 'ABCDEGHIJKLMNabcdefghijklmn123456789';
$filename = substr(str_shuffle($readStr),0, 15);
$filename = date("Ymd").$filename;
$filename.= mt_rand(1000,9999);

$extArr = ['txt', 'jpeg', 'png', 'gif'];

$filename.= '.'.$extArr[0];
echo $filename;
if (!file_exists($dirname)) {
    @mkdir($dirname, 0777);
    
}

file_put_contents($dirname. '/' . $filename, "1111", FILE_APPEND);


