<?php

include './Config/config.php';
include './Model/Model.class.php';
// include './Controller/UserController.class.php';
// include './Controller/GoodsController.class.php';

//自动加载类库
spl_autoload_register('autoload'); //PP7.2开始必须这样写


function autoload($className)
{
    // echo $className; // xxxController
    if (substr($className, -10) == 'Controller') {
        include './Controller/' . $className . '.class.php';
    } else if (substr($className, -5) == 'Model') {
        include './Model/' . $className . '.class.php';
    } else {
        include './Org/' . $className . '.class.php';
    }
}


// $user = new UserController();
// $user->index();

// $goods = new GoodsController();
// $goods->index();

$c = isset($_GET['c']) ? $_GET['c'] : 'User';
$c = ucfirst(strtolower($c)); // User
$controller = $c . 'Controller';
$obj = new $controller;

// 接收action
$a = isset($_GET['a']) ? $_GET['a'] : 'Index';
$a = ucfirst(strtolower($a));

$obj->$a();



