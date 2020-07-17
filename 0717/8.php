<?php

// private 私有 

class Human
{
    // 定义私有属性
    private $money = 100000; // 这就是传说中的私房钱(只能自己调用)

    public function getMoney()
    {   
        // 内部可以访问
        echo "类的内部访问私有属性:".$this->money;
    }

    private function getAge()
    {
        echo "这里是父类的私有方法geyAge";
    }


    
}

// 类的外部访问私有属性
$human = new Human();
// echo $human->money; // 肯定是不可以的
// $human->getMoney();


//  子类继承父类 
class Man extends Human
{
    public function manGetMoney()
    {
        
        echo $this->money;
    }
}

// 实例化子类对象
$man = new Man();
// 子类对象调用父类的方法
// $man->getMoney();

// 子类对象使用自己类的方法来访问父类的私有属性是不可以的
$man->manGetMoney();
// $man->getAge(); // 不能调用


