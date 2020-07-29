<?php
header('Content-Type:text/html;Charset=UTF-8');

include "./func.php";
include "./db.php";

// my_dump($_POST);

// 接收行为参数
$action = $_GET['a'];
// echo $action;

switch ($action) {
    case "doLogin":
        // 1.接收表单信息
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? md5($_POST['password']) : '';
        $re = isset($_POST['re']) ? $_POST['re'] : '';
        // 2. 数据库sql
        $sql = "select username,password from user where username='{$username}' and password='{$password}'";


        $stmt = $pdo->query($sql); // 返回一个PDOStatement对象
        $list = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($list)) {
            // 将登录数据写入cookie 
            $time = !empty($re) ? (time() + 60 * 60 * 24 * 7) : (time() + 60 * 10);
            setcookie("username", $list['username'], $time, '/');
            // 将标志位写入cookie
            setcookie('isLogin', true, $time, '/');
            // 跳转
            header('Location:index.php');
        } else {
            echo "<script>alert('用户名或密码错误!');window.location.href='./login.php';</script>";
        }

        break;

    case "doLogout":
        // 清空cookie 
        setcookie("username", '', time() - 100, '/');
        // 将标志位写入cookie
        setcookie('isLogin', '', time() - 100, '/');
        header('Location:./login.php');
        break;
}
