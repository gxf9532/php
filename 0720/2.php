<?php

// 单例模式
final class Single
{
    private $rand;
    private static $ob = null;
    
    final private function __construct()
    {
        $this->rand = mt_rand(10000, 50000);
    }

    // static 静态修饰的方法是属于类本身的 而不属于对象
    public static function getObj()
    {
        // 判断
        if (self::$ob === null) {
            self::$ob = new self();
        }
        return self::$ob;
    }
}

var_dump(Single::getObj());
var_dump(Single::getObj());
var_dump(Single::getObj());
var_dump(Single::getObj());


