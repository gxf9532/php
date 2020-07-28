<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

/*
    PDO方法
    1. query($sql)  查询  返回PDOStatement对象
    2. exec($sql)   用来执行增删改操作  返回影响的行数  
    3. getAttribute() 
    4. setAttribute()  
    5. beginTransaction()  开启事务处理 
    6. commit()  
    7. rollback()  
    8. errorCode 
    9. errorInfo
    10. lastInsertId  
    11. prepare 
    12. quote 给sql语句添加单引号   
*/

// try {
//     $sql = "insert into shops values(null,'phone',20.2,5,'good')";
//     $line = $pdo->exec($sql);
//     if ($line > 0) {
//         echo "添加成功,最后自增的id:" . $pdo->lastInsertId();
//     } else {
//         echo "添加失败,错误号:" . $pdo->errorCode() . ":错误信息:";
//         var_dump($pdo->errorInfo());
//     }
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }

$res = $pdo->query("select * from shops");

// var_dump($res);

// PDOStatement对象支持遍历  但是不建议使用 
foreach ($res as $rows) {
    echo "<li>{$rows['name']}--{$rows['price']}</li>";
}
