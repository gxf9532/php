<?php

$str = 'asddadsdasd';

$pattern = '/a.*d/';
// $pattern = '/a.*?d/'; // ?用来阻止贪婪模式
$pattern = '/a.*d/U'; // 模式修正符U用来阻止贪婪模式

preg_match($pattern,$str,$match);

var_dump($match) ;//asddadsdasd;

