<?php

// 定义一个用户基本功能接口 
interface Userbase
{
    const DB = "mysql";
    // public $name = "lisi";
    public function login($username, $password);

    public function logout();
}

interface Userfun
{
    public function play();
}

// 接口的使用 (实现接口)
class User implements Userbase,Userfun // 这里实现了多个接口
{
    public function login($username, $password)
    {
        echo $username.$password;
    }

    public function logout()
    {
        echo "logout";
    }

    public function play()
    {
        echo "娱乐方法";
    }
}
$user = new User();
$user->login('admin', 123456);
$user->logout();
$user->play();