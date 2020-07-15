<?php

// $str = "txt hello,dom,bom,good";

// // $patt = '/\b([a-zA-Z])\w+\1\b/';

// preg_match_all($patt, $str, $res);

// echo "<pre>";
// print_r($res);

// $tel = "17728091969";  // 一个正确的手机号: 

// // $patt = '/\d{11}/';// 11位 

// // $patt = '/1\d{10}/'; // 10位

// // $patt = '/1(30|35|77)\d{8}/';
// $patt = '/1(30|35|77)\d{8}/';

// preg_match($patt, $tel, $res);

// echo "<pre>";
// print_r($res);

// 电视抽奖: 恭喜您手机号码是:177****2890  

$str = "17728701902,15928706983,13566798567";

$patt = "/(\d{3})\d{4}(\d{4})/";

// preg_match_all($patt, $str, $res);

$res = preg_replace($patt, '\1****\2', $str);


echo "恭喜以下中奖用户:".$res."<br/>";
echo "请以上中奖手机用户添加微信好友高老师并转账50元红包测试后领奖";



