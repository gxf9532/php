<?php

// 类的继承
//  儿子继承父亲的遗产 

// 人类(作为父类) 被继承的类称之为父类 
class Human 
{
    public $age = 0; 
    protected $money = 100;

    // 父类中定义一个方法 
    public function say()
    {
        echo "这里是人类的说话方法";
    }

    public function eat()
    {
        echo "这里是人类吃饭的方法";
    }
}

// 实例化人类的对象
// $human = new Human();
// $human->say();

// 男人类 男人也是人 具有人类的所有特征
class Man extends Human // 这里使用关键字extends来表示继承 
{
    
}

// 这里实例化一个Man的对象
$man = new Man();

// 这里Man类的实例对象$man调用了Human类的属性和方法 
// $man->say();
// echo $man->age;





