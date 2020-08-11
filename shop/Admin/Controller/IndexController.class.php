<?php

class IndexController
{
	public function index()
	{
		if (empty($_SESSION['admin'])) {
			//没有登录
			header('location:index.php?c=index&a=login');
		} else {
			//echo "欢迎登陆老王商城后台";
			include './view/index.html';
		}
	}
	public function login()
	{
		include './View/login.html';
	}

	public function dologin()
	{
		// var_dump($_POST);

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		// //判断长度是否一致,正则

		$map['username'] = $username; // admin ' or 1 #
		$map['password'] = $password;

		$map['status'] = 0;
		$map['level'] = array('gt', 1);

		// echo "<pre>";
		// print_r($map);

		$user = new Model('user');
		$userinfo = $user->where($map)->select();
		// var_dump($userinfo);
		if ($userinfo) {
			unset($userinfo[0]['password']);
			$_SESSION['admin'] = $userinfo[0];
			// var_dump($_SESSION);

			echo "<script>alert('登录成功');location='./index.php';</script>";
		} else {
			echo "<script>alert('用户名或者密码不正确');location='./index.php?c=index&a=login';</script>";
		}
	}

	public function outlogin()
	{
		unset($_SESSION['admin']);
		header('location:./index.php');
	}

	public function showVerify()
	{
		$verify = new Verify();
		$verify->showVerify();
	}
}
