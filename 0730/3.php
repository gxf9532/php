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

// 3.开始绘制 
imagefill($im, 0, 0, $bg);

imageline($im, 50, 50, 50, 400, $red);
imageline($im, 50, 400, 400, 400, $red);

imageline($im, 50, 50, 40, 60, $red);
imageline($im, 50, 50, 60, 60, $red);

imageline($im, 400, 400, 390, 410, $red);
imageline($im, 400, 400, 390, 390, $red);

for ($i = 100; $i < 400; $i += 50) {
    imageline($im, $i, 390, $i, 400, $red);
}

for ($i = 100; $i < 400; $i += 50) {
    imageline($im, 50, $i, 60, $i, $red);
}

// imagerectangle($im, 50, 350, 100, 400, $green); // 非填充矩形
imagefilledrectangle($im, 50, 350, 100, 400, $blue);
// imagefilledrectangle($im, 100, 300, 150, 400, $blue);
imagefilledrectangle($im, 150, 250, 200, 400, $blue);
imagefilledrectangle($im, 250, 150, 300, 400, $blue);






// 4.输出图像
header("Content-Type:image/png");
imagepng($im);

// 5.释放资源
imagedestroy($im);
