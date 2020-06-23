<?php

/**
 *  文件上传函数 
 * @param string $name     
 * @param string $dir      上传文件的路径
 * @param number $maxSize  上传文件的最大值 
 * @param array  $ext      上传文件的扩展名
 * @param boolean $isSource  是否使用源文件名(默认值为false不使用)
 * @return mixed $filename 成功返回文件名 失败返回提示错误提示信息
 * 
 */
//  错误信息数组
$errResArr = array(
    1 => '上传的文件超过了 php.ini 中 upload_max_filesize选项限制的值',
    2 => '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
    3 => '文件只有部分被上传',
    4 => '没有文件被上传',
    6 => '找不到临时文件夹',
    7 => '文件写入失败'
);
// 1kb = 1024字节 1MB = 1024kb 1GB = 1024MB 
function fileUplad($name, $dir = './upload', $maxSize = 1024 * 1024 * 1024, $ext = array('jpg', 'jpeg', 'png', 'gif'), $isSource = false)
{
    global $errResArr;
    $error = $_FILES[$name]['error'];
    $size = $_FILES[$name]['size']; //上传文件的大小 

    // 制作一个返回值数组
    $res = array();
    $errMes = ''; // 错误信息字符串

    // 1.判断上传文件的错误号
    if ($error > 0) {
        // 这里进行上传文件错误的判断

        switch ($error) {
            case 1:
                $errMes = $errResArr[1];
                break;
            case 2:
                $errMes = $errResArr[2];
                break;
            case 3:
                $errMes = $errResArr[3];
                break;
            case 4:
                $errMes = $errResArr[6];
                break;
            case 6:
                $errMes = $errResArr[6];
                break;
            case 7:
                $errMes = $errResArr[7];
                break;
        }
        $res = array('status' => 1, 'mes' => $errMes);
        return  $res;
    }



    // 3. 上传文件的大小限定
    if ($size > $maxSize) {
        echo $size . '<br>';
        echo $maxSize;
        $errMes = '上传图片不能超过' . round($maxSize / 1024, 0) . 'kb';
        $res = array('status' => 3, 'mes' => $errMes);
        return $res;
    }

    //4. 判断上传的文件类型是否符合要求
    $fileName = $_FILES[$name]['name'];

    // 获取上传文件后缀 
    // $upext = substr($fileName, strpos($fileName, '.') + 1);  
    $upext = pathinfo($fileName, PATHINFO_EXTENSION);

    // 判断上传文件的后缀是否合法 
    if (!in_array($upext, $ext)) {
        $errMes = '上传文件的类型不符合要求!';
        $res = array(
            'status' => 4,
            'mes' => $errMes
        );
        return $res;
    }

    // 2. 判断指定的上传文件夹是否存在
    // is_file()  is_dir() file_exists() 
    // if (!file_exists($dir)) {
    //     if (@mkdir($dir, 0755)) {
    //         $errMes = '创建上传文件夹失败!';
    //         $res = array('status' => 2, 'mes' => $errMes);
    //         return $res;
    //     }
    // }

    // 给上传文件重新命名
    if (!$isSource) {
        // 不使用上传文件原名
        // 起一个随机文件名
        $filename = date('ymd') . uniqid() . mt_rand(0, 9999) . '.' . $upext;
    } else {
        // 使用上传文件原名
        $filename = $_FILES[$name]['name'];
    }

    // 判断文件上传的路径是否存在
    $save_path = rtrim($dir, '/') . '/' . date('Y-m-d'). '/';

    if (!file_exists($save_path)) {
        mkdir($save_path, 0755, true);
    }

    // 拼接文件上传的路径和文件上传名称
    $path = $save_path . $filename;

    // 判断是否是http post上传
    if (!is_uploaded_file($_FILES[$name]['tmp_name'])) {
        $errMes = '非法文件上传!';
        $res = array(
            'status' => 8,
            'mes' => $errMes
        );
        return $res;
    }
    // 从临时文件目录移动到指定文件目录
    if (!move_uploaded_file($_FILES[$name]['tmp_name'], $path)) {
        $errMes = '移动上传文件失败!';
        $res = array(
            'status' => 9,
            'mes' => $errMes
        );
        return $res;
    } else {
        // 文件上传成功
        $res = array(
            'status' => 0,
            'mes' => $path // 文件上传成功 则返回成功上传为文件路径信息
        );
        return $res;
    }
}
