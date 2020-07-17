<?php


class Human
{
    public $name = '';
    public function __construct($name)
    {
        $this->name = $name;
        echo "这里执行了";
    }
}   


class Man extends Human
{
    public $age = 0;
    public function __construct($age, $name)
    {
        // 子类构造函数中调用父类中构造函数
        parent::__construct($name);

        echo "子类的构造函数";
    }
}

$man = new Man(20, 'lisi');
