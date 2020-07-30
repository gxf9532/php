<?php

/**
 * PHP扩展GD库
 */

// 1.创建画布 
$im = imagecreatetruecolor(240, 80);
// 2.创建颜色 
$bg = imagecolorallocate($im, 220, 220, 220); // 灰色 
$red = imagecolorallocate($im, 255, 0, 0); // 红色
$green = imagecolorallocate($im, 0, 255, 0); // 绿色
$blue = imagecolorallocate($im, 0, 0, 255); // 蓝色
$ran = imagecolorallocate($im, 200, 100, 150);
$black = imagecolorallocate($im, 0, 0, 0);



// 3.开始绘制 
imagefill($im, 0, 0, $bg);

// 绘制像素点 
// imagesetpixel($im,100,100,$red);

$colorArr = array($red,$green,$bule);
for ($i = 0; $i < 500; $i++) {
    imagesetpixel($im, mt_rand(0,500), mt_rand(0,500), $colorArr[mt_rand(0, count($colorArr)-1)]);
}
$ranArr = array("你","大","爷","还","是");
for ($i = 0; $i < 200; $i+=50) {
    imagettftext($im, 30, mt_rand(-30,30), 20+$i, 60, $red, realpath('./') . "/fdbsjw.ttf", $ranArr[mt_rand(0, count($ranArr)-1)]);
}
// 4.输出图像
header("Content-Type:image/png");
imagepng($im);

// 5.释放资源
imagedestroy($im);

// $eng = "023456789abcdefghjkmnopqrstuvwxyzABCDEFG";
// echo $eng[0];

