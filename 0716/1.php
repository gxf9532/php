<?php

/** 
 *  功能
 *  参数
 *  返回值
 *  
 */
// 使用关键字class声明一个类  类名一般使用驼峰式命名法myClassName
class Person
{
    // 类中可以定义: 1.属性  2.方法  
    // 定义属性 
    public $name = "李四";
    public $height = "180cm";
    public $weight = '70kg';

    // 定义方法 
    function say()
    {
        echo "说话方法";
    }
}

// 使用类中的属性和方法 需要通过类的实例化对象来完成  
//  类的实例化对象需要通过关键字new+对象名来创建
$person = new Person;
// $person = new Person();

echo "<pre>";
print_r($person);

// 通过类的实例对象来调用类中的属性和方法 
echo $person->name;
echo $person->height;

$person->say();
