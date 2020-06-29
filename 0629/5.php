<?php

/**
 *  生成随机字符串 
 * 
 */

function readStr($codeStr, $length=4) {
    $result = '';
    $result = str_shuffle($codeStr);
    $result = substr($result,0, $length);
    return $result;
}

$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijk';
echo readStr($str, 4);
