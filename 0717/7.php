<?php

class Human
{
    // 受保护的属性在父类内部和继承的子类内部都可以调用
    protected $age = 20;

    // 受保护的方法在父类内部和继承的子类内部都可以调用
    protected function getAge()
    {
        echo "这里是受保护的方法";
    }
}

class Man extends Human
{
    public function foo()
    {
        // 这里调用父类中受保护的方法
        $this->getAge();
    }
}

//  受保护的方法类的外部不能直接调用
$human = new Human();
// $human->getAge();

$man = new Man();
$man->foo();

