<?php

function static_func()
{
    $n1 = 1;
    static $n2 = 1; // 静态变量修饰符
    $n1++;
    $n2++;

    echo '$n1='.$n1.',$n2='.$n2.'<br>';
}
static_func();
static_func();
static_func();
static_func();
static_func();
