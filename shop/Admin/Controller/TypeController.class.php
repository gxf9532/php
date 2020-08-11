<?php 
class TypeController{

	/*
		
	*/ 
	public function index(){
	 	$type = new Model('type');
	 	//$pid = 0;
	 	if(empty($_GET['pid'])){
	 		$map['pid'] = 0;
	 	}else{
	 		$map['pid'] = $_GET['pid'];
	 	}
	 	
	 	$typelist = $type->where($map)->select();
	 	//var_dump($typelist);
		include './View/Type/index.html';
	}

	public function add(){
		//如果没有pid,添加的是顶层分类
		//如果有pid号,说明添加的是子分类
		if(empty($_GET['pid'])){
			$pid = 0;
			$path = '0,';

		}else{
			$pid = $_GET['pid'];
			$type = new Model('type');
			$typeinfo = $type->find($pid);
			$path = $typeinfo['path'].$typeinfo['id'].',';
			//echo $pid.'<br>';
			//var_dump($path);
		}
		include './View/Type/add.html';
	}

	public function doadd(){
		//var_dump($_POST);exit;
		$type = new Model('type');
		$result = $type->add($_POST);
		if($result){
			echo "<script>alert('添加成功');location='./index.php?c=type&a=index'</script>";
		}else{
			echo "<script>alert('添加失败');location='./index.php?c=type&a=index'</script>";
		}
	}

	public function del(){
		//echo $_GET['id'];
		$type = new Model('type');
		$map['pid'] = $_GET['id'];
		$result = $type->where($map)->select();
		//var_dump($result);
		if($result){
			echo "该分类中有子分类,无法删除,请删除子分类后再删除本分类";
		}else{
			if($type->del($_GET['id'])){
				echo "<script>alert('删除成功');location='./index.php?c=type&a=index';</script>";
			}else{
				echo "删除失败";
			}
		}
	}

	public function display(){
		//var_dump($_GET);
		$data['display'] = $_GET['display'];
		$data['id'] = $_GET['id'];
		//var_dump($data);
		$type = new Model('type');
		$result = $type->update($data);
		if($result){
			header('location:./index.php?c=type&a=index');
		}else{
			header('location:./index.php?c=type&a=index');
		}
	}
}