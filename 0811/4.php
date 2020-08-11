<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
 
</head>

<body>
    <div class="container" style="width: 600px; height: auto; margin: 100px auto;">
        <h1 class="text-center text-into">注册</h1>
        <form class="form-horizontal" action="insert.php" method="post">
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">手机号:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="请输入手机号码...">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="upass" placeholder="请输入密码">
                </div>
            </div>
            <div class="form-group">
                <label for="code" class="col-sm-2 control-label">验证码:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="code" id="code" placeholder="验证码">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <!-- <button onclick="sendPhone(e,this)" id="sendBtn" >获取验证码</button> -->
                    <input type="button" value="获取验证码" onclick="sendPhone(this)" id="sendBtn" />
                    <button type="submit" class="btn btn-info">注册</button>
                </div>
            </div>
        </form>
    </div>

    <script>

        function handleBtn()
        {
            var t = 60;
            var time = null;

            if (time == null) {
                // 开启定时器
                time = setInterval(function() {
                    t--;

                    // 修改btn中的内容
                    $('#sendBtn').val('重新发送('+t+')s');

                    if (t < 1) {
                        clearInterval(time);
                        time = null;
                        $('#sendBtn').val('获取验证码');
                        $('#sendBtn').attr('disabled', false);
                    }
                }, 1000);
            }
        }

        function sendPhone(obj)
        {
        
            // 接收手机号码
            var phone = $('#phone').val();

            // 正则表达式
            var phone_grep = /^1{1}[3456789]{1}[0-9]{9}$/;

            if (!phone_grep.test(phone)) {
                return false;
            }
        
            // 将按钮对象转换为jQuery对象
            var obj = $(obj);
            // alert(obj);
            // 设置button按钮的状态为disabled不可用
            obj.attr('disabled', true);

            // 获取按钮当前下的文字 
            var text = obj.val();

            if (text == '获取验证码') {
                // 发送ajax请求
                $.get('sendPhone.php', {'phone': phone}, function(data) {
                    if (data.code == 0) {
                        handleBtn();
                    } else {
                        alert(data.msg);
                    }
                }, 'json');
            }  else {
                return false;
            }            
        }


    </script>
</body>

</html>