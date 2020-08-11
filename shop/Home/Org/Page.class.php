<?php 
/**
 * 思路:
 * 	$page = new Page(总数量,每页显示条数);
 * 	返回$page当前页
 *
 *  
 */

class Page{
	protected $num;//每页显示条数
	protected $total;//总条数
	protected $amount;//总页数
	protected $current;//当前页码数
	protected $offset;//跳过多少行(偏移量)
	protected $limit;//分页页码

	public function __construct($total,$num){//13,5,3
		//1.每页显示条数
		$this->num = $num;

		//2.总条数
		$this->total = $total;

		//3.一共有多少页
		$this->amount = ceil($total/$num);

		//4.当前在第几页
		$this->init();
		
		//5.偏移量
		$this->offset = ($this->current-1)*$num;

		//6.分页字符串
		$this->limit = "{$this->offset},{$this->num}";

	}

	//当前是第几页
	public function init(){
		$this->current = empty($_GET['page'])?'1':$_GET['page'];

		if($this->current<1){
			$this->current = 1;
		}

		if($this->current > $this->amount){
			$this->current = $this->amount;
		}
	}

	public function __get($key){
		if($key == 'limit'){
			return $this->limit;
		}

		if($key == 'offset'){
			return $this->offset;
		}

		if($key == 'current'){
			return $this->current;
		}
	}

	public function getButton(){
		$_GET['page'] = empty($_GET['page'])?'1':$_GET['page'];

		//$prev = array('page'=>3);
		//$next = array('page'=>5);
		//$_GET = array('page'=>4);

		$prev = $next = $_GET;


		$prev['page'] = $prev['page']-1;
		if($prev['page']<1){
			$prev['page'] = 1;
		}


		$next['page'] = $next['page']+1;
		if($next['page']>$this->amount){
			$next['page'] = $this->amount;
		}

		//http://127.0.0.1/xxxx/ss32_shop/index.php?c=user&a=index&page=xx
		
		$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

		$prev = http_build_query($prev);
		$next = http_build_query($next);

		$prevpath = $url.'?'.$prev;
		$nextpath = $url.'?'.$next;

		$str = '';
		$str .= '<a href="'.$prevpath.'">上一页</a>';
		$str .= '<a href="'.$nextpath.'">下一页</a>';
		return $str;
	}
}

/*$page = new Page(20,5);
//$model->limit($page->limit)->select();
var_dump($page->getButton());*/