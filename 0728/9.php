<?php

interface DB
{
    function select();
    function selectAll();
    function selectById();
    
    function update();
    function updateById();

    function delete();
    function deleteAll();
    function deleteById();
    
    function insert();
    function insertMany();
    function getLastInsertId();

    function groupBy();
    function order();
    function limit();

    function count();
    function sum();
    function avg();
    
    function page();
    // ....
    // 预处理

}

// $db = new DB();
// $db->order()->limit(1,3)->select();



