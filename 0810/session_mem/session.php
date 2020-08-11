<?php

// 自定义session 
$path = 'C:/ses/';

// 临时修改session的存储位置
ini_set('session.save_path', $path);
// ini_set('session.save_handler', )

session_set_save_handler('open', 'close', 'read', 'write', 'destroy', 'gc');

// session_set_save_handler(
//     array(__CLASS__, 'open'),
//     array(__CLASS__, 'open'),
//     array(__CLASS__, 'open'),
//     array(__CLASS__, 'open'),
//     array(__CLASS__, 'open')
// );
// 当session_start()
function open($path, $name)
{   
    echo $path.$name;
    return true;
}

// 关闭
function close()
{
    return true;
}

// 读取
function read($id)
{
    global $path;

    $filename = $path . "mysess_" . $id;

    return @file_get_contents($filename);
}

// 写入
function write($id, $data)
{
    global $path;

    // 自定义写入 
    // 拼接文件名
    $filename = $path . "mysess_" . $id;

    return @file_put_contents($filename, $data);
}

// session_destroy()  
function destroy($id)
{
    global $path;

    $filename = $path . "mysess_" . $id;
    return unlink($filename);
}

// 垃圾回收 
function gc($maxlifetime)
{
    
    global $path;
    foreach (glob($path . "mysess_*") as $file) {
        unlink($file);
    }
}
