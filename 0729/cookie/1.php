<?php
/*
    会话控制 
    1.Cookie 
    2.Session 

    // Cookie 客户端的小甜点 
*/ 


$name = "admin";

// key-value 
// 参数设定: 1.标记  2.值  3.生存时间 4. 路径(一般都写成"/")
setCookie("name", $name, time() + 60 * 60 * 24 * 7 , '/');



