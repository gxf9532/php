<?php

class UserController
{
    public function index()
    {
        if ($_GET['name'] != '') {
            $map['name'] = array('like', $_GET['name']);
        } else {
            $map = '';
        }
        // echo "用户首页";
        $user = new Model('info');
        $total = $user->count();

        $page = new Page($total, 5);

        // var_dump($page);
        // echo $page->limit;

        $userList = $user->where($map)->limit($page->limit)->select();

        // var_dump($userList);

        include './View/User/index.html';
    }

    public function del()
    {
        echo $_GET['id'];
    }

    public function edit()
    {
        echo $_GET['id'];
    }

    public function doadd()
    {
        // new Model();
    }
}