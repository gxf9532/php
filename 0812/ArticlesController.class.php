<?php

class ArticleController extends CommonsController
{
   
    // 文章列表
    public function index()
    {
        //读取数据 
        $articles_key_data = $this->redis->lrange('list-articles',0, -1);
        
        foreach($articles_key_data as $key=>$val) {
            $tmp = $this->redis->hmget($val, ['id','title','article']);
            $data[] = $tmp;
        }
        
        // $this->assign('data', $data);
    }
}