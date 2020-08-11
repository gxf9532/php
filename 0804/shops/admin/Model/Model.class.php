<?php

class Model
{
    protected $tabName; // 数据表名 
    protected $link;  // 存放数据库链接对象
    public $order; // 排序 
    public $limit; // 限定取出的条数 
    public $fields = '*';
    public $allFields = array();
    public $where; // where条件

    // 构造函数
    public function __construct($tabName)
    {
        $this->tabName = $tabName;
        $this->getConnect();
        $this->getFields();
    }

    // 链接数据库 
    private function getConnect()
    {
        $this->link = mysqli_connect(HOST, USER, PWD, DB);
        if (mysqli_connect_errno($this->link) > 0) {
            $this->errorHandle(mysqli_connect_error($this->link));
        }
    }

    // 查询
    public function select()
    {
        $sql = "SELECT {$this->fields} FROM {$this->tabName} {$this->where} {$this->order} {$this->limit}";
        // echo $sql;
        $this->fields = "*";
        $this->where = '';
        $this->allFields = array();
        $this->order = '';
        $this->limit = '';

        // 返回查询结果 
        return $this->query($sql);
    }

    // 单条查询
    public function find($id = '')
    {
        if (empty($id)) {
            $where = $this->where;
        } else {
            $where = "where id={$id}";
        }
        $sql = "SELECT {$this->fields} from {$this->tabName} {$where}";
        $res = $this->query($sql);

        return $res[0];
    }

    // 统计total数据
    public function count()
    {
        $sql = "SELECT count(*) as total FROM {$this->tabName}";
        $total = $this->query($sql);
        return $total[0]['total'];
    }

    // 添加数据
    public function add($data)
    {
        // $sql = "insert into {$this->tabName}(id,name,age) values(null,'','')";

        $keys = array_keys($data);
        $values = array_values($data);

        $keysStr = join(',', $keys);
        $valuesStr = join("','", $values);

        // 拼接sql 
        $sql = "INSERT INTO {$this->tabName}({$keysStr}) VALUES('{$valuesStr}')";
        // echo $sql;
        return $this->execute($sql);
    }

    // 删除
    public function del($id = '')
    {
        if (empty($id)) {
            $where = $this->where;
        } else {
            $where = ' where id=' . $id;
        }

        // 拼接sql语句
        $sql = "DELETE FROM {$this->tabName} {$where}";

        return $this->execute($sql);
    }

    // 修改方法
    public function update($data)
    {
        // array("name" => "电器", "price" => 20.5);
        // $sql = "update tableName set xxx='xxx', aaa='xxx' where xx='xx'";

        if (!is_array($data)) {
            return $this;
        }

        if (!empty($data['id'])) {
            $where = ' where id=' . $data['id'];
        } else {
            $where = $this->where;
        }

        if (empty($where)) {
            return false;
        }

        $result = '';
        foreach ($data as $key => $value) {
            // array("name" => "电器", "price" => 20.5);
            // $sql = "update tableName set xxx='xxx', aaa='xxx' where xx='xx'";
            if ($key != 'id') {
                $result .= "{$key}='{$value}',";
            }
        }
        $result = rtrim($result, ',');
        // echo $result;
        $sql = "UPDATE `{$this->tabName}` SET {$result} {$where}";
        // echo $sql;
        $this->execute($sql);
    }

    // 封装limit
    public function limit($limit)
    {
        $this->limit = ' limit ' . $limit;
        return $this;
    }

    // 封装order排序
    public function order($order)
    {
        $this->order = 'order by ' . $order;
        return $this;
    }

    public function field($fields = array())
    {
        if (!is_array($fields)) {
            return $this;
        }
        $fields1 = $this->check($fields);

        $this->fields = join(',', $fields1);
        return $this;
    }

    // 封装where 
    public function where($data)
    {
        // select * from shops where name like '%lisi%';

        if (is_array($data) && !empty($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {

                    switch ($value[0]) {
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
                } else {
                    $result[] = "{$key}" . '=' . "'{$value}'";
                }
            }
            $where = ' where ' . join(' and ', $result);
            $this->where = $where;
            return $this;
        } else {
            return $this;
        }
    }

    // 获取数据表中的字段
    protected function getFields()
    {
        $sql = "DESC {$this->tabName}";

        $result = $this->query($sql);

        foreach ($result as $value) {
            $fields[] = $value['Field'];
        }
        $this->allFields = $fields;
    }

    // 检测filed是否是数据库中已经存在的字段
    private function check($arr)
    {
        foreach ($arr as $key => $value) {
            if (!in_array($value, $this->allFields)) {
                unset($arr[$key]);
            }
        }
        return $arr;
    }

    // 封装非query执行方法
    protected function execute($sql)
    {

        $result = mysqli_query($this->link, $sql);

        if ($result && mysqli_affected_rows($this->link) > 0) {
            if (mysqli_insert_id($this->link)) {
                return mysqli_insert_id($this->link);
            }
            return true;
        } else {
            return false;
        }
    }




    // 具体查询
    protected function query($sql)
    {
        $result = mysqli_query($this->link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        return $list;
    }

    // 错误处理
    protected function errorHandle($errMsg)
    {
        if ($errMsg) {
            echo $errMsg;
            exit;
        }
    }
}
