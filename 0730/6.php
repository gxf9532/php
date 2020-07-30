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
$blue = imagecolorallocate($im, 0, 0, 255); // 蓝色
$ran = imagecolorallocate($im, 200, 100, 150);
$black = imagecolorallocate($im, 0, 0, 0);

// 3.开始绘制 
imagefill($im, 0, 0, $bg);

// 绘制圆弧 
// imagearc($im, 100,100,150,120,0,270,$blue);
// imagearc($im, 100,100,150,120,0,-90,$blue);

// 绘制填充圆弧 
// imagefilledarc($im, 100, 100, 150, 120, 0, -90, $blue, IMG_ARC_PIE);
// imagefilledarc($im, 100, 100, 150, 120, 0, 40, $blue, IMG_ARC_PIE);
// imagefilledarc($im, 100, 100, 150, 120, 40, 90, $red, IMG_ARC_PIE);
// imagefilledarc($im, 100, 100, 150, 120, 90, 240, $green, IMG_ARC_PIE);
// imagefilledarc($im, 100, 100, 150, 120, 240, 360, $ran, IMG_ARC_PIE);

for ($i = 0; $i < 13; $i++) {
    imagefilledarc($im, 100, 100 - $i, 150, 120, 0, 40, $blue, IMG_ARC_PIE);
    imagefilledarc($im, 100, 100 - $i, 150, 120, 40, 90, $red, IMG_ARC_PIE);
    imagefilledarc($im, 100, 100 - $i, 150, 120, 90, 240, $green, IMG_ARC_PIE);
    imagefilledarc($im, 100, 100 - $i, 150, 120, 240, 360, $ran, IMG_ARC_PIE);
}

// 绘制字符串
imagestring($im, 5, 200, 50, "hello", $blue);

imagettftext($im,30,0,230,270,$red,"char.ttf","哈哈哈哈哈哈哈");
// 4.输出图像
header("Content-Type:image/png");
imagepng($im);

// 5.释放资源
imagedestroy($im);
