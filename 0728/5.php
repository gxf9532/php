<?php
require_once('./config.php');
try {
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // 抛异常的方式处理错误
    $pdo = new PDO(DSN, USER, PASS, $options);

    // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("数据库连接失败: 原因:" . $e->getMessage());
}

// PDO中的预处理  
/**
 *  PDO中的参数式sql语句(预处理)有两种 
 *  1.insert into shops(id,name) values(?,?) (适合参数少)
 *  2. insert into shops(id,name) values(:id,:name) (参数多)
 * 
 */

// $sql = "insert into shops values(null,?,?,?,?)";
// $stmt = $pdo->prepare($sql);

// $stu = array('aaa', 25.5, 5, '非常好');
// $stmt->execute($stu);

// if ($stmt->rowCount() > 0) {
//     echo "添加成功!";
// }
// ===============================


// $sql = "insert into shops values(null, ?,?,?,?)";
// $stmt = $pdo->prepare($sql);

// // 给?绑定参数值 
// $stmt->bindValue(1, 'bbb', PDO::PARAM_STR);// 第三个参数用来执行绑定的数据类型
// $stmt->bindValue(2, 25);
// $stmt->bindValue(3, 5, PDO::PARAM_INT);
// $stmt->bindValue(4, 'good');

// // 执行
// $stmt->execute();

// if ($stmt->rowCount() > 0) {
//     echo "添加成功!";
// }
