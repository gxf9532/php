<?php
header('Content-Type:text/html;Charset=UTF-8');
// include "session.php";
include "./MemSession.class.php";
// session_start();

// 接收用户信息
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : 'admin';


//使用数据库进行验证
$sql = "SELECT username,password from `users` WHERE username=? AND password=?";

try {
    $dsn = "mysql:host=localhost;dbname=yuesheng";
    $pdo = new PDO($dsn, 'root', 'root');
} catch (PDOException $e) {
    echo "数据库连接失败:" . $e->getMessage();
}

$arr = array($username, $password);

// 预处理获取结果 
$stmt = $pdo->prepare($sql);
$stmt->execute($arr);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    // 用户登陆成功

    // 将用户信息写入session 
    $_SESSION['isLogin'] = true;
    $_SESSION['username'] = $username;

    echo session_id().'<br/>';

    echo "<a href=\"./b.php\">点击跳转到二级页面</a>";
} 
