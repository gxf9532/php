<?php

/**
 * PHP扩展GD库
 */

// 1.创建画布 
$im = imagecreatetruecolor(500, 500);
// var_dump($im); // resource(2) of type (gd)
// 2.创建颜色 
$bg = imagecolorallocate($im, 220, 220, 220); // 灰色 
$red = imagecolorallocate($im, 255, 0, 0); // 红色
$green = imagecolorallocate($im, 0, 255, 0); // 绿色

// 3.开始绘制 
imagefill($im, 0, 0, $bg);

// 绘制直线
imageline($im, 20,20,20,300, $red);
imageline($im, 300,300,300,20, $red);
imageline($im, 300,20,20,20, $red);
imageline($im, 20,300,300,300, $red);
imageline($im, 20,20,300,300, $red);
imageline($im, 300,20,20,300, $red);

// 4.输出图像
header("Content-Type:image/png");
imagepng($im);

 // 5.释放资源
 imagedestroy($im);
 

