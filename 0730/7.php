<?php

/**
 * PHP扩展GD库
 */

// 1.创建画布 
$im = imagecreatetruecolor(500, 500);
// 2.创建颜色 
$bg = imagecolorallocate($im, 220, 220, 220); // 灰色 
$red = imagecolorallocate($im, 255, 0, 0); // 红色
$green = imagecolorallocate($im, 0, 255, 0); // 绿色
$blue = imagecolorallocate($im, 0, 0, 255); // 蓝色
$ran = imagecolorallocate($im, 200, 100, 150);
$black = imagecolorallocate($im, 0, 0, 0);

// $str = mb_convert_encoding("世界", "html-entities", "utf-8");

// 3.开始绘制 
imagefill($im, 0, 0, $bg);
// imagettftext($im, 30, 30, 230, 270, $red, realpath('./') . "/fdbsjw.ttf", "中国智造");
$ranArr = array("你","大","爷","还","是");
for ($i = 0; $i < 200; $i+=50) {
    imagettftext($im, 30, mt_rand(-30,30), 230+$i, 230, $red, realpath('./') . "/fdbsjw.ttf", $ranArr[mt_rand(0, count($ranArr)-1)]);
}
// imagettftext($im, 30, 30, 230, 270, $red, realpath('./') . "/fdbsjw.ttf", "中国智造");
// 4.输出图像
header("Content-Type:image/png");
imagepng($im);

// 5.释放资源
imagedestroy($im);
