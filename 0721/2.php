<?php

echo "早晨起床上班";
try {
    echo "走在上班的途中";
    // 手动抛出异常
    throw new Exception('车子碰到了一个美女');
} catch (Exception $e) {
    echo $e->getMessage();
    echo "出问题了";
}
