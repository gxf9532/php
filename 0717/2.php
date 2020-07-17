<?php

class Human
{
    public function getAll()
    {
        echo "这里是父类的方法";
    }
}

class Man extends Human
{
    // 重载
    public function getAll()
    {
        echo "这里是子类的同名方法";
    }
}

$man = new Man();

//  这里应该打印父类还是子类的执行结果呢？
$man->getAll();
