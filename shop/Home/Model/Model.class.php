<?php 
class Model{
	protected $tabName;//存在的是表名
	protected $link;//存的是链接对象
	public $order;//存的是排序字符串 order by xx asc|desc
	public $limit; //存的是限制取出条目的字符串  limit 4,5
	public $fileds = '*';
	public $allFields = array();
	public $where;

	public function __construct($tabName){
		$this->getConnect();
		$this->tabName = $tabName;
		$this->getFields();
	}


	public function select(){
		$sql = "select {$this->fileds} from {$this->tabName} {$this->order} {$this->limit} {$this->where}";
		//echo $sql;
		//return 二维数组;
		//$result = mysqli_query($this->link,$sql);
		$this->fileds = '*';
		$this->where = '';
		$this->allFields = array();
		$this->order = '';
		$this->limit = '';
		return $this->query($sql);
	}


	//$model->where($data)->find();
	//$model->find(17);
	public function find($id=''){
		if(empty($id)){
			$where = $this->where;
		}else{
			$where = " where id={$id}";
		}
		//echo $where;exit;
		$sql = "select {$this->fileds} from {$this->tabName} {$where}";
		//echo $sql;exit;
		$info = $this->query($sql);
		//var_dump($info[0]);
		return $info[0];
	}


	//查询总共有多少条数据
	public function count(){
		$sql = "select count(*) as total from {$this->tabName}";
		$total = $this->query($sql);
		//var_dump($total);
		return $total[0]['total'];
	}

	//添加数据操作
	public function add($data){
		//$sql = "insert into {$this->tabName}(xxx,xxx,xxx...) values('')";
		$key = array_keys($data);
		//var_dump($key);
		//exit;
		$value = array_values($data);
		//var_dump($value);exit;
		$keys = join(',',$key);

		//var_dump($keys);
		$values = join("','",$value);
		//var_dump($values);exit;
		//echo $values;exit;
		$sql = "insert into {$this->tabName}({$keys}) values('{$values}')";
		//echo $sql;exit;
		return $this->execute($sql);

	}

	//删除功能
	public function del($id=''){
		
		if(empty($id)){
			$where = $this->where;
		}else{
			$where = ' where id='.$id;
		}
		$sql = "delete from {$this->tabName} {$where}";
		//echo $sql;exit;
		return $this->execute($sql);
	}



	//$model->where(array)->update($data);

	public function update($data){
		//$sql = "update ......";
		//update {$this->tabNmae} set xxx=xxx,xxx=xxx {$this->where};
		//'update 表名 set xxx=xxxx,xxx=xxx where id=xx';
		if(!is_array($data)){
			return $this;
		}

		if(!empty($data['id'])){
			$where = ' where id='.$data['id'];
		}else{
			$where = $this->where;
		}

		if(empty($where)){
			return false;
		}

		// data = array(
		// 		'id'=>20
		// 		'name'=>'老王'
		// 		'age'=>40
		// );
		$result = '';
		foreach($data as $key=>$value){
			//update {$this->tabNmae} set xxx=xxx,xxx=xxx,xx=xxx... {$this->where};
			if($key!='id'){
				$result .= "{$key}='{$value}',";
			}		
		}
		$result = rtrim($result,',');
		//echo $result;
		$sql = "update {$this->tabName} set {$result} {$where}";
		//echo $sql;
		return $this->execute($sql);
	}


	public function limit($limit){ //5.5
		$this->limit = ' limit '.$limit; //limit 5,5
		return $this;
	}

	//排序功能 select * from info order by xxx asc|desc
	public function order($order){
		 $this->order = 'order by '.$order;
		 //order by id desc;
		 return $this;
	}

	public function field($fileds=array()){
		//var_dump($fileds);
		if(!is_array($fileds)){
			return $this;
		}

		$fileds_1 = $this->check($fileds);
		//var_dump($fileds_1);

		$this->fileds = join(',',$fileds_1);
		//echo $this->fileds;
		return $this;
	}
	//$data['id'] = 19;
	//$data['name'] = array('like','王');
	//$data['age'] = array('in','49,50,55');
	//$data['id'] = array('gt',19);
	//$data['id'] = array('lt',19);

