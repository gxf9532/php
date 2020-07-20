<?php

class A
{
    public function __call($func, $args)
    {
        var_dump($func);
        var_dump($args);
    }

    static public function __callStatic($name, $arguments)
    {
        var_dump($name);
        var_dump($arguments);
    }
}

// $a = new A();
// $a->abc(1,2,3);
A::abc(1,2,3);