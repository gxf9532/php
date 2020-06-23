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

        .main {
            width: 80%;
            padding: 10px;
            margin: 100px auto;

        }
    </style>
</head>
<?php

$data = [
    ['id' => 10, "name" => "电吹风", "price" => 100, "go" => "家用电器"],
    ['id' => 11, "name" => "乳胶枕", "price" => 200, "go" => "家居"],
    ['id' => 12, "name" => "手套", "price" => 20, "go" => "家居"]
];


?>

<body>
    <div class="main">
        <h3>商品列表</h3>
        <table class="table table-striped table-hover">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>商品价格</th>
                <th>商品种类</th>
                <th>操作</th>
            </tr>

<?php 
    
    foreach($data as $v) {
        echo "<tr>";
        foreach($v as $v2) {
        
            print_r($v2);
            echo "<br/>";
        
        }
        echo "</tr>";
    }


?>
            <tr>
                <td>2</td>
                <td>电吹风222</td>
                <td>很好很好。。。。。。。</td>
                <td>家用电器</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="#" role="button">修改</a> |
                    <a class="btn btn-danger btn-sm" href="#" role="button">下架</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>电吹风333</td>
                <td>很好很好。。。。。。。</td>
                <td>家用电器</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="mod.php?id=3" role="button">修改</a> |
                    <a class="btn btn-danger btn-sm" href="#" role="button">下架</a>
                </td>
                <input type="hidden" name="id" value="">
            </tr>
            <tr>
                <td>1</td>
                <td>电吹风</td>
                <td>很好很好。。。。。。。</td>
                <td>家用电器</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="#" role="button">修改</a> |
                    <a class="btn btn-danger btn-sm" href="#" role="button">下架</a>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>