	public function where($data){
		
		//select * from info where name like '%王%';
		if(is_array($data) && !empty($data)){
			foreach($data as $key=>$value){
				if(is_array($value)){
					//echo 123;exit;
					//var_dump($data);exit;
					//$data = array('name'=>array('like','王'));
					switch($value[0]){
						case 'like':
							$result[] = "{$key} like '%{$value[1]}%'";
							break;
						case 'gt':
							$result[] = "{$key} > '{$value[1]}'";
							break;
						case 'lt':
							$result[] = "{$key} < '{$value[1]}'";
							break;
						case 'in':
							$result[] = "{$key} in ($value[1])";
							break;
					}
				}else{
					//echo 123;
					//array('id'=>19);
					//select * from info where id=19
					$result[] = "{$key}".'='."'{$value}'";//id='19'
					//var_dump($result);
					
				}
			}
			$where = ' where '.join(' and ',$result);
			//var_dump($where);
			$this->where = $where;
			return $this;
		}else{
			return $this;
		}
	}


/*****************辅助方法*********************************/


	public function query($sql){
		//echo $sql;
		$result = mysqli_query($this->link,$sql);
		while($row = mysqli_fetch_assoc($result)){
			//var_dump($row);
			$list[] = $row;
		}
		return $list;
	}

	public function execute($sql){
		$result = mysqli_query($this->link,$sql);
		if($result && mysqli_affected_rows($this->link)>0){
			if(mysqli_insert_id($this->link)){
				return mysqli_insert_id($this->link);
			}
			return true;
		}else{
			return false;
		}
	}

	public function getConnect(){
		$this->link = mysqli_connect(HOST,USER,PWD,DB);
		if(mysqli_connect_errno($this->link)>0){
			echo mysqli_connect_error($this->link);exit;
		}
		mysqli_set_charset($this->link,CHARSET);
	}

	//专业检测filed条件是否是数据库字段,是的,留着,不是的删掉
	public function check($arr){
		//var_dump($arr);
		foreach($arr as $key=>$value){
			//in_array是检测用户给的字段在不在数据库的字段列表中
			if(!in_array($value,$this->allFields)){
				unset($arr[$key]);
			}
		}
		//var_dump($arr);
		//var_dump($this->allFields);
		return $arr;
		//var_dump($this->allFields);
	}

	//获取数据表中的字段
	public function getFields(){
		$sql = "desc {$this->tabName}";
		$result = $this->query($sql);
		//var_dump($result);
		//$fields = array();
		foreach($result as $value){
			$fields[] = $value['Field'];
		}
		//var_dump($fileds);
		$this->allFields = $fields;
	}
}

//thinkphp 3.2
/*$model = new Model('info');
$data['id'] = 19;
$data1 = $model->find();
var_dump($data1);*/

/*$data = array(
	'id'=>40,
	'name'=>'老王',
	'age'=>40
	);
$model->update($data);*/
//$data['name'] = array('like','王');
//$model->where($data);
//$model->field(array('name','age','city'))->where($data)->find();
/*var_dump($model->select());
var_dump($model->find(4));*/
//$model->del(9);
//$model->update('name','laowang','age','15','id','7')

//echo $model -> count();

/*$data = array('name'=>'laowang','sex'=>'1','age'=>18,'city'=>'beijing');
//var_dump($model->add($data));

$da = $model->field(array('name','sex','city','egg'))->select();
var_dump($da);*/
//$model->field(array('name','sex','city','egg','lawang','nihao','haobuhao'));

/*$data = array(
	'name'=>"laowang",
	'sex'=>1,
	);*/
//update xxxx set xxxx=xxx,xxxx=xxx,xxxx=xxx where xxx=xx;
//$model->where('id=5')->update($data);
