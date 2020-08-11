<?php 

class IndexController{
	public function index(){
		//echo "欢迎登陆老王商城";
		//include './include/head.html';
		$this->nav();
		try{
			$dsn = "mysql:host=127.0.0.1;dbname=shop;charset=utf8";
			$pdo = new PDO($dsn,'root','');
			$pdo->setAttribute(3,1);
			if(empty($_GET['typeid'])){
				$sql = "select * from goods where status=0 limit 8";
				$stmt = $pdo->prepare($sql);
			}else{
				$sql = "select * from goods where status=0 and typeid=:typeid limit 8";
				$stmt = $pdo->prepare($sql);
				$typeid = $_GET['typeid'];
				$stmt->bindParam(":typeid",$typeid);
			}
			$stmt->execute();
			if($stmt->rowCount()){
				$goods = $stmt->fetchAll(2);
			}
			//var_dump($goods);
		}catch(PDOException $e){
			$e->getMessage();
		}
		include './view/Index/index.html';
		include './include/foot.html';
	}

	public function nav(){
		try{
			$dsn = "mysql:host=127.0.0.1;dbname=shop;charset=utf8";
			$pdo = new PDO($dsn,'root','');
			$pdo->setAttribute(3,1);
			$sql = "select id,name,pid,path,display from type where display=0 order by concat(path,id,',') asc";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount()){
				$types = $stmt->fetchAll(2);
				//var_dump($types);
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		include './include/head.html';
	}
	
}