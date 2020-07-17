<?php

// 继承关系中权限问题
// 父亲类
class Father
{
    public $money = 100000;
    protected $age = 30; // 受保护的属性 在本类的内部可以调用
    public function play()
    {
        echo "父类的play方法";
    }
}

// 子类继承父类 
class Son extends Father
{
    public function eat()
    {
        // 在子类的内部是否可以调用 可以
        echo $this->money;
        echo $this->age;  //  父类中受保护的属性子类的内部是否可以调用 可以
        echo "子类的吃饭方法";
    }
}

// 实例化子类对象
$son = new Son();

// 类的外部子类的实例化对象可以直接调用父类的public属性
// echo $son->money;
$son->eat();
