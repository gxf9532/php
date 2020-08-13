<?php

// function demo()
// {
//     echo "1111111";
// }

// function demo()
// {
//     echo 2222222222;
// }
// demo();

// $redis = new Redis();


// function conn() {
//     global $redis;
//     $redis->connect('127.80.9.10', 2020);
//     $redis->connect('127.80.9.20', 6379);
    
// }


$num = 100;

function demo($num) {
    global $num;
    $num+1;
}

demo();
