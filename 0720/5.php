<?php

class A
{
    public function __clone()
    {
        echo "执行了clone方法";
    }
}

$a = new A();
$b = clone $a; // 克隆对象操作 

var_dump($a == $b);  // 值相等
var_dump($a === $b);  // 不全等