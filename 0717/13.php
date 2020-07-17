<?php

class Math
{
    // static 静态
    public static $name = "lisi";

    // 非静态
    public $age = 20;
    

    // 声明静态方法
    public static function say()
    {
        echo "say()";
        // 不能出现非静态$this和成员
        // echo $this->age;
        // 只能访问静态属性或静态方法
        echo Math::$name;

        //静态方法中去调用静态方法
        Math::play();
    }

    public static function play()
    {
        echo "play()";
    }

    // 类的内部使用静态属性
    public function useName()
    {
        return Math::$name;
    }
}

// 声明成静态的属性不能在类的外部通过对象的方式调用  而要通过类名的方式进行调用 
 $math = new Math();
 // 这种是不可以的 
//  echo $math->name;

echo Math::$name;  // 通过类名+::+属性名(方法名)的形式进行调用

// 调用静态方法
echo Math::say();

echo $math->useName();

 






