<?php

class A
{
    public function __get($a)
    {       
        if ($a == 'age') {
             $this->$a = 100;
        }
       
    }

    public function __set($arg, $val)
    {
        var_dump($arg);
        var_dump($val);
        $this->$arg = $val;
    }

    public function __isset($arg)
    {
        echo $arg;
    }

    public function __unset($arg)
    {
        echo $arg;
    }
    
    public function __toString()
    {
        return "这里是对象输出的字符串";
    }
}

$a = new A(); 
// echo $a->age; // 这里调用一个类中不存在的属性 自动调用__get()
// var_dump($a);

// 给类中一个不存在的属性设置值 自动调用__set() 
// $a->sex = "男";
// var_dump($a);

// isset($a->abc);
// unset($a->def);

// 将一个对象当做字符串输出时就会自动调用
echo $a;


