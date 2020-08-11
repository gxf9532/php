<?php 
class CartController{
	public function addCart(){
		if(isset($_GET['id'])){
			if(!empty($_SESSION['cart'][$_GET['id']])){
				$_SESSION['cart'][$_GET['id']]['num']+=1;
				header('location:./index.php?c=cart&a=index');exit;
			}

			try{
				$dsn = "mysql:host=127.0.0.1;dbname=shop;charset=utf8";
			$pdo = new PDO($dsn,'root','');
			$pdo->setAttribute(3,1);
			$sql = "select * from goods where id=:id";
			$stmt = $pdo->prepare($sql);
			$id =$_GET['id'];
			$stmt->bindParam(":id",$id);
			$stmt->execute();
				if($stmt->rowCount()){
					$row = $stmt->fetch(2);
					//var_dump($row);
				}
				$row['num'] = 1;
				$_SESSION['cart'][$id]=$row;
				//var_dump($_SESSION);
				include './View/Cart/addCart.html';
			}catch(PDOException $e){
				$e->getMessage();
			}
		}else{
			echo "<script>alert('请添加指定商品');location='./index.php?c=index&a=index'</script>";
		}
	}

	public function index(){
		$index = new IndexController();
		$index->nav();
		//var_dump($_SESSION);
		include './View/Cart/showCart.html';
	}

	public function del(){
		unset($_SESSION['cart'][$_GET['id']]);
		header('location:./index.php?c=cart&a=index');
	}

	public function delete(){
		unset($_SESSION['cart']);
		header('location:./index.php?c=cart&a=index');
	}

	public function jia(){
		$id = $_GET['id'];
		$_SESSION['cart'][$id]['num'] +=1;
		header('location:./index.php?c=cart&a=index');
	}

	public function jian(){
		$id = $_GET['id'];
		$_SESSION['cart'][$id]['num'] -=1;
		if($_SESSION['cart'][$id]['num']<1){
			$_SESSION['cart'][$id]['num']= 1;
		}
		header('location:./index.php?c=cart&a=index');
	}
}