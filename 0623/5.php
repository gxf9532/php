<?php

include_once('./func.php');
include_once('./fileUpload.php');
// //接受表单的数据信息
// $data = $_POST;
// my_print($_POST);


// // 接收表单的上传文件信息 
// my_print($_FILES);

$keysArr = array_keys($_FILES);
$name = $keysArr[0];

$extArr = array('jpg', 'jpeg', 'png');
$res = fileUplad($name, './upload', 1024 * 1024 * 1024, $extArr, true);

my_print($res);

//  作业：自己完成多文件上传 并进行封装





