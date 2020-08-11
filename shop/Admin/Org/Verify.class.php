<?php

class Verify
{


    public function showVerify($m = 1, $n = 4)
    {
        header('Content-Type:image/png');

        // 创建画布 
        $im = imagecreatetruecolor(160, 40);

        // 生成颜色
        $bgcolor = imagecolorallocate($im, rand(200, 255), rand(200, 255), rand(200, 255));

        // 填充画布 
        imagefill($im, 0, 0, $bgcolor);

        // 产生随机字符 
        $x = 20;
        $string = '';

        for ($i = 1; $i <= $n; $i++) {
            // 产生随机颜色 
            $textcolor = imagecolorallocate($im, rand(0, 100), rand(0, 100), rand(0, 100));

            // 生成随机字符
            if ($m == 1) {
                // 012....9asdfghjk..ANDMDM...
                $str = join("", array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
                $one_font = substr(str_shuffle($str), 0, 1);
                $string .= $one_font;
            } else if ($m == 2) {
                // 0-9
                $str = join('', array_merge(range(0, 9)));
                $one_font = substr(str_shuffle($str), 0, 1);
                $string .= $one_font;
            } else if ($m == 3) {
                $arr = array("你", "大", "爷", "的");
                $one_font = $arr[rand(0, count($arr) - 1)];
                $string .= $one_font;
            }


            // 将随机字符写入图片
            $font = realpath('./') . "/Org/fdbsjw.ttf";
         
            imagettftext($im, 20, mt_rand(-30, 30), $x, 30, $textcolor, $font, $one_font);
            $x = $x + 20;
        }


        // 设定干扰项
        for ($i = 0; $i < 120; $i++) {
            $randColor = imagecolorallocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
            imagesetpixel($im, rand(0, 300), rand(0, 80), $randColor);
        }

        for ($i=0; $i < 5; $i++) {
            $randColor = imagecolorallocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
            imageline($im, 0, rand(0,80), 300, rand(0,80), $randColor);
        }
        // 开启session 
        session_start();
        // 将生成的验证码存入session 
        $_SESSION['code'] = $string;
        // 输出
        imagepng($im);
        imagedestroy($im);
    }
}
// $arr = array("a","b","c",1,2,3);
// echo join("", $arr);
// echo "<pre>";
// print_r(range(0,9));


