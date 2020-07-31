<?php

require_once('./config.php');
require('./Model.class.php');

// var_dump(new Model('shops'));

$m = new Model('shops');
// $res = $m->find(2);

// echo "<pre>";
// print_r($res);

// echo $m->count();

// echo $m->add(array("name" =>"电冰箱", "num" => 1, "price" => 1680,"desn" => '666'));

// echo $m->del(20);

// $m->update(array("id" => 2,  "name" => "电冰箱", "num" => 1, "price" => 1680, "desn" => '666'));

if ($_GET['name'] != '') {
    $map['name'] = array('like', $_GET['name']);
}
$res = $m->where($map)->select();
print_r($res);