<?php

class Page
{
    protected $num; // 每页显示调试 
    protected $total; // 总条数 
    protected $amount; // 总页数  
    protected $current; // 当前页码 
    protected $offset; // 跳过多少行 
    protected $limit; // 分页页码 

    public function __construct($total, $num)
    {
        // 每页显示多少条 
        $this->num = $num;

        // 总条数  
        $this->total = $total;

        // 一共有多少页 
        $this->amount = ceil($total / $num);

        // 当前在第几页
        $this->init();

        // 偏移量
        $this->offset = ($this->current - 1) * $num;
        // limit 0, 5;
        // limit 5, 5;
        // limit  $this->offset, $num;

        // 拼接分页字符串
        $this->limit = "{$this->offset},{$this->num}";

    }

    // 当前在第几页 
    public function init()
    {
        $this->current = empty($_GET['page']) ? '1' : $_GET['page'];

        if ($this->current < 1) {
            $this->current = 1;
        }

        if ($this->current > $this->amount) {
            $this->current = $this->amount;
        }
    }

    public function __get($key)
    {
        if ($key == 'limit') {
            return $this->limit;
        }

        if ($key == 'current') {
            return $this->current;
        }

        if ($key == 'offset') {
            return $this->offset;
        } 
    }

    public function getButton()
    {
        $_GET['page'] = empty($_GET['page']) ? '1' : $_GET['page'];

        $prev = $next = $_GET;

        $prev['page'] = $prev['page'] - 1;

        if($prev['page'] < 1) {
            $prev['page'] = 1;
        }

        $next['page'] = $next['page'] + 1;
        if ($next['page'] > $this->amount) {
            $next['page'] = $this->amount;
        }

        // http://127.0.0.1/xxx/mvc/index.php?c=user&a=index&page=1

        // 拼接url  
        $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

        $prev = http_build_query($prev);
        $next = http_build_query($next);

        $prevpath = $url . '?' . $prev;
        $nextpath = $url . '?' . $next;

        $pageStr = '';

        $pageStr .= '<a href="'.$prevpath.'">上一页</a>&nbsp;&nbsp;';
        $pageStr .= '<a href="'.$nextpath.'">下一页</a>';

        return $pageStr;
    }
}

// $page = new Page(29, 5);


