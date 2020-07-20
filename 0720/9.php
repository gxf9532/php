<?php

interface USB
{
    public function run();
}

interface typeC
{
    public function runtypeC();
}

// 接口之间的继承关系
interface PS2 extends USB
{
    public function move();
}

// 这里定义一个父类A
class A
{
    public function fun()
    {
        echo "这里是A类的方法";
    }
}

// 一个类可以在继承类的同时实现接口(继承必须写在实现接口的前面)
class B extends A implements typeC, PS2
{
    public function runtypeC()
    {
    }

    public function move()
    {
    }
    // 这里也必须实现继承接口
    public function run()
    {
    }
}

$b = new B();
// 这里子类的对象调用了父类的继承方法
$b->fun();
