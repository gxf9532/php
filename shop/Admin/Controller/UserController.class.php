<?php 

class UserController{
	public function index(){
		$user = new Model('user');

		/*搜索*/
		//var_dump($_GET);
		//exit;
		if(!empty($_GET['username'])){
			$map['username'] = array('like',$_GET['username']);
		}else{
			$map = '';
		}
		/*搜索结束*/
		
		/*分页*/
		$total = $user->where($map)->count();
		var_dump($total);
		$page = new Page($total,3);		
		/*分页结束*/

		$userlist = $user->limit($page->limit)->where($map)->select();
		$i = 1;
		include './View/User/index.html';
	}

	public function add(){
		include './View/User/add.html';	
	}


	public function doadd1(){
		if($_POST['password']!=$_POST['repassword']){
			echo "两次密码不一致<a href='./index.php?c=user&a=add'>点我返回重新填写</a> ";exit;
		}
		unset($_POST['repassword']);

		$_POST['password'] = md5($_POST['password']);
		//var_dump($_POST);

		$_POST['status'] = 0;
		$_POST['addtime'] = time();
		//var_dump($_POST);
		
		$user = new Model('user');
		$bool = $user->add($_POST);
		if($bool){
			echo "<script>alert('添加成功');location='./index.php?c=user&a=index'</script>";
		}else{
			echo "<script>alert('添加失败');location='./index.php?c=user&a=index'</script>";
		}
		
	
	}


	public function del(){
		//var_dump($_GET);
		$id = $_GET['id'];
		$user = new Model('user');
		if($user->del($id)){
			header('location:./index.php?c=user&a=index');
		}else{
			header('location:./index.php?c=user&a=index');
		}

	}
}