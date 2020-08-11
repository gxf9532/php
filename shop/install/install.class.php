<?php 
class install{
	public function index(){
		include './index.html';
	}

	public function myserver(){
		//var_dump($_POST);
		if(empty($_POST['yd'])){
			echo "<script>alert('请先阅读,并勾选已阅读,再点击下一步');location='./index.php';</script>";exit;
		}

		include './myserver.html';
	}

	public function config(){
		include './config.html';
	}

	public function doconfig(){
		//var_dump($_POST);
		$link = mysqli_connect($_POST['host'],$_POST['dbuser'],$_POST['dbpwd']);

		//var_dump($link);
		mysqli_query($link,'drop database if exists '.$_POST['db']);

		mysqli_query($link,'create database if not exists '.$_POST['db']);

		mysqli_select_db($link,$_POST['db']);

		mysqli_set_charset($link,'utf8');

		
		include './project.php';
		//var_dump($arr);
		foreach($arr as $v){
			mysqli_query($link,$v);
			echo "创建表成功";
		}

		$username = $_POST['username'];
		$adminpwd = md5($_POST['adminpwd']);
		$time = time();

		$sql = "insert into user(username,password,level,status,addtime) values('{$username}','{$adminpwd}',3,0,'{$time}')";
		$result = mysqli_query($link,$sql);

		if($result){
			echo "安装成功";
			echo "进入<a href='../index.php'>前台</a> ";
			echo "进入<a href='../admin/index.php'>后台</a> ";
			unlink('./nvshen.mei');
		}else{
			echo "安装失败,请尝试重新安装,如果再次安装失败,请联系管理员";
		}

$str=<<<EOF
<?php 
define('HOST',"{$_POST['host']}");
define('USER',"{$_POST['dbuser']}");
define('PWD',"{$_POST['dbpwd']}");
define('DB',"{$_POST['db']}");
define('CHARSET','utf8');
EOF;

file_put_contents('../public/config/config.php',$str);
	}	
}