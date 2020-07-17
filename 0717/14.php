<?php

//  类的外部定义一个常量
define('PI', 3.14);

class A 
{
    // 在类的内部定义常量
    const PI = 3.1415926;

    public function say()
    {
        // 类名+::常量名 来调用类的内部声明的常量
        echo A::PI;
    }
}
$a = new A();
$a->say();

echo PI;
echo A::PI;

