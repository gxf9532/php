<?php 

class GoodsController{
	public function index(){
		$goods = new Model('goods');
		$goodslist = $goods->select();
		$type = new Model('type');
		//var_dump($goodslist);

		foreach($goodslist as $key=>$value){
			$typename = $type->find($value['typeid']);
			//var_dump($typename);
			$goodslist[$key]['typename'] = $typename['name'];
		}
		include './View/Goods/index.html';
	}
	public function add(){
		$type = new Model('type');
		$typelist = $type->order('concat(path,id,",")')->select();
		include './View/Goods/add.html';
	}

	public function doadd(){
		//var_dump($_FILES);
		//var_dump($_POST);
		foreach($_POST as $v){
			if($v == ''){
				echo "请认真填写内容";exit;
			}
		}

		$upload = new Uploads('pic');
		$upload->typelist = array('image/jpeg','image/gif','image/png');
		$upload->path = '../Public/goods/';

		$bool = $upload->upload();
		if(!$bool){
			echo "文件上传失败";exit;
		}
		$_POST['pic'] = $upload->savename;
		//var_dump($_POST);
		
		$goods = new Model('goods');
		if($goods->add($_POST)){
			echo "添加成功";
		}else{
			unlink('../Public/goods/'.$_POST['pic']);
			echo "添加失败";
		}
	}
}