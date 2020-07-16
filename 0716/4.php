<?php

// 类中的构造方法

class Person
{
    // 定义类的构造方法
    public function __construct()
    {
        /* 
            定义:     类中都会有一个构造方法叫__construct() 
            调用时机: 这个方法会在类的实例化同时自动被调用
            作用:     一般用来做一些初始化工作  
        */
        echo "这里是类的构造方法";
    }

    // 这里自定义一个方法
    function say()
    {
        echo "这里是类的自定义say方法";
    }

    public function __destruct()
    {
        // 执行时机: 对象销毁的时候自动执行 
        echo "这里对象已经被销毁了";
    }
}
// 一个类可以实例化出多个对象
// $person = new Person();
// $person2 = new Person();
// $person3 = new Person();
// var_dump($person);
// var_dump($person2);
// var_dump($person3);


// 类一旦被new(实例化) 构造方法就会自动被调用
$person = new Person();
$person->say();
// 调用完成 对象成为垃圾 回收  自动调用__destruct()




