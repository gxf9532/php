<?php
$isLogin = $_COOKIE['isLogin'];

if (!isset($isLogin) || $isLogin != true) {
    header('Location:./login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>后台首页</h1>
    <?php
    $username = $_COOKIE['username'];
    // 从cookie中取出登录信息
    if (isset($username) && $username != '') {
        echo "尊敬的会员:<span style='color: #F00;'>{$username}</span>,您好!";
        echo "&nbsp;&nbsp;<a href='./action.php?a=doLogout' onclick=\"return confirm('确认退出吗?');\">退出</a>";
    }
    ?>
</body>

</html>