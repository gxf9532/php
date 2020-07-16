<?php

class Person
{
    // public $money = 1; // 银行存款
    // public $pass = ''; // 银行密码

    // protected 受保护的 类的外部不能通过属性直接调用 只能在类的内部使用
    protected $money = 1; // 银行存款
    protected $pass = ''; // 银行密码
    protected $count = 3; // 默认次数 

    public function __construct($money, $pass = '123456')
    {
        $this->money = $money;
        $this->pass = $pass;
    }


    // 定义protected方法 外部不能直接调用
    protected function getPass()
    {
        return $this->pass;
    }

    // 向外暴露一个方法用来获取密码
    public function checkPass($pass)
    {
        if ($pass == $this->pass) {
            return $this->getMoney();
        } else {
            $this->count--;
            if ($this->count == 0) {
                return '您的密码输错三次已经锁定,请联系当地发卡银行';
            }
            return "密码不正确!还有{$this->count}次机会";
        }
    }

    protected function getMoney()
    {
        return $this->money;
    }
}

$chenyou = new Person(1000);

// echo $chenyou->money;
// echo $chenyou->pass;

// echo $chenyou->getPass();

$pass = '12345';
$res = $chenyou->checkPass($pass);
echo $res;
$res = $chenyou->checkPass($pass);
echo $res;
$res = $chenyou->checkPass($pass);
echo $res;
