<?php


/** 
 *  php函数的三大要素  
 *  1.功能
 *  2.参数 
 *  3.返回值 
 * 
*/
function demo1() {
    return "demo1";
}

function demo2() {
    return "demo2";
}

function total($args) {
    return $args();
}

echo total('demo1');// demo1



