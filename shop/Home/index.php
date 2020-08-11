<?php
session_start();

include '../Public/Config/config.php';
include './Org/page.class.php';
//include './Model/Model.class.php';
//include './Controller/UserController.class.php';
//include './Controller/GoodsController.class.php';

spl_autoload_register('autoload'); //PP7.2开始必须这样写

function autoload($className){
	if(substr($className,-10) == 'Controller'){
		include './Controller/'.$className.'.class.php';
	}elseif(substr($className, -5) == 'Model'){
		include './Model/'.$className.'.class.php';
	}else{
		include './Org/'.$className.'.class.php';
	}
}

/*$user = new UserController();
$user->index();
$user->add();


$goods = new GoodsController();
$goods->index();
$goods->edit();*/

// index.php?c=User
// index.php?c=Goods

$c = isset($_GET['c'])?$_GET['c']:'Index';
$c = ucfirst(strtolower($c));
$controller = $c.'Controller';

$info = new $controller;

$a = isset($_GET['a'])?$_GET['a']:'Index';
$a = ucfirst(strtolower($a));
$info->$a();