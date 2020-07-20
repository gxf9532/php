<?php

abstract class aDB
{
    // 抽象方法不能写方法体
    abstract public function select();

    abstract public function add();

    // 抽象类中定义普通方法
    public function demo()
    {
        echo "demo";
    }
}
// 不能实例化抽象类
// new aDB();

// 实现抽象类的方法是继承
class DB extends aDB
{
    // 这里必须实现抽象类中的抽象方法
    public function select()
    {
        echo "数据库查询操作";
    }

    public function add()
    {
        echo "数据库添加操作";
    }
}

$db = new DB();
$db->select();

