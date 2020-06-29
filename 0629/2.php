<?php

// if (false) {
//     echo '1111111';
// } else {
//     echo "输入错误!";
//     // 写入错误日志 
//     error_log('这里发生了输入错误!');
// }

// 触发错误
trigger_error("这里手动触发了一个错误", E_USER_ERROR);


