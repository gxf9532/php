<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #CCC;
        }
        #main {
            width: 40%;
            margin: 100px auto;
            border: 1px solid #000;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="main">
        <!-- 

        如果想实现文件上传 必须写表单属性
        enctype="multipart/form-data"
         -->
        <form action="./5.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nickname">用户昵称</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="请输入昵称">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
            </div>
            <div class="form-group">
                <label for="header">请选择头像</label>
                <input type="file" id="header" name="path">
                <p class="help-block">必须上传用户头像</p>
            </div>

            <button type="submit" class="btn btn-default">注册</button>
        </form>
    </div>
</body>

</html>