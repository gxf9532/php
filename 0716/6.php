<?php

class Person
{
    public $name = "李四";
}

$person = new Person();

echo $person->name;
$person->name = '陈能喝';
// public关键字定义的类中的属性在类的外部可以通过类的实例化对象来进行访问和修改 
echo $person->name;