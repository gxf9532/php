<?php

class Memcached
{
    public function __construct($host = 'localhost', $port = 11211)
    {
        // 初始化信息
        $this->mem = new Memcache();
        $this->mem->connect($host, $port);
    }

    // 添加数据
    public function madd($key, $val, $flag = 0, $time = 120)
    {

        return $this->mem->add($key, $val, $flag, $time);
    }

    // 设置
    public function mset($key, $val, $flag = 0, $time = 120)
    {
        return $this->mem->set($key, $val, $flag, $time);
    }

    // 删除
    public function mdelete($key)
    {
        if (empty($key)) {
            exit('请输入有效参数');
        }
        return $this->mem->delete($key);
    }

    // 删除所有
    public function mflush()
    {
        return $this->mem->flush();
    }

    // 检测一个键名是否存在 
    public function mcheck($key)
    {
        return $this->mem->get($key) ? true : false;
    }

    // 获取
    public function mget($key)
    {
        return $this->mem->get($key);
    }

    public function close()
    {
        $this->mem->close();
    }
}


