<?php

class CommonsController
{
    public $redis;
    
    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('localhost', 6379);
        $this->redis->select('article');
    }
}
