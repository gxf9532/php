<?php

class Person
{
    public $name = "李四";
    public $age = 20;

    public function sayName() {
        // 在类的自身方法中去调用自身的属性
        // 关键字 this 指代  $this是一个伪对象 谁调用就指代谁 
        var_dump($this);
        // 在类中调用自身的属性和方法  要使用$this->属性 $this->方法名() 
        // echo $this->name;
    }
}

$person = new Person();
$person->sayName();
