<?php

class Person
{
    // 属性  不要定义复杂的语法 尤其是带有运算的
    public $name = "李四";

    function say($age) {
        return "我今年".$age;
    }
}

$person = new Person();
$res = $person->say(10);
echo $res;